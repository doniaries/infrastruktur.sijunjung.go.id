// import "./bootstrap";
import "flowbite";

function initAll() {
    function initThemeToggle() {
        const themeToggleBtn = document.getElementById("theme-toggle");
        if (themeToggleBtn) {
            const darkIcon = document.getElementById("dark-icon");
            const lightIcon = document.getElementById("light-icon");
            function updateIcons() {
                const isDark =
                    document.documentElement.classList.contains("dark");
                if (darkIcon && lightIcon) {
                    if (isDark) {
                        darkIcon.classList.add("hidden");
                        lightIcon.classList.remove("hidden");
                    } else {
                        darkIcon.classList.remove("hidden");
                        lightIcon.classList.add("hidden");
                    }
                }
            }
            function toggleTheme() {
                document.documentElement.classList.toggle("dark");
                updateIcons();
                localStorage.setItem(
                    "color-theme",
                    document.documentElement.classList.contains("dark")
                        ? "dark"
                        : "light",
                );
            }
            if (
                localStorage.getItem("color-theme") === "dark" ||
                (!("color-theme" in localStorage) &&
                    window.matchMedia("(prefers-color-scheme: dark)").matches)
            ) {
                document.documentElement.classList.add("dark");
            } else {
                document.documentElement.classList.remove("dark");
            }
            updateIcons();
            themeToggleBtn.addEventListener("click", function (e) {
                e.preventDefault();
                e.stopPropagation();
                toggleTheme();
            });
        }
    }
    initThemeToggle();

    const header =
        document.getElementById("site-header") || document.querySelector("nav");
    let ticking = false;
    function onScroll() {
        if (!ticking) {
            window.requestAnimationFrame(() => {
                if (header) {
                    if (window.scrollY > 10) {
                        header.classList.add("header-scrolled");
                        header.classList.add("is-fixed");
                        document.body.classList.add("has-fixed-header");
                    } else {
                        header.classList.remove("header-scrolled");
                        header.classList.remove("is-fixed");
                        document.body.classList.remove("has-fixed-header");
                    }
                }
                ticking = false;
            });
            ticking = true;
        }
    }
    window.addEventListener("scroll", onScroll);
    onScroll();

    const backToTopButton = document.getElementById("back-to-top");
    function updateButtonsVisibility() {
        const scrollTop =
            window.pageYOffset || document.documentElement.scrollTop;
        if (backToTopButton) {
            if (scrollTop > 300) {
                backToTopButton.classList.remove(
                    "opacity-0",
                    "pointer-events-none",
                );
                backToTopButton.classList.add("opacity-100");
            } else {
                backToTopButton.classList.add(
                    "opacity-0",
                    "pointer-events-none",
                );
                backToTopButton.classList.remove("opacity-100");
            }
        }
    }
    window.addEventListener("scroll", updateButtonsVisibility);
    updateButtonsVisibility();
    if (backToTopButton) {
        backToTopButton.addEventListener("click", function () {
            window.scrollTo({ top: 0, behavior: "smooth" });
        });
    }

    if (window.AOS) {
        window.AOS.init({
            duration: 800,
            easing: "ease-out-cubic",
            once: true,
            offset: 100,
            mirror: true,
        });
    }

    const btsMapEl = document.getElementById("btsMap");
    if (
        window.L &&
        btsMapEl &&
        !btsMapEl.classList.contains("leaflet-container")
    ) {
        const map = L.map("btsMap", {
            center: [-0.693, 100.987],
            zoom: 10,
            zoomControl: false,
        });

        L.control.zoom({ position: "topright" }).addTo(map);

        const isDark = document.documentElement.classList.contains("dark");
        const lightTiles = L.tileLayer(
            "https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png",
            {
                attribution: "&copy; CARTO",
            },
        );
        const darkTiles = L.tileLayer(
            "https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png",
            {
                attribution: "&copy; CARTO",
            },
        );
        const satelliteTiles = L.tileLayer(
            "https://{s}.google.com/vt/lyrs=y&x={x}&y={y}&z={z}",
            {
                maxZoom: 20,
                subdomains: ["mt0", "mt1", "mt2", "mt3"],
                attribution: "&copy; Google Maps",
            },
        );

        if (isDark) darkTiles.addTo(map);
        else lightTiles.addTo(map);

        const baseMaps = {
            "Peta Terang": lightTiles,
            "Peta Gelap": darkTiles,
            "Satelit (Hybrid)": satelliteTiles,
        };
        L.control.layers(baseMaps, null, { position: "topright" }).addTo(map);

        const markers = L.markerClusterGroup({
            showCoverageOnHover: false,
            spiderfyOnMaxZoom: true,
        });

        fetch("/bts-map-data")
            .then((res) => res.json())
            .then((data) => {
                data.forEach((bts) => {
                    const lat = parseFloat(bts.lat);
                    const lng = parseFloat(bts.lng);
                    if (!isNaN(lat) && !isNaN(lng)) {
                        const color =
                            bts.status.toLowerCase() === "aktif"
                                ? "#2563eb"
                                : "#dc2626";
                        const marker = L.circleMarker([lat, lng], {
                            radius: 7,
                            fillColor: color,
                            color: "#fff",
                            weight: 2,
                            opacity: 1,
                            fillOpacity: 0.8,
                        });

                        const popupContent = `
                            <div class="p-2 min-w-[200px]">
                                <h3 class="font-black text-blue-600 dark:text-blue-400 uppercase text-sm mb-2 border-b pb-1">
                                    ${bts.pemilik}
                                </h3>
                                <div class="space-y-2">
                                    <div class="flex items-center text-[11px]">
                                        <i class="fas fa-map-marker-alt w-4 text-gray-400"></i>
                                        <span class="font-bold text-gray-700 dark:text-gray-300 leading-tight">${bts.alamat}</span>
                                    </div>
                                    <div class="flex items-center text-[11px]">
                                        <i class="fas fa-signal w-4 text-gray-400"></i>
                                        <span class="px-2 py-0.5 bg-blue-100 dark:bg-blue-900/50 text-blue-600 dark:text-blue-400 rounded-md font-black">
                                            ${bts.teknologi}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        `;

                        marker.bindPopup(popupContent, {
                            className: "custom-popup",
                        });
                        markers.addLayer(marker);
                    }
                });
                map.addLayer(markers);
                if (data.length > 0)
                    map.fitBounds(markers.getBounds(), { padding: [30, 30] });
            })
            .catch((err) => console.error("Error fetching BTS data:", err));
    }

    const btsCountEl = document.getElementById("btsCount");
    const nagariCountEl = document.getElementById("nagariCount");
    const jorongCountEl = document.getElementById("jorongCount");
    if (btsCountEl && nagariCountEl && jorongCountEl) {
        fetch("/stats-data")
            .then((res) => res.json())
            .then((data) => {
                const targets = [
                    {
                        element: btsCountEl,
                        count: data.bts_count,
                        color: "#4F46E5",
                    },
                    {
                        element: nagariCountEl,
                        count: data.nagari_count,
                        color: "#4F46E5",
                    },
                    {
                        element: jorongCountEl,
                        count: data.jorong_count,
                        color: "#4F46E5",
                    },
                ];
                function easeOutQuad(t) {
                    return t * (2 - t);
                }
                function animateCountUp(target, duration) {
                    let startTime = null;
                    function step(ts) {
                        if (!startTime) startTime = ts;
                        const progress = Math.min(
                            (ts - startTime) / duration,
                            1,
                        );
                        const eased = easeOutQuad(progress);
                        const current = Math.floor(eased * target.count);
                        if (progress < 1) {
                            target.element.textContent = current;
                            window.requestAnimationFrame(step);
                        } else {
                            target.element.textContent = target.count;
                            target.element.style.textShadow =
                                "0 0 10px " + target.color + "80";
                            setTimeout(() => {
                                target.element.style.textShadow = "none";
                            }, 500);
                        }
                    }
                    window.requestAnimationFrame(step);
                }
                let animated = false;
                function isInViewport(el, offset = 100) {
                    const rect = el.getBoundingClientRect();
                    return (
                        rect.top <=
                            (window.innerHeight ||
                                document.documentElement.clientHeight) -
                            (offset || 100) && rect.bottom >= (offset || 100)
                    );
                }
                function checkAndAnimate() {
                    const statsSection =
                        document.getElementById("stats-section");
                    if (
                        !animated &&
                        statsSection &&
                        isInViewport(statsSection)
                    ) {
                        targets.forEach((t, i) =>
                            setTimeout(
                                () => animateCountUp(t, 2000 + i * 200),
                                i * 150,
                            ),
                        );
                        animated = true;
                        window.removeEventListener("scroll", checkAndAnimate);
                    }
                }
                checkAndAnimate();
                window.addEventListener("scroll", checkAndAnimate);
                const statsSect = document.getElementById("stats-section");
                if (statsSect && isInViewport(statsSect))
                    setTimeout(checkAndAnimate, 500);
            })
            .catch(() => {});
    }

    const searchInput = document.getElementById("heroSearch");
    if (searchInput) {
        function searchLaporan() {
            const term = searchInput.value.trim();
            if (term)
                window.location.href =
                    "/list-laporan?search=" + encodeURIComponent(term);
            else window.location.href = "/list-laporan";
        }
        searchInput.addEventListener("keypress", function (e) {
            if (e.key === "Enter") searchLaporan();
        });
    }

    const currentPath =
        window.location.pathname.split("/").pop() || "index.html";
    document.querySelectorAll(".nav-link").forEach((link) => {
        const href = link.getAttribute("href");
        if (href && href.includes(currentPath)) {
            link.classList.add("text-blue-600", "font-medium");
            link.classList.remove("text-gray-700");
        }
    });
}

document.addEventListener("DOMContentLoaded", initAll);
document.addEventListener("livewire:navigated", initAll);
