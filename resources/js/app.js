// import "./bootstrap";
import 'flowbite';

document.addEventListener('DOMContentLoaded', () => {
    function initThemeToggle() {
        const themeToggleBtn = document.getElementById('theme-toggle');
        if (themeToggleBtn) {
            const darkIcon = document.getElementById('dark-icon');
            const lightIcon = document.getElementById('light-icon');
            function updateIcons() {
                const isDark = document.documentElement.classList.contains('dark');
                if (darkIcon && lightIcon) {
                    if (isDark) {
                        darkIcon.classList.add('hidden');
                        lightIcon.classList.remove('hidden');
                    } else {
                        darkIcon.classList.remove('hidden');
                        lightIcon.classList.add('hidden');
                    }
                }
            }
            function toggleTheme() {
                document.documentElement.classList.toggle('dark');
                updateIcons();
                localStorage.setItem('color-theme', document.documentElement.classList.contains('dark') ? 'dark' : 'light');
            }
            if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
            updateIcons();
            themeToggleBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                toggleTheme();
            });
        }
    }
    initThemeToggle();

    const header = document.getElementById('site-header') || document.querySelector('nav');
    let ticking = false;
    function onScroll() {
        if (!ticking) {
            window.requestAnimationFrame(() => {
                if (header) {
                    if (window.scrollY > 10) {
                        header.classList.add('header-scrolled');
                        header.classList.add('is-fixed');
                        document.body.classList.add('has-fixed-header');
                    } else {
                        header.classList.remove('header-scrolled');
                        header.classList.remove('is-fixed');
                        document.body.classList.remove('has-fixed-header');
                    }
                }
                ticking = false;
            });
            ticking = true;
        }
    }
    window.addEventListener('scroll', onScroll);
    onScroll();

    const rippleButtons = document.querySelectorAll('.ripple');
    rippleButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            const diameter = Math.max(this.clientWidth, this.clientHeight);
            const radius = diameter / 2;
            const circle = document.createElement('span');
            circle.style.width = circle.style.height = `${diameter}px`;
            circle.style.left = `${event.clientX - this.offsetLeft - radius}px`;
            circle.style.top = `${event.clientY - this.offsetTop - radius}px`;
            circle.classList.add('ripple-effect');
            const existing = this.getElementsByClassName('ripple-effect')[0];
            if (existing) existing.remove();
            this.appendChild(circle);
        });
    });

    const magneticButtons = document.querySelectorAll('.magnetic');
    magneticButtons.forEach(button => {
        button.addEventListener('mouseenter', function(e) {
            const rect = this.getBoundingClientRect();
            const x = e.clientX - rect.left - rect.width / 2;
            const y = e.clientY - rect.top - rect.height / 2;
            this.style.transform = `translate(${x * 0.1}px, ${y * 0.1}px) scale(1.05)`;
        });
        button.addEventListener('mouseleave', function() {
            this.style.transform = 'translate(0, 0) scale(1)';
        });
    });

    document.querySelectorAll('[data-loading]').forEach(button => {
        button.addEventListener('click', function() {
            this.classList.add('btn-loading');
            this.disabled = true;
            setTimeout(() => {
                this.classList.remove('btn-loading');
                this.disabled = false;
            }, 2000);
        });
    });

    const backToTopButton = document.getElementById('back-to-top');
    function updateButtonsVisibility() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        if (backToTopButton) {
            if (scrollTop > 300) {
                backToTopButton.classList.remove('opacity-0', 'pointer-events-none');
                backToTopButton.classList.add('opacity-100');
            } else {
                backToTopButton.classList.add('opacity-0', 'pointer-events-none');
                backToTopButton.classList.remove('opacity-100');
            }
        }
    }
    window.addEventListener('scroll', updateButtonsVisibility);
    updateButtonsVisibility();
    if (backToTopButton) {
        backToTopButton.addEventListener('click', function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    if (window.AOS) {
        window.AOS.init({ duration: 800, easing: 'ease-out-cubic', once: true, offset: 100, mirror: true });
    }

    const btsMapEl = document.getElementById('btsMap');
    if (window.L && btsMapEl && !btsMapEl.classList.contains('leaflet-container')) {
        const map = L.map('btsMap', { zoomControl: true }).setView([-0.6477, 101.3184], 9);
        const tile = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            maxZoom: 19
        });
        tile.addTo(map);
        map.attributionControl.setPrefix(false);
        L.control.scale({ metric: true, imperial: false }).addTo(map);
        const shadowUrl = 'https://unpkg.com/leaflet@1.9.4/dist/images/marker-shadow.png';
        const baseIcon = 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/';
        function iconByStatus(status) {
            let file = 'marker-icon-2x-orange.png';
            if (status === 'Aktif') file = 'marker-icon-2x-green.png';
            else if (status === 'Non-Aktif') file = 'marker-icon-2x-red.png';
            return L.icon({
                iconUrl: baseIcon + file,
                iconRetinaUrl: baseIcon + file,
                shadowUrl,
                iconSize: [25, 41],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34],
                shadowSize: [41, 41]
            });
        }
        fetch('/bts-map-data')
            .then(res => res.json())
            .then(data => {
                const bounds = L.latLngBounds();
                data.forEach(bts => {
                    const lat = parseFloat(bts.lat);
                    const lng = parseFloat(bts.lng);
                    if (!isNaN(lat) && !isNaN(lng)) {
                        const marker = L.marker([lat, lng], { icon: iconByStatus(bts.status) }).addTo(map);
                        marker.bindPopup(
                            `<div class="min-w-[250px] p-3">`
                            + `<h3 class="text-lg font-bold mb-2 text-gray-900 dark:text-gray-100 border-b pb-2">${bts.pemilik || 'Tidak diketahui'}</h3>`
                            + `<div class="space-y-1.5">`
                            + `<p class="text-sm"><span class="font-semibold text-gray-700 dark:text-gray-300">Alamat:</span> <span class="text-gray-800 dark:text-gray-200">${bts.alamat || 'Tidak diketahui'}</span></p>`
                            + `<p class="text-sm"><span class="font-semibold text-gray-700 dark:text-gray-300">Teknologi:</span> <span class="text-gray-800 dark:text-gray-200">${bts.teknologi || 'Tidak diketahui'}</span></p>`
                            + `<p class="text-sm"><span class="font-semibold text-gray-700 dark:text-gray-300">Status:</span> <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium ${bts.status === 'Aktif' ? 'bg-green-100 text-green-800' : bts.status === 'Non-Aktif' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800'}">${bts.status || 'Tidak diketahui'}</span></p>`
                            + `<p class="text-sm"><span class="font-semibold text-gray-700 dark:text-gray-300">Tahun Bangun:</span> <span class="text-gray-800 dark:text-gray-200">${bts.tahun_bangun || 'Tidak diketahui'}</span></p>`
                            + `</div></div>`
                        );
                        bounds.extend([lat, lng]);
                    }
                });
                if (bounds.isValid()) map.fitBounds(bounds, { padding: [20, 20] });
            })
            .catch(err => console.error('Error fetching BTS data:', err));
    }

    const btsCountEl = document.getElementById('btsCount');
    const nagariCountEl = document.getElementById('nagariCount');
    const jorongCountEl = document.getElementById('jorongCount');
    if (btsCountEl && nagariCountEl && jorongCountEl) {
        fetch('/stats-data')
            .then(res => res.json())
            .then(data => {
                const targets = [
                    { element: btsCountEl, count: data.bts_count, color: '#4F46E5' },
                    { element: nagariCountEl, count: data.nagari_count, color: '#4F46E5' },
                    { element: jorongCountEl, count: data.jorong_count, color: '#4F46E5' },
                ];
                function easeOutQuad(t) { return t * (2 - t); }
                function animateCountUp(target, duration) {
                    let startTime = null;
                    function step(ts) {
                        if (!startTime) startTime = ts;
                        const progress = Math.min((ts - startTime) / duration, 1);
                        const eased = easeOutQuad(progress);
                        const current = Math.floor(eased * target.count);
                        if (progress < 1) {
                            target.element.textContent = current;
                            window.requestAnimationFrame(step);
                        } else {
                            target.element.textContent = target.count;
                            target.element.style.textShadow = '0 0 10px ' + target.color + '80';
                            setTimeout(() => { target.element.style.textShadow = 'none'; }, 500);
                        }
                    }
                    window.requestAnimationFrame(step);
                }
                let animated = false;
                function isInViewport(el, offset = 100) {
                    const rect = el.getBoundingClientRect();
                    return rect.top <= (window.innerHeight || document.documentElement.clientHeight) - offset && rect.bottom >= offset;
                }
                function checkAndAnimate() {
                    const statsSection = document.getElementById('stats-section');
                    if (!animated && statsSection && isInViewport(statsSection)) {
                        targets.forEach((t, i) => setTimeout(() => animateCountUp(t, 2000 + i * 200), i * 150));
                        animated = true;
                        window.removeEventListener('scroll', checkAndAnimate);
                    }
                }
                checkAndAnimate();
                window.addEventListener('scroll', checkAndAnimate);
    if (isInViewport(document.getElementById('stats-section'))) setTimeout(checkAndAnimate, 500);
  })
  .catch(() => {});
}

    const backgroundEffects = document.getElementById('background-effects');
    if (backgroundEffects) {
        function createStars() {
            backgroundEffects.innerHTML = '';
            for (let i = 0; i < 50; i++) {
                const star = document.createElement('div');
                star.className = 'star';
                star.style.left = Math.random() * 100 + '%';
                star.style.top = Math.random() * 100 + '%';
                const size = Math.random() * 3 + 1;
                star.style.width = size + 'px';
                star.style.height = size + 'px';
                star.style.animationDelay = Math.random() * 2 + 's';
                star.style.animationDuration = (Math.random() * 3 + 2) + 's';
                backgroundEffects.appendChild(star);
            }
        }
        function createSunAndClouds() {
            backgroundEffects.innerHTML = '';
            const sun = document.createElement('div');
            sun.className = 'sun';
            backgroundEffects.appendChild(sun);
            const cloudFormation = document.createElement('div');
            cloudFormation.className = 'cloud-formation';
            for (let i = 1; i <= 5; i++) {
                const cloud = document.createElement('div');
                cloud.className = `cloud cloud-${i}`;
                cloudFormation.appendChild(cloud);
            }
            backgroundEffects.appendChild(cloudFormation);
        }
        function updateBackgroundEffects() {
            const isDark = document.documentElement.classList.contains('dark');
            if (isDark) createStars(); else createSunAndClouds();
        }
        updateBackgroundEffects();
        const observer = new MutationObserver(mutations => {
            mutations.forEach(mutation => {
                if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                    updateBackgroundEffects();
                }
            });
        });
        observer.observe(document.documentElement, { attributes: true, attributeFilter: ['class'] });
    }

    const searchInput = document.getElementById('heroSearch');
    if (searchInput) {
        function searchLaporan() {
            const term = searchInput.value.trim();
            if (term) window.location.href = '/list-laporan?search=' + encodeURIComponent(term);
            else window.location.href = '/list-laporan';
        }
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') searchLaporan();
        });
    }

    const currentPath = window.location.pathname.split('/').pop() || 'index.html';
    document.querySelectorAll('.nav-link').forEach(link => {
        const href = link.getAttribute('href');
        if (href && href.includes(currentPath)) {
            link.classList.add('text-blue-600', 'font-medium');
            link.classList.remove('text-gray-700');
        }
    });
});
