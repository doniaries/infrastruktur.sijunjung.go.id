<?php

namespace App\Livewire;

use App\Models\Nagari;
use Livewire\Component;
use Livewire\WithPagination;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Cache;
use App\Helpers\CacheHelper;
use Livewire\Attributes\Lazy;

#[Lazy]
class ListNagari extends Component
{
    use WithPagination;

    public $search = '';
    public $kecamatanFilter = '';
    public $perPage = 10;
    public $sortField = 'nama_nagari';
    public $sortDirection = 'asc';

    protected $queryString = ['search', 'kecamatanFilter', 'sortField', 'sortDirection'];

    // public function placeholder()
    // {
    //     return view('livewire.placeholders.table-placeholder', [
    //         'title' => 'Memuat Data Nagari',
    //         'message' => 'Sedang mengambil data nagari dari database...'
    //     ]);
    // }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingKecamatanFilter()
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
        $query = Nagari::withRelations()
            ->withCount('jorongs')
            ->selectSub(function($query) {
                $query->from('jorongs')
                    ->selectRaw('COALESCE(SUM(jumlah_penduduk_jorong), 0)')
                    ->whereColumn('jorongs.nagari_id', 'nagaris.id');
            }, 'jorongs_sum_jumlah_penduduk_jorong')
            ->filterBySearch($this->search)
            ->filterByKecamatan($this->kecamatanFilter);

        // Apply sorting
        switch ($this->sortField) {
            case 'kecamatan':
                $query->join('kecamatans', 'nagaris.kecamatan_id', '=', 'kecamatans.id')
                    ->orderBy('kecamatans.nama', $this->sortDirection)
                    ;
                break;
            case 'jumlah_penduduk':
                $query->orderByRaw('(
                    SELECT COALESCE(SUM(jorongs.jumlah_penduduk_jorong), 0)
                    FROM jorongs
                    WHERE jorongs.nagari_id = nagaris.id
                ) ' . $this->sortDirection);
                break;
            case 'luas_nagari':
                $query->orderBy('luas_nagari', $this->sortDirection);
                break;
            case 'nama_nagari':
                $query->orderBy('nama_nagari', $this->sortDirection);
                break;
            case 'nama_wali_nagari':
                $query->orderBy('nama_wali_nagari', $this->sortDirection);
                break;
            case 'jorongs_count':
                $query->orderBy('jorongs_count', $this->sortDirection);
                break;
            default:
                $query->orderByKecamatanAndNagari();
        }

        return $query;
    }

    public function getNagaris()
    {
        return $this->buildQuery()->paginate($this->perPage);
    }

    public function getKecamatans()
    {
        return CacheHelper::getKecamatans();
    }

    public function exportPdf()
    {
        $nagaris = $this->buildQuery()->get();

        $pdf = Pdf::loadView('exports.nagari-pdf', [
            'nagaris' => $nagaris,
            'totalData' => $nagaris->count(),
            'filters' => [
                'search' => $this->search,
                'kecamatanFilter' => $this->kecamatanFilter
            ]
        ]);

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'data-nagari-' . date('Y-m-d') . '.pdf');
    }

    public function render()
    {
        $nagaris = $this->getNagaris();
        return view('livewire.list-nagari', [
            'totalData' => $nagaris->total(),
            'nagaris' => $nagaris,
            'kecamatans' => $this->getKecamatans()
        ]);
    }
}
