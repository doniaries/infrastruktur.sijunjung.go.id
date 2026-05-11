<div class="min-h-screen bg-gray-50 dark:bg-gray-950 transition-colors duration-500 py-8 pb-32">
    <div class="max-w-[98%] mx-auto px-4">
        <!-- Header Section -->
        <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-xl sm:rounded-2xl border border-gray-200 dark:border-gray-800 mb-6">
            <div class="p-6">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                    <div>
                        <h2 class="text-3xl font-black uppercase tracking-tighter text-gray-900 dark:text-white flex items-center">
                            <i class="fas fa-map-marked-alt mr-3 text-blue-600 animate-pulse"></i>
                            Peta Sebaran BTS Sijunjung
                        </h2>
                        <p class="text-gray-500 dark:text-gray-400 text-xs font-bold mt-1 uppercase tracking-widest flex items-center">
                            <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                            Visualisasi Geospasial Infrastruktur Telekomunikasi Real-time
                        </p>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="px-4 py-2 bg-blue-50 dark:bg-blue-900/20 rounded-xl border border-blue-100 dark:border-blue-800">
                            <span class="text-blue-600 dark:text-blue-400 font-black text-xl" id="bts-count">0</span>
                            <span class="ml-2 text-blue-500 text-[10px] font-bold uppercase tracking-widest">Total BTS</span>
                        </div>
                        <a href="{{ route('list.bts') }}" class="inline-flex items-center px-6 py-3 bg-gray-900 dark:bg-white text-white dark:text-gray-900 font-bold rounded-xl text-sm transition-all hover:scale-105 active:scale-95 shadow-lg">
                            <i class="fas fa-list mr-2"></i>
                            LIHAT TABEL
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Map Section -->
        <div class="relative group mb-24">
            <!-- Map Container -->
            <div id="map" class="w-full h-[750px] rounded-3xl shadow-2xl border-4 border-white dark:border-gray-800 z-0 transition-all duration-500 overflow-hidden" wire:ignore>
                <!-- Skeleton Loading -->
                <div class="absolute inset-0 flex items-center justify-center bg-gray-100 dark:bg-gray-800">
                    <div class="text-center">
                        <i class="fas fa-circle-notch animate-spin text-4xl text-blue-600 mb-4"></i>
                        <p class="text-gray-500 font-bold uppercase tracking-widest text-xs">Memuat Peta Geografis...</p>
                    </div>
                </div>
            </div>

            <!-- Floating Legend -->
            <div class="absolute bottom-10 left-10 z-[1000] bg-white/90 dark:bg-gray-900/90 backdrop-blur-md p-5 rounded-2xl shadow-2xl border border-gray-200 dark:border-gray-700 min-w-[220px]">
                <h4 class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-4 border-b border-gray-100 dark:border-gray-800 pb-2">Legenda Sinyal</h4>
                <div class="space-y-3">
                    <div class="flex items-center group cursor-pointer">
                        <div class="w-4 h-4 rounded-full bg-blue-600 mr-3 shadow-lg shadow-blue-500/50 group-hover:scale-125 transition-transform"></div>
                        <span class="text-sm font-bold text-gray-700 dark:text-gray-200">BTS Aktif</span>
                    </div>
                    <div class="flex items-center group cursor-pointer">
                        <div class="w-4 h-4 rounded-full bg-red-600 mr-3 shadow-lg shadow-red-500/50 group-hover:scale-125 transition-transform"></div>
                        <span class="text-sm font-bold text-gray-700 dark:text-gray-200">BTS Non-Aktif</span>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100 dark:border-gray-800">
                        <p class="text-[9px] font-bold text-gray-400 italic">Klik marker untuk melihat detail informasi infrastruktur.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Leaflet Cluster Styles (Custom) -->
    <style>
        .leaflet-container {
            background: #f8fafc;
        }
        .dark .leaflet-container {
            background: #020617;
        }
        /* Custom Cluster Style */
        .marker-cluster-small { background-color: rgba(37, 99, 235, 0.6); }
        .marker-cluster-small div { background-color: rgba(37, 99, 235, 0.8); color: white; font-weight: bold; }
        .marker-cluster-medium { background-color: rgba(37, 99, 235, 0.6); }
        .marker-cluster-medium div { background-color: rgba(37, 99, 235, 0.9); color: white; font-weight: bold; }
        .marker-cluster-large { background-color: rgba(37, 99, 235, 0.6); }
        .marker-cluster-large div { background-color: rgba(37, 99, 235, 1); color: white; font-weight: bold; }

        .custom-popup .leaflet-popup-content-wrapper {
            background: rgba(255, 255, 255, 0.95);
            color: #1e293b;
            border-radius: 16px;
            padding: 8px;
            box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1);
        }
        .dark .custom-popup .leaflet-popup-content-wrapper {
            background: rgba(15, 23, 42, 0.95);
            color: #f1f5f9;
            border: 1px solid #334155;
        }
        .custom-popup .leaflet-popup-tip {
            background: rgba(255, 255, 255, 0.95);
        }
        .dark .custom-popup .leaflet-popup-tip {
            background: rgba(15, 23, 42, 0.95);
        }
    </style>

    <script>
        document.addEventListener('livewire:navigated', () => {
            const mapElement = document.getElementById('map');
            if (!mapElement) return;

            // Initialize Map
            const map = L.map('map', {
                center: [-0.693, 100.987],
                zoom: 11,
                zoomControl: false
            });

            L.control.zoom({ position: 'topright' }).addTo(map);

            const isDark = document.documentElement.classList.contains('dark');
            
            // Base Layers
            const lightTiles = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
                attribution: '&copy; CARTO'
            });
            const darkTiles = L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
                attribution: '&copy; CARTO'
            });
            const satelliteTiles = L.tileLayer('https://{s}.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
                maxZoom: 20,
                subdomains:['mt0','mt1','mt2','mt3'],
                attribution: '&copy; Google Maps'
            });

            // Default Layer
            if (isDark) darkTiles.addTo(map);
            else lightTiles.addTo(map);

            // Layer Control
            const baseMaps = {
                "Peta Terang": lightTiles,
                "Peta Gelap": darkTiles,
                "Satelit (Hybrid)": satelliteTiles
            };
            L.control.layers(baseMaps, null, { position: 'topright' }).addTo(map);

            // Cluster Group
            const markers = L.markerClusterGroup({
                showCoverageOnHover: false,
                spiderfyOnMaxZoom: true
            });

            // Fetch Data
            fetch('/bts-map-data')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('bts-count').innerText = data.length;
                    
                    data.forEach(bts => {
                        const color = bts.status.toLowerCase() === 'aktif' ? '#2563eb' : '#dc2626';
                        
                        const marker = L.circleMarker([bts.lat, bts.lng], {
                            radius: 8,
                            fillColor: color,
                            color: '#fff',
                            weight: 2,
                            opacity: 1,
                            fillOpacity: 0.9
                        });

                        const popupContent = `
                            <div class="p-2 min-w-[220px]">
                                <h3 class="font-black text-blue-600 dark:text-blue-400 uppercase text-xs mb-2 border-b pb-1">
                                    ${bts.pemilik}
                                </h3>
                                <div class="space-y-2">
                                    <div class="flex items-start text-[11px]">
                                        <i class="fas fa-map-marker-alt w-4 text-gray-400 mt-0.5"></i>
                                        <span class="font-bold text-gray-700 dark:text-gray-300 leading-tight">${bts.alamat}</span>
                                    </div>
                                    <div class="flex items-center text-[11px]">
                                        <i class="fas fa-signal w-4 text-gray-400"></i>
                                        <span class="px-2 py-0.5 bg-blue-100 dark:bg-blue-900/50 text-blue-600 dark:text-blue-400 rounded-md font-black">
                                            ${bts.teknologi}
                                        </span>
                                    </div>
                                    <div class="pt-1">
                                        <span class="text-[9px] uppercase font-black px-2 py-1 rounded-full ${bts.status.toLowerCase() === 'aktif' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'}">
                                            ${bts.status}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        `;

                        marker.bindPopup(popupContent, { className: 'custom-popup' });
                        markers.addLayer(marker);
                    });

                    map.addLayer(markers);
                    if (data.length > 0) {
                        map.fitBounds(markers.getBounds(), { padding: [50, 50] });
                    }
                });
        });
    </script>
</div>
