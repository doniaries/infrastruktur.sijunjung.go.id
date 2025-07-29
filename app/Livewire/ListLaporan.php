<?php

namespace App\Livewire;

use App\Enums\StatusLaporan;
use App\Models\Lapor;
use App\Models\Opd;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Cache;
use App\Helpers\CacheHelper;

class ListLaporan extends Component
{
    use WithPagination;

    public $ticket;
    public $search = '';
    public $statusFilter = '';
    public $opdFilter = '';
    public $perPage = 5;
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    protected $queryString = ['search', 'statusFilter', 'opdFilter', 'ticket', 'sortField', 'sortDirection'];

    public function mount()
    {
        // Mengambil parameter ticket dari URL jika ada
        $this->ticket = request()->get('ticket');

        // Mengambil parameter search dari URL jika ada
        $this->search = request()->get('search', '');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatusFilter()
    {
        $this->resetPage();
    }

    public function updatingOpdFilter()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
        $this->resetPage();
    }

    private function buildQuery()
    {
        $query = Lapor::withRelations()
            ->filterBySearch($this->search)
            ->filterByStatus($this->statusFilter)
            ->filterByOpd($this->opdFilter)
            ->when($this->ticket, function ($query) {
                $query->where('no_tiket', $this->ticket);
            });

        // Apply sorting
        switch ($this->sortField) {
            case 'opd':
                $query->join('opds', 'lapors.opd_id', '=', 'opds.id')
                      ->orderBy('opds.nama', $this->sortDirection)
                      ->select('lapors.*');
                break;
            case 'no_tiket':
                $query->orderBy('lapors.no_tiket', $this->sortDirection);
                break;
            case 'nama_pelapor':
                $query->orderBy('lapors.nama_pelapor', $this->sortDirection);
                break;
            case 'uraian_laporan':
                $query->orderBy('lapors.uraian_laporan', $this->sortDirection);
                break;
            case 'status_laporan':
                $query->orderBy('lapors.status_laporan', $this->sortDirection);
                break;
            case 'keterangan_petugas':
                $query->orderBy('lapors.keterangan_petugas', $this->sortDirection);
                break;
            case 'created_at':
            default:
                $query->orderBy('lapors.created_at', $this->sortDirection);
                break;
        }

        return $query;
    }

    public function getLaporans()
    {
        return $this->buildQuery()->paginate($this->perPage);
    }

    public function getOpds()
    {
        return CacheHelper::getOpds();
    }
    //             'Laporan Gangguan' => 'Laporan Gangguan',
    //             'Koordinasi Teknis' => 'Koordinasi Teknis',
    //         ])
    //         ->default('Laporan Gangguan')
    //         ->required(),

    //     Textarea::make('uraian_laporan')
    //         ->label('Uraian Laporan')
    //         ->required()
    //         ->rows(5),

    //     FileUpload::make('file_laporan')
    //         ->label('Lampiran')
    //         ->directory('public/laporan')
    //         ->maxSize(5120)
    //         ->acceptedFileTypes(['application/pdf', 'image/*']),
    // ])
    // ->mutateFormDataUsing(function (array $data): array {
    //     do {
    //         $noTiket = strtoupper(Carbon::now()->format('ymd') . Str::random(3));
    //     } while (Lapor::where('no_tiket', $noTiket)->exists());
    //     $data['no_tiket'] = $noTiket;
    //     $data['status_laporan'] = 'Belum Diproses';
    //     $data['keterangan_petugas'] = 'Belum ada keterangan';
    //     return $data;
    // })
    // ->successNotification(
    //     Notification::make()
    //         ->title('Laporan Berhasil Dibuat')
    //         ->body(fn(Lapor $record) => "Laporan baru dengan nomor tiket {$record->no_tiket} telah diterima ke sistem")
    //         ->icon('heroicon-o-check-circle')
    //         ->iconColor('success')
    //         ->duration(5000)
    //         ->persistent()
    //         ->actions([
    //             \Filament\Notifications\Actions\Action::make('view')
    //                 ->label('Lihat Laporan')
    //                 ->url(fn(Lapor $record): string => route('list.laporan')) // Assuming 'list.laporan' is the correct route name
    //                 ->button()
    //         ])
    // )
    // ->failureNotification(
    //     Notification::make()
    //         ->danger()
    //         ->title('Gagal Membuat Laporan')
    //         ->body('Terjadi kesalahan saat membuat laporan. Nomor tiket mungkin sudah ada atau ada kesalahan lain.')
    // )
    // ])
    // ->emptyStateHeading('Belum Ada Laporan')

    public function render()
    {
        $laporans = $this->getLaporans();

        return view('livewire.list-laporan', [
            'totalLaporan' => $laporans->total(),
            'laporans' => $laporans,
            'opds' => $this->getOpds()
        ]);
    }
}
