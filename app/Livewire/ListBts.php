<?php

namespace App\Livewire;

use App\Models\Bts;
use Livewire\Component;
use Livewire\WithPagination;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Cache;
use App\Helpers\CacheHelper;

class ListBts extends Component
{
    use WithPagination;

    public $search = '';
    public $operatorFilter = '';
    public $kecamatanFilter = '';
    public $teknologiFilter = '';
    public $statusFilter = '';
    public $perPage = 5;

    protected $queryString = ['search', 'operatorFilter', 'kecamatanFilter', 'teknologiFilter', 'statusFilter'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingOperatorFilter()
    {
        $this->resetPage();
    }

    public function updatingKecamatanFilter()
    {
        $this->resetPage();
    }

    public function updatingTeknologiFilter()
    {
        $this->resetPage();
    }

    public function updatingStatusFilter()
    {
        $this->resetPage();
    }

    private function buildQuery()
    {
        return Bts::query()
            ->withRelations()
            ->filterBySearch($this->search)
            ->filterByOperator($this->operatorFilter)
            ->filterByKecamatan($this->kecamatanFilter)
            ->filterByTeknologi($this->teknologiFilter)
            ->filterByStatus($this->statusFilter)
            ->orderBy('tahun_bangun', 'desc');
    }

    public function getBts()
    {
        return $this->buildQuery()->paginate($this->perPage);
    }

    public function getOperators()
    {
        return CacheHelper::getOperators();
    }

    public function getKecamatans()
    {
        return CacheHelper::getKecamatans();
    }


    public function exportPdf()
    {
        $bts = $this->buildQuery()->get();
        $totalData = $bts->count();

        $pdf = Pdf::loadView('exports.bts-pdf', [
            'bts' => $bts,
            'totalData' => $totalData,
            'search' => $this->search,
            'operatorFilter' => $this->operatorFilter,
            'kecamatanFilter' => $this->kecamatanFilter,
            'teknologiFilter' => $this->teknologiFilter,
            'statusFilter' => $this->statusFilter,
            'operators' => $this->getOperators(),
            'kecamatans' => $this->getKecamatans()
        ]);

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'data-bts-' . date('Y-m-d-H-i-s') . '.pdf');
    }

    public function render()
    {
        $bts = $this->getBts();
        return view('livewire.list-bts', [
            'totalData' => $bts->total(),
            'bts' => $bts,
            'operators' => $this->getOperators(),
            'kecamatans' => $this->getKecamatans()
        ]);
    }
}
