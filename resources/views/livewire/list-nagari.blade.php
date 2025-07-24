<div>
    {{-- <x-shared-header activeMenu="nagari" /> --}}
    <section class="page-section">
        <div class="container px-4 mx-auto">
    <!-- Header Section -->
    <div class="page-header">
        <div class="container mx-auto px-4">
            <div class="page-header-content">
                <div class="flex items-center space-x-4">
                    <div class="page-header-icon">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="page-header-title">Data Nagari</h1>
                        <p class="page-header-subtitle">Informasi lengkap nagari di Kabupaten Sijunjung</p>
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

            <script>
                document.addEventListener('livewire:initialized', () => {
                    @this.on('notify', ({
                        type,
                        message
                    }) => {
                        window.$notify({
                            title: type === 'success' ? 'Berhasil!' : 'Perhatian!',
                            description: message,
                            icon: type === 'success' ? 'check-circle' : 'exclamation-circle',
                            iconColor: type === 'success' ? 'text-green-500' : 'text-red-500',
                            timeout: 3000,
                        });
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
