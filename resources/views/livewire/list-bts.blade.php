<div>
    {{-- <x-shared-header activeMenu="bts" /> --}}
    <!-- Header Section -->
    <div class="page-header">
        <div class="container mx-auto px-4">
            <div class="page-header-content">
                <div class="flex items-center space-x-4">
                    <div class="page-header-icon">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="page-header-title">Data BTS</h1>
                        <p class="page-header-subtitle">Informasi lengkap Base Transceiver Station di Kabupaten Sijunjung</p>
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
