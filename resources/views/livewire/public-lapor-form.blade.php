<div class="min-h-screen bg-gray-50 dark:bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">

                {{-- Title Section --}}
                <div class="flex justify-center mb-8">
                    <div class="inline-flex flex-col items-center justify-center">
                        <div class="inline-flex items-center px-6 py-3 bg-blue-700 text-white font-black rounded-xl shadow-xl transform hover:scale-105 transition-all duration-300 border border-blue-800/20"
                            style="background: linear-gradient(to right, #2563eb, #4338ca);">
                            <i class="fas fa-file-signature mr-3 text-xl text-white"></i>
                            <h2 class="text-2xl uppercase tracking-wider text-white">BUAT LAPORAN</h2>
                        </div>
                        <p class="mt-4 text-sm font-medium text-gray-600 dark:text-gray-400">Isi data laporan dengan
                            lengkap dan benar untuk mempercepat penanganan.</p>
                    </div>
                </div>

                {{-- Laporan Berhasil Dikirim --}}
                @if ($isSubmitted)
                    <div class="max-w-2xl mx-auto">
                        <div class="text-center py-12">
                            <div
                                class="inline-flex items-center justify-center w-20 h-20 bg-green-100 dark:bg-green-900/30 rounded-full mb-6">
                                <i class="fas fa-check-circle text-4xl text-green-600 dark:text-green-400"></i>
                            </div>
                            <h3 class="text-2xl font-black text-gray-900 dark:text-white mb-3">Laporan Berhasil Dikirim!
                            </h3>
                            <p class="text-gray-500 dark:text-gray-400 mb-6">Laporan Anda telah kami terima. Catat nomor
                                tiket berikut untuk melacak status laporan Anda.</p>
                            <div
                                class="inline-flex items-center gap-3 bg-blue-50 dark:bg-blue-900/30 border border-blue-200 dark:border-blue-700 rounded-xl px-6 py-4 mb-8">
                                <i class="fas fa-ticket-alt text-blue-600 dark:text-blue-400 text-xl"></i>
                                <div class="text-left">
                                    <p
                                        class="text-xs text-blue-600 dark:text-blue-400 font-bold uppercase tracking-widest">
                                        Nomor Tiket</p>
                                    <p
                                        class="text-2xl font-black text-blue-800 dark:text-blue-200 font-mono tracking-wider">
                                        {{ $submittedNoTiket }}</p>
                                </div>
                                <button type="button"
                                    onclick="navigator.clipboard.writeText('{{ $submittedNoTiket }}').then(()=>{this.innerHTML='<i class=\'fas fa-check\'></i>'})"
                                    class="ml-2 p-2 rounded-lg bg-blue-100 dark:bg-blue-800 hover:bg-blue-200 dark:hover:bg-blue-700 text-blue-600 dark:text-blue-400 transition-colors"
                                    title="Salin nomor tiket">
                                    <i class="fas fa-copy"></i>
                                </button>
                            </div>
                            <div class="flex flex-col sm:flex-row gap-3 justify-center">
                                <a href="{{ url('/list-laporan') }}"
                                    class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl transition-colors shadow-md">
                                    <i class="fas fa-list mr-2"></i> Lihat Daftar Laporan
                                </a>
                                <button wire:click="resetForm" type="button"
                                    class="inline-flex items-center justify-center px-6 py-3 bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 font-bold rounded-xl transition-colors">
                                    <i class="fas fa-plus mr-2"></i> Buat Laporan Lain
                                </button>
                            </div>
                        </div>
                    </div>
                @else
                    {{-- Form Wizard --}}
                    <div class="max-w-2xl mx-auto">

                        {{-- Wizard Step Indicators (hanya jika user belum login) --}}
                        @if (!auth()->check())
                            <div class="mb-8">
                                <div class="flex items-center justify-center">
                                    {{-- Step 1 --}}
                                    <div class="flex items-center">
                                        <div @class([
                                            'flex items-center justify-center w-10 h-10 rounded-full text-sm font-black border-2 transition-all duration-300',
                                            'bg-blue-600 border-blue-600 text-white shadow-md shadow-blue-200' =>
                                                $step === 1,
                                            'bg-green-500 border-green-500 text-white' => $step > 1,
                                            'bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 text-gray-500 dark:text-gray-400' =>
                                                $step < 1,
                                        ])>
                                            @if ($step > 1)
                                                <i class="fas fa-check text-xs"></i>
                                            @else
                                                01
                                            @endif
                                        </div>
                                        <div class="ml-3 hidden sm:block">
                                            <p @class([
                                                'text-sm font-black',
                                                'text-blue-700 dark:text-blue-400' => $step === 1,
                                                'text-green-600 dark:text-green-400' => $step > 1,
                                                'text-gray-400' => $step < 1,
                                            ])>Data Pelapor</p>
                                            <p class="text-xs text-gray-400">Identitas pelapor</p>
                                        </div>
                                    </div>

                                    {{-- Connector --}}
                                    <div @class([
                                        'flex-1 h-0.5 mx-4 max-w-[80px] transition-all duration-500',
                                        'bg-green-500' => $step > 1,
                                        'bg-gray-200 dark:bg-gray-700' => $step <= 1,
                                    ])></div>

                                    {{-- Step 2 --}}
                                    <div class="flex items-center">
                                        <div @class([
                                            'flex items-center justify-center w-10 h-10 rounded-full text-sm font-black border-2 transition-all duration-300',
                                            'bg-blue-600 border-blue-600 text-white shadow-md shadow-blue-200' =>
                                                $step === 2,
                                            'bg-green-500 border-green-500 text-white' => $step > 2,
                                            'bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 text-gray-500 dark:text-gray-400' =>
                                                $step < 2,
                                        ])>
                                            @if ($step > 2)
                                                <i class="fas fa-check text-xs"></i>
                                            @else
                                                02
                                            @endif
                                        </div>
                                        <div class="ml-3 hidden sm:block">
                                            <p @class([
                                                'text-sm font-black',
                                                'text-blue-700 dark:text-blue-400' => $step === 2,
                                                'text-gray-400' => $step < 2,
                                            ])>Detail Laporan</p>
                                            <p class="text-xs text-gray-400">Informasi tiket dan masalah</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        {{-- Form --}}
                        <form wire:submit.prevent="submit" class="w-full">

                            {{-- ======= STEP 1: Data Pelapor ======= --}}
                            @if (!auth()->check() && $step === 1)
                                <div
                                    class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-2xl p-6 shadow-sm space-y-5">
                                    <div>
                                        <h3
                                            class="text-base font-black text-gray-900 dark:text-white flex items-center gap-2">
                                            <i class="fas fa-user-circle text-blue-600"></i> Data Pelapor
                                        </h3>
                                        <p class="text-xs text-gray-500 mt-1">Isi identitas Anda untuk membuat akun
                                            pelapor.</p>
                                    </div>
                                    <hr class="border-gray-100 dark:border-gray-700">

                                    {{-- Nama Lengkap --}}
                                    <div>
                                        <label for="nama_pelapor"
                                            class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1.5">
                                            Nama Lengkap <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" id="nama_pelapor" wire:model.live="nama_pelapor"
                                            class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 bg-white dark:bg-gray-900 text-gray-900 dark:text-white placeholder-gray-400 transition-all"
                                            placeholder="Masukkan nama lengkap Anda">
                                        @error('nama_pelapor')
                                            <p class="mt-1 text-xs text-red-600 dark:text-red-400 flex items-center gap-1">
                                                <i class="fas fa-circle-exclamation text-[10px]"></i> {{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    {{-- Nomor Kontak --}}
                                    <div>
                                        <label for="nomor_kontak"
                                            class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1.5">
                                            Nomor Kontak / HP <span class="text-red-500">*</span>
                                        </label>
                                        <input type="tel" id="nomor_kontak" wire:model.live="nomor_kontak"
                                            class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 bg-white dark:bg-gray-900 text-gray-900 dark:text-white placeholder-gray-400 transition-all"
                                            placeholder="Contoh: 081234567890">
                                        @error('nomor_kontak')
                                            <p class="mt-1 text-xs text-red-600 dark:text-red-400 flex items-center gap-1">
                                                <i class="fas fa-circle-exclamation text-[10px]"></i> {{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    {{-- NIP --}}
                                    <div>
                                        <label for="nip"
                                            class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1.5">
                                            NIP <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" id="nip" wire:model.live="nip"
                                            class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 bg-white dark:bg-gray-900 text-gray-900 dark:text-white placeholder-gray-400 transition-all"
                                            placeholder="Masukkan NIP Anda">
                                        @error('nip')
                                            <p class="mt-1 text-xs text-red-600 dark:text-red-400 flex items-center gap-1">
                                                <i class="fas fa-circle-exclamation text-[10px]"></i> {{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    {{-- OPD Tujuan (di Step 1) --}}
                                    <div>
                                        <label for="opd_id_s1"
                                            class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1.5">
                                            OPD<span class="text-red-500">*</span>
                                        </label>
                                        <select id="opd_id_s1" wire:model.live="opd_id"
                                            class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 bg-white dark:bg-gray-900 text-gray-900 dark:text-white transition-all">
                                            <option value="">— Pilih OPD —</option>
                                            @foreach ($opds as $opd)
                                                <option value="{{ $opd->id }}">{{ $opd->nama }}</option>
                                            @endforeach
                                        </select>
                                        @error('opd_id')
                                            <p class="mt-1 text-xs text-red-600 dark:text-red-400 flex items-center gap-1">
                                                <i class="fas fa-circle-exclamation text-[10px]"></i> {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                            @endif

                            {{-- ======= STEP 2: Detail Laporan ======= --}}
                            @if (auth()->check() || $step === 2)
                                <div
                                    class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-2xl p-6 shadow-sm space-y-5">
                                    <div>
                                        <h3
                                            class="text-base font-black text-gray-900 dark:text-white flex items-center gap-2">
                                            <i class="fas fa-file-alt text-blue-600"></i> Detail Laporan
                                        </h3>
                                        <p class="text-xs text-gray-500 mt-1">Isi informasi laporan Anda dengan lengkap.
                                        </p>
                                    </div>
                                    <hr class="border-gray-100 dark:border-gray-700">

                                    {{-- Nomor Tiket --}}
                                    <div>
                                        <label
                                            class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1.5">
                                            Nomor Tiket
                                            <span class="ml-1 text-xs text-orange-500 font-bold">(Catat nomor
                                                ini!)</span>
                                        </label>
                                        <div class="flex gap-2">
                                            <input type="text" value="{{ $no_tiket }}" readonly
                                                class="flex-1 px-4 py-2.5 border border-gray-200 dark:border-gray-700 rounded-xl text-sm bg-gray-50 dark:bg-gray-900/60 text-gray-700 dark:text-gray-300 font-mono tracking-wider">
                                            <button type="button" x-data
                                                x-on:click="navigator.clipboard.writeText('{{ $no_tiket }}'); $el.innerHTML='<i class=\'fas fa-check\'></i> Disalin'; setTimeout(()=>$el.innerHTML='<i class=\'fas fa-copy\'></i> Salin',1500)"
                                                class="inline-flex items-center gap-1.5 px-4 py-2.5 bg-gray-800 dark:bg-gray-600 hover:bg-gray-700 text-white text-sm font-semibold rounded-xl transition-colors whitespace-nowrap">
                                                <i class="fas fa-copy"></i> Salin
                                            </button>
                                        </div>
                                    </div>

                                    {{-- OPD Tujuan (hanya tampil jika user sudah login / tidak ada step 1) --}}
                                    @if (auth()->check())
                                        <div>
                                            <label for="opd_id"
                                                class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1.5">
                                                OPD <span class="text-red-500">*</span>
                                            </label>
                                            <select id="opd_id" wire:model.live="opd_id"
                                                class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 bg-white dark:bg-gray-900 text-gray-900 dark:text-white transition-all">
                                                <option value="">— Pilih OPD —</option>
                                                @foreach ($opds as $opd)
                                                    <option value="{{ $opd->id }}">{{ $opd->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('opd_id')
                                                <p
                                                    class="mt-1 text-xs text-red-600 dark:text-red-400 flex items-center gap-1">
                                                    <i class="fas fa-circle-exclamation text-[10px]"></i>
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    @endif

                                    {{-- Jenis Laporan --}}
                                    <div>
                                        <label
                                            class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                            Jenis Laporan <span class="text-red-500">*</span>
                                        </label>
                                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">
                                            @foreach (['Laporan Gangguan', 'Koordinasi Teknis', 'Kenaikan Bandwidth'] as $jenis)
                                                <label @class([
                                                    'flex items-center gap-3 p-3 border-2 rounded-xl cursor-pointer transition-all duration-200',
                                                    'border-blue-500 bg-blue-50 dark:bg-blue-900/30' =>
                                                        $jenis_laporan === $jenis,
                                                    'border-gray-200 dark:border-gray-700 hover:border-blue-300 dark:hover:border-blue-600 bg-white dark:bg-gray-900/50' =>
                                                        $jenis_laporan !== $jenis,
                                                ])>
                                                    <input type="radio" wire:model.live="jenis_laporan"
                                                        value="{{ $jenis }}" class="accent-blue-600">
                                                    <span @class([
                                                        'text-xs font-bold',
                                                        'text-blue-700 dark:text-blue-400' => $jenis_laporan === $jenis,
                                                        'text-gray-600 dark:text-gray-400' => $jenis_laporan !== $jenis,
                                                    ])>{{ $jenis }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>

                                    {{-- Uraian Laporan --}}
                                    <div>
                                        <label for="uraian_laporan"
                                            class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1.5">
                                            Uraian Laporan <span class="text-red-500">*</span>
                                        </label>
                                        <textarea id="uraian_laporan" wire:model.live="uraian_laporan" rows="4"
                                            class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 bg-white dark:bg-gray-900 text-gray-900 dark:text-white placeholder-gray-400 transition-all resize-none"
                                            placeholder="Jelaskan masalah atau laporan Anda secara ringkas dan jelas..."></textarea>
                                        @error('uraian_laporan')
                                            <p class="mt-1 text-xs text-red-600 dark:text-red-400 flex items-center gap-1">
                                                <i class="fas fa-circle-exclamation text-[10px]"></i> {{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    {{-- Upload Foto (khusus Laporan Gangguan) --}}
                                    @if ($jenis_laporan === 'Laporan Gangguan')
                                        <div>
                                            <label for="foto_laporan"
                                                class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1.5">
                                                Foto Laporan <span class="text-xs text-gray-400 font-normal">(Opsional,
                                                    maks. 5MB)</span>
                                            </label>
                                            <input type="file" id="foto_laporan" wire:model="foto_laporan"
                                                accept="image/*,application/pdf"
                                                class="w-full text-sm text-gray-500 dark:text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-bold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 dark:file:bg-blue-900/30 dark:file:text-blue-400 cursor-pointer border border-gray-300 dark:border-gray-600 rounded-xl p-2 bg-white dark:bg-gray-900 transition-all">
                                        </div>
                                    @endif

                                    {{-- Upload File (khusus Kenaikan Bandwidth) --}}
                                    @if ($jenis_laporan === 'Kenaikan Bandwidth')
                                        <div>
                                            <label for="file_laporan"
                                                class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1.5">
                                                Lampiran <span class="text-xs text-gray-400 font-normal">(Opsional,
                                                    maks. 5MB)</span>
                                            </label>
                                            <input type="file" id="file_laporan" wire:model="file_laporan"
                                                accept="image/*,application/pdf"
                                                class="w-full text-sm text-gray-500 dark:text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-bold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 dark:file:bg-blue-900/30 dark:file:text-blue-400 cursor-pointer border border-gray-300 dark:border-gray-600 rounded-xl p-2 bg-white dark:bg-gray-900 transition-all">
                                        </div>
                                    @endif
                                </div>
                            @endif

                            {{-- Tombol Navigasi --}}
                            <div class="mt-6 flex items-center justify-between">
                                {{-- Tombol Kembali --}}
                                @if (!auth()->check() && $step > 1)
                                    <button type="button" wire:click="prevStep"
                                        class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-bold text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 rounded-xl transition-colors border border-gray-200 dark:border-gray-600">
                                        <i class="fas fa-arrow-left text-xs"></i> Sebelumnya
                                    </button>
                                @else
                                    <a href="{{ url('/') }}"
                                        class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-bold text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 rounded-xl transition-colors border border-gray-200 dark:border-gray-600">
                                        <i class="fas fa-arrow-left text-xs"></i> Beranda
                                    </a>
                                @endif

                                {{-- Tombol Selanjutnya / Kirim --}}
                                @if (!auth()->check() && $step === 1)
                                    <button type="button" wire:click="nextStep" wire:loading.attr="disabled"
                                        wire:loading.class="opacity-70 cursor-not-allowed"
                                        class="inline-flex items-center gap-2 px-6 py-2.5 text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 rounded-xl shadow-md shadow-blue-200 dark:shadow-blue-900/30 transition-all duration-200 active:scale-95">
                                        <span wire:loading.remove wire:target="nextStep">Selanjutnya <i
                                                class="fas fa-arrow-right text-xs"></i></span>
                                        <span wire:loading wire:target="nextStep"><i
                                                class="fas fa-circle-notch animate-spin text-xs"></i>
                                            Memproses...</span>
                                    </button>
                                @else
                                    <button type="submit" wire:loading.attr="disabled"
                                        wire:loading.class="opacity-70 cursor-not-allowed"
                                        @if (!$opd_id || !$uraian_laporan) disabled @endif
                                        class="inline-flex items-center gap-2 px-6 py-2.5 text-sm font-bold text-white bg-green-600 hover:bg-green-700 disabled:bg-gray-400 disabled:cursor-not-allowed rounded-xl shadow-md shadow-green-200 dark:shadow-green-900/30 transition-all duration-200 active:scale-95">
                                        <span wire:loading.remove wire:target="submit">
                                            <i class="fas fa-paper-plane text-xs"></i> Kirim Laporan
                                        </span>
                                        <span wire:loading wire:target="submit">
                                            <i class="fas fa-circle-notch animate-spin text-xs"></i> Mengirim...
                                        </span>
                                    </button>
                                @endif
                            </div>

                        </form>
                    </div>
                @endif

                {{-- Error Modal Popup --}}
                @if (session()->has('error'))
                    <div x-data="{ open: true }" x-show="open" class="fixed inset-0 z-50 flex items-center justify-center px-4" x-cloak>
                        <!-- Backdrop -->
                        <div x-show="open" 
                             x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0"
                             x-transition:enter-end="opacity-100"
                             x-transition:leave="transition ease-in duration-200"
                             x-transition:leave-start="opacity-100"
                             x-transition:leave-end="opacity-0"
                             class="fixed inset-0 bg-gray-900/60 backdrop-blur-sm" @click="open = false"></div>
                        
                        <!-- Modal Content -->
                        <div x-show="open"
                             x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0 scale-95 translate-y-4"
                             x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                             x-transition:leave="transition ease-in duration-200"
                             x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                             x-transition:leave-end="opacity-0 scale-95 translate-y-4"
                             class="relative bg-white dark:bg-gray-800 w-full max-w-md rounded-2xl shadow-2xl p-6 overflow-hidden z-10">
                             
                            <div class="absolute top-0 left-0 w-full h-1.5 bg-red-500"></div>
                            
                            <div class="flex items-start gap-4">
                                <div class="flex-shrink-0 w-12 h-12 rounded-full bg-red-100 dark:bg-red-900/30 flex items-center justify-center">
                                    <i class="fas fa-exclamation-triangle text-xl text-red-600 dark:text-red-400"></i>
                                </div>
                                <div class="pt-1">
                                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Terjadi Kesalahan</h3>
                                    <p class="text-sm text-gray-600 dark:text-gray-300 leading-relaxed">{{ session('error') }}</p>
                                </div>
                            </div>
                            
                            <div class="mt-6 flex justify-end">
                                <button @click="open = false" type="button" class="px-5 py-2.5 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-800 dark:text-gray-200 text-sm font-semibold rounded-xl transition-colors">
                                    Mengerti
                                </button>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
