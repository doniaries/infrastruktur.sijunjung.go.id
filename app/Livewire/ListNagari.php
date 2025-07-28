<?php

namespace App\Livewire;

use App\Models\Nagari;
use Livewire\Component;
use Livewire\WithPagination;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Cache;
use App\Helpers\CacheHelper;

class ListNagari extends Component
{
    use WithPagination;
    
    public $search = '';
    public $kecamatanFilter = '';
    public $perPage = 10;
    
    protected $queryString = ['search', 'kecamatanFilter'];
    
    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public function updatingKecamatanFilter()
    {
        $this->resetPage();
    }

    private function buildQuery()
    {
        $query = Nagari::withRelations()
            ->withCount('jorongs')
            ->with(['jorongs' => function($query) {
                $query->select('nagari_id', 'jumlah_penduduk_jorong');
            }])
            ->filterBySearch($this->search)
            ->filterByKecamatan($this->kecamatanFilter);

        $query->orderByKecamatanAndNagari();

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
