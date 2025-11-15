<?php

namespace App\Livewire;

use App\Models\Peralatan;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Lazy;

#[Lazy]
class ListPeralatan extends Component
{
    use WithPagination;

    public $search = '';
    public $jenisFilter = '';
    public $perPage = 10;
    public $sortField = 'nama';
    public $sortDirection = 'asc';

    protected $queryString = ['search', 'jenisFilter', 'sortField', 'sortDirection'];

    public function updatingSearch() { $this->resetPage(); }
    public function updatingJenisFilter() { $this->resetPage(); }

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
        $query = Peralatan::query()
            ->when($this->search, fn($q) => $q->where('nama', 'like', '%'.$this->search.'%'))
            ->when($this->jenisFilter, fn($q) => $q->where('jenis_peralatan', $this->jenisFilter));

        $query->orderBy($this->sortField, $this->sortDirection);
        return $query;
    }

    public function getJenisOptions()
    {
        return Peralatan::distinct()->pluck('jenis_peralatan')->filter()->sort()->values();
    }

    public function render()
    {
        $peralatans = $this->buildQuery()->paginate($this->perPage);
        return view('livewire.list-peralatan', [
            'totalData' => $peralatans->total(),
            'peralatans' => $peralatans,
            'jenisOptions' => $this->getJenisOptions(),
        ]);
    }
}