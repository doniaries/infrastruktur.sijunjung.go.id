<div>
    {{-- <x-shared-header activeMenu="jorong" /> --}}
    <!-- Header Section -->
     <div class="page-header">
         <div class="container mx-auto px-4">
             <div class="page-header-content">
                <div class="flex items-center space-x-4">
                    <div class="page-header-icon">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="page-header-title">Data Jorong</h1>
                        <p class="page-header-subtitle">Informasi lengkap jorong di Kabupaten Sijunjung</p>
                    </div>
                </div>
                <div class="page-header-stats">
                    <div class="page-header-stat-card">
                        <div class="page-header-stat-number">{{ $totalData }}</div>
                        <div class="page-header-stat-label">Total Data</div>
                    </div>
                </div>
            </div>
         </div>
     </div>

    <section class="page-section">
        <div class="container px-4 mx-auto">

            <script>
                document.addEventListener('livewire:init', () => {
                    Livewire.on('notify', (event) => {
                        const data = event[0] || event;
                        if (data.type === 'success') {
                            // Tampilkan notifikasi sukses
                            const notification = document.createElement('div');
                            notification.className = 'fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50';
                            notification.textContent = data.message;
                            document.body.appendChild(notification);
                            
                            // Hapus notifikasi setelah 3 detik
                            setTimeout(() => {
                                notification.remove();
                            }, 3000);
                        }
                    });
                });
            </script>

            <div class="table-container">
                <div class="table-content">
                    <div class="table-wrapper">
                        {{ $this->table }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
