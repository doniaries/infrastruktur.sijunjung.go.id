<?php

namespace App\Livewire;

use App\Models\Inventaris;
use App\Models\Peralatan;
use App\Helpers\CacheHelper;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Lazy;

#[Lazy]
class ListInventaris extends Component
{
    use WithPagination;

    public $search = '';
    public $opdFilter = '';
    public $peralatanFilter = '';
    public $perPage = 10;
    public $sortField = 'opd';
    public $sortDirection = 'asc';

    protected $queryString = ['search', 'opdFilter', 'peralatanFilter', 'sortField', 'sortDirection'];

    public function updatingSearch() { $this->resetPage(); }
    public function updatingOpdFilter() { $this->resetPage(); }
    public function updatingPeralatanFilter() { $this->resetPage(); }

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
        $query = Inventaris::query()->with(['opd', 'peralatan'])
            ->when($this->search, function ($q) {
                $term = '%'.$this->search.'%';
                $q->where(function($sub) use ($term) {
                    $sub->where('jenis_peralatan', 'like', $term)
                        ->orWhere('status', 'like', $term)
                        ->orWhereHas('opd', fn($oq) => $oq->where('nama', 'like', $term))
                        ->orWhereHas('peralatan', fn($pq) => $pq->where('nama', 'like', $term));
                });
            })
            ->when($this->opdFilter, fn($q) => $q->where('opd_id', $this->opdFilter))
            ->when($this->peralatanFilter, fn($q) => $q->where('peralatan_id', $this->peralatanFilter));

        switch ($this->sortField) {
            case 'opd':
                $query->join('opds', 'inventaris.opd_id', '=', 'opds.id')
                    ->orderBy('opds.nama', $this->sortDirection)
                    ->select('inventaris.*');
                break;
            case 'peralatan':
                $query->join('peralatans', 'inventaris.peralatan_id', '=', 'peralatans.id')
                    ->orderBy('peralatans.nama', $this->sortDirection)
                    ->select('inventaris.*');
                break;
            case 'jumlah':
                $query->orderBy('inventaris.jumlah', $this->sortDirection);
                break;
            case 'status':
                $query->orderBy('inventaris.status', $this->sortDirection);
                break;
            default:
                $query->orderBy('inventaris.id', 'desc');
        }

        return $query;
    }

    public function getOpds()
    {
        return CacheHelper::getOpds();
    }

    public function getPeralatanOptions()
    {
        return Peralatan::orderBy('nama')->get();
    }

    public function render()
    {
        $items = $this->buildQuery()->paginate($this->perPage);
        return view('livewire.list-inventaris', [
            'totalData' => $items->total(),
            'inventaris' => $items,
            'opds' => $this->getOpds(),
            'peralatans' => $this->getPeralatanOptions(),
        ]);
    }
}