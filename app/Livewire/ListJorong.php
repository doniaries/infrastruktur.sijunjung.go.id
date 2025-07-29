<?php

namespace App\Livewire;

use App\Models\Jorong;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Cache;
use App\Helpers\CacheHelper;

class ListJorong extends Component
{
    use WithPagination;

    public $search = '';
    public $nagariFilter = '';
    public $kecamatanFilter = '';
    public $perPage = 5;
    public $sortField = 'nama_jorong';
    public $sortDirection = 'asc';

    protected $queryString = ['search', 'nagariFilter', 'kecamatanFilter', 'sortField', 'sortDirection'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingNagariFilter()
    {
        $this->resetPage();
    }

    public function updatingKecamatanFilter()
    {
        $this->resetPage();
    }

    public function updatedKecamatanFilter()
    {
        // Reset nagari filter when kecamatan changes
        $this->nagariFilter = '';
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
        $query = Jorong::withRelations()
            ->filterBySearch($this->search)
            ->filterByNagari($this->nagariFilter)
            ->filterByKecamatan($this->kecamatanFilter);

        // Apply sorting
        switch ($this->sortField) {
            case 'kecamatan':
                $query->join('nagaris', 'jorongs.nagari_id', '=', 'nagaris.id')
                    ->join('kecamatans', 'nagaris.kecamatan_id', '=', 'kecamatans.id')
                    ->orderBy('kecamatans.nama', $this->sortDirection)
                    ->select('jorongs.*');
                break;
            case 'nagari':
                $query->join('nagaris', 'jorongs.nagari_id', '=', 'nagaris.id')
                    ->orderBy('nagaris.nama_nagari', $this->sortDirection)
                    ->select('jorongs.*');
                break;
            case 'nama_jorong':
                $query->orderBy('jorongs.nama_jorong', $this->sortDirection);
                break;
            case 'nama_kepala_jorong':
                $query->orderBy('jorongs.nama_kepala_jorong', $this->sortDirection);
                break;
            case 'jumlah_penduduk_jorong':
                $query->orderBy('jorongs.jumlah_penduduk_jorong', $this->sortDirection);
                break;
            case 'luas_jorong':
                $query->orderBy('jorongs.luas_jorong', $this->sortDirection);
                break;
            default:
                $query->orderByKecamatanAndJorong();
                break;
        }

        return $query;
    }

    public function getJorongs()
    {
        return $this->buildQuery()->paginate($this->perPage);
    }

    public function getNagaris()
    {
        // If kecamatan filter is set, only show nagaris from that kecamatan
        if ($this->kecamatanFilter) {
            return \App\Models\Nagari::where('kecamatan_id', $this->kecamatanFilter)
                ->orderBy('nama_nagari')
                ->get();
        }

        // Otherwise show all nagaris
        return CacheHelper::getNagaris();
    }

    public function getKecamatans()
    {
        return CacheHelper::getKecamatans();
    }

    public function exportPdf()
    {
        $jorongs = $this->buildQuery()->get();

        $pdf = Pdf::loadView('exports.jorong-pdf', [
            'jorongs' => $jorongs,
            'totalData' => $jorongs->count(),
            'filters' => [
                'search' => $this->search,
                'nagariFilter' => $this->nagariFilter,
                'kecamatanFilter' => $this->kecamatanFilter
            ]
        ]);

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'data-jorong-' . date('Y-m-d') . '.pdf');
    }

    public function render()
    {
        $jorongs = $this->getJorongs();
        return view('livewire.list-jorong', [
            'totalData' => $jorongs->total(),
            'jorongs' => $jorongs,
            'nagaris' => $this->getNagaris(),
            'kecamatans' => $this->getKecamatans()
        ]);
    }
}
