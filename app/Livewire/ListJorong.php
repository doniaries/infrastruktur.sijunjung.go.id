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
    public $perPage = 10;
    
    protected $queryString = ['search', 'nagariFilter', 'kecamatanFilter'];
    
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

    private function buildQuery()
    {
        $query = Jorong::withRelations()
            ->filterBySearch($this->search)
            ->filterByNagari($this->nagariFilter)
            ->filterByKecamatan($this->kecamatanFilter);

        $query->orderByKecamatanAndJorong();

        return $query;
    }

    public function getJorongs()
    {
        return $this->buildQuery()->paginate($this->perPage);
    }
    
    public function getNagaris()
    {
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
