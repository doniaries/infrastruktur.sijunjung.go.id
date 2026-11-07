<?php

namespace App\Livewire;

use App\Models\Lapor;
use App\Models\Opd;
use App\Enums\StatusLaporan;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class PublicLaporForm extends Component
{
    use WithFileUploads;

    // Step management
    public int $step = 1;
    public int $totalSteps = 2;

    // Step 1 - Data Pelapor (hanya untuk user yang belum login)
    public string $nama_pelapor = '';
    public string $nomor_kontak = '';
    public string $email = '';
    public string $nip = '';
    public string $password = '';
    public string $password_confirmation = '';

    // Step 2 - Detail Laporan
    public ?int $opd_id = null;
    public string $jenis_laporan = 'Laporan Gangguan';
    public string $uraian_laporan = '';
    /** @var \Livewire\Features\SupportFileUploads\TemporaryUploadedFile|null */
    public $foto_laporan = null;
    /** @var \Livewire\Features\SupportFileUploads\TemporaryUploadedFile|null */
    public $file_laporan = null;
    public string $no_tiket = '';
    public string $tgl_laporan = '';

    // State
    public bool $isSubmitted = false;
    public string $submittedNoTiket = '';
    public ?Lapor $activeLapor = null;
    public bool $hasActiveLapor = false;

    public function checkActiveLapor(): void
    {
        if (Auth::check()) {
            $this->activeLapor = Lapor::query()
                ->where('user_id', Auth::id())
                ->whereIn('status_laporan', [
                    StatusLaporan::BELUM_DIPROSES,
                    StatusLaporan::SEDANG_DIPROSES,
                ])
                ->latest()
                ->first();

            $this->hasActiveLapor = $this->activeLapor !== null;
        } else {
            $this->activeLapor = null;
            $this->hasActiveLapor = false;
        }
    }

    public function mount(): void
    {
        $this->no_tiket = $this->generateNoTiket();
        $this->tgl_laporan = Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s');

        $this->checkActiveLapor();

        if (Auth::check()) {
            $this->step = 2;
            $this->totalSteps = 1;
            
            // Ambil OPD dari profile user atau laporan terakhir
            /** @var \App\Models\User $currentUser */
            $currentUser = Auth::user();
            if ($currentUser->opd_id) {
                $this->opd_id = $currentUser->opd_id;
            } else {
                $lastLapor = \App\Models\Lapor::where('user_id', '=', Auth::id())->latest()->first();
                if ($lastLapor) {
                    $this->opd_id = $lastLapor->opd_id;
                }
            }
        } else {
            $this->step = 1;
            $this->totalSteps = 2;
        }
    }

    private function generateNoTiket(): string
    {
        do {
            $noTiket = strtoupper(Carbon::now()->format('ymd') . Str::random(3));
        } while (Lapor::query()->where('no_tiket', $noTiket)->exists());
        return $noTiket;
    }

    public function nextStep(): void
    {
        if ($this->step === 1 && !Auth::check()) {
            $this->validate([
                'nama_pelapor' => 'required|min:3|max:255|unique:users,name',
                'nomor_kontak' => 'required|numeric|digits_between:10,15|unique:users,no_kontak',
                'email' => 'required|email|unique:users,email',
                'nip' => 'required|unique:users,nip',
                'password' => 'required|min:6|confirmed',
                'opd_id' => 'required|exists:opds,id',
            ], [
                'nama_pelapor.required' => 'Nama lengkap wajib diisi.',
                'nama_pelapor.unique' => 'Nama lengkap sudah terdaftar. Silakan login jika sudah memiliki akun.',
                'nomor_kontak.required' => 'Nomor kontak wajib diisi.',
                'nomor_kontak.numeric' => 'Nomor kontak hanya boleh berisi angka.',
                'nomor_kontak.digits_between' => 'Nomor kontak minimal 10 digit dan maksimal 15 digit.',
                'nomor_kontak.unique' => 'Nomor kontak sudah terdaftar.',
                'email.required' => 'Email wajib diisi.',
                'email.email' => 'Format email tidak valid.',
                'email.unique' => 'Email sudah terdaftar.',
                'nip.required' => 'NIP wajib diisi.',
                'nip.unique' => 'NIP sudah terdaftar.',
                'password.required' => 'Password wajib diisi.',
                'password.min' => 'Password minimal 6 karakter.',
                'password.confirmed' => 'Konfirmasi password tidak cocok.',
                'opd_id.required' => 'Silakan pilih OPD anda.',
            ]);
        }
        $this->step++;
    }

    public function prevStep(): void
    {
        if ($this->step > 1) {
            $this->step--;
        }
    }

    public function submit(): void
    {
        // Cegah pembuatan laporan jika masih memiliki laporan aktif yang belum selesai
        $this->checkActiveLapor();
        if ($this->hasActiveLapor) {
            session()->flash('error', "Anda masih memiliki laporan aktif dengan Nomor Tiket #{$this->activeLapor->no_tiket} (Status: {$this->activeLapor->status_laporan->getLabel()}). Anda baru dapat membuat laporan baru setelah laporan tersebut diselesaikan oleh petugas.");
            return;
        }

        // Validasi data pelapor jika belum login
        if (!Auth::check()) {
            $this->validate([
                'nama_pelapor' => 'required|min:3|max:255|unique:users,name',
                'nomor_kontak' => 'required|numeric|digits_between:10,15|unique:users,no_kontak',
                'email' => 'required|email|unique:users,email',
                'nip' => 'required|unique:users,nip',
                'password' => 'required|min:6|confirmed',
                'opd_id' => 'required|exists:opds,id',
                'jenis_laporan' => 'required',
                'uraian_laporan' => 'required|min:10',
            ], [
                'nama_pelapor.required' => 'Nama lengkap wajib diisi.',
                'nama_pelapor.unique' => 'Nama lengkap sudah terdaftar. Silakan login jika sudah memiliki akun.',
                'nomor_kontak.required' => 'Nomor kontak wajib diisi.',
                'nomor_kontak.numeric' => 'Nomor kontak hanya boleh berisi angka.',
                'nomor_kontak.digits_between' => 'Nomor kontak minimal 10 digit dan maksimal 15 digit.',
                'nomor_kontak.unique' => 'Nomor kontak sudah terdaftar.',
                'email.required' => 'Email wajib diisi.',
                'email.email' => 'Format email tidak valid.',
                'email.unique' => 'Email sudah terdaftar.',
                'nip.required' => 'NIP wajib diisi.',
                'nip.unique' => 'NIP sudah terdaftar.',
                'password.required' => 'Password wajib diisi.',
                'password.min' => 'Password minimal 6 karakter.',
                'password.confirmed' => 'Konfirmasi password tidak cocok.',
                'opd_id.required' => 'Silakan pilih OPD anda.',
                'uraian_laporan.required' => 'Uraian laporan wajib diisi.',
                'uraian_laporan.min' => 'Uraian laporan minimal 10 karakter.',
            ]);
        } else {
            $this->validate([
                'jenis_laporan' => 'required',
                'uraian_laporan' => 'required|min:10',
            ], [
                'uraian_laporan.required' => 'Uraian laporan wajib diisi.',
                'uraian_laporan.min' => 'Uraian laporan minimal 10 karakter.',
            ]);
        }

        try {
            \Illuminate\Support\Facades\DB::transaction(function () {
                if (!Auth::check()) {
                    $user = \App\Models\User::create([
                        'name' => $this->nama_pelapor,
                        'no_kontak' => $this->nomor_kontak,
                        'nip' => $this->nip,
                        'opd_id' => $this->opd_id,
                        'email' => $this->email,
                        'password' => bcrypt($this->password),
                    ]);
                    $user->assignRole('pengguna');
                    Auth::login($user);
                }

                $lapor = Lapor::create([
                    'user_id' => Auth::id(),
                    'no_tiket' => $this->no_tiket,
                    'nama_pelapor' => Auth::user()->name,
                    'nomor_kontak' => Auth::user()->no_kontak,
                    'opd_id' => $this->opd_id,
                    'jenis_laporan' => $this->jenis_laporan,
                    'uraian_laporan' => $this->uraian_laporan,
                    'foto_laporan' => $this->foto_laporan ? $this->foto_laporan->store('foto_laporan', 'public') : null,
                    'file_laporan' => $this->file_laporan ? $this->file_laporan->store('laporan', 'public') : null,
                    'status_laporan' => \App\Enums\StatusLaporan::BELUM_DIPROSES->value,
                    'keterangan_petugas' => 'Belum ada',
                    'tgl_laporan' => $this->tgl_laporan,
                ]);

                $this->submittedNoTiket = $lapor->no_tiket;
            });
            
            $this->isSubmitted = true;
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function resetForm(): void
    {
        $this->reset();
        $this->mount();
    }

    public function render()
    {
        return view('livewire.public-lapor-form', [
            'opds' => Opd::query()->orderBy('nama', 'asc')->get(),
        ]);
    }
}
