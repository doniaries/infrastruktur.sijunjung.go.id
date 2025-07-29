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
    public $sortField = 'tahun_bangun';
    public $sortDirection = 'desc';

    protected $queryString = ['search', 'operatorFilter', 'kecamatanFilter', 'teknologiFilter', 'statusFilter', 'sortField', 'sortDirection'];

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
        $query = Bts::query()
            ->withRelations()
            ->filterBySearch($this->search)
            ->filterByOperator($this->operatorFilter)
            ->filterByKecamatan($this->kecamatanFilter)
            ->filterByTeknologi($this->teknologiFilter)
            ->filterByStatus($this->statusFilter);

        // Apply sorting
        switch ($this->sortField) {
            case 'operator':
                $query->join('operators', 'bts.operator_id', '=', 'operators.id')
                      ->orderBy('operators.nama_operator', $this->sortDirection)
                      ->select('bts.*');
                break;
            case 'kecamatan':
                $query->join('kecamatans', 'bts.kecamatan_id', '=', 'kecamatans.id')
                      ->orderBy('kecamatans.nama', $this->sortDirection)
                      ->select('bts.*');
                break;
            case 'nagari':
                $query->join('nagaris', 'bts.nagari_id', '=', 'nagaris.id')
                      ->orderBy('nagaris.nama_nagari', $this->sortDirection)
                      ->select('bts.*');
                break;
            case 'alamat':
                $query->orderBy('alamat', $this->sortDirection);
                break;
            case 'teknologi':
                $query->orderBy('teknologi', $this->sortDirection);
                break;
            case 'status':
                $query->orderBy('status', $this->sortDirection);
                break;
            case 'tahun_bangun':
                $query->orderBy('tahun_bangun', $this->sortDirection);
                break;
            default:
                $query->orderBy('tahun_bangun', 'desc');
        }

        return $query;
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
