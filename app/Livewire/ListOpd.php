<?php

namespace App\Livewire;

use App\Models\Opd;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Lazy;

#[Lazy]
class ListOpd extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    public $sortField = 'nama';
    public $sortDirection = 'asc';

    protected $queryString = ['search', 'sortField', 'sortDirection'];

    public function updatingSearch()
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
        $query = Opd::query()
            ->when($this->search, fn($q) => $q->search($this->search));

        $query->orderBy($this->sortField, $this->sortDirection);

        return $query;
    }

    public function getOpds()
    {
        return $this->buildQuery()->paginate($this->perPage);
    }

    public function render()
    {
        $opds = $this->getOpds();
        return view('livewire.list-opd', [
            'totalData' => $opds->total(),
            'opds' => $opds,
        ]);
    }
}