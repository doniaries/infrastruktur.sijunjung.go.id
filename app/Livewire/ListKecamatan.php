<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Kecamatan;

class ListKecamatan extends Component
{
    use WithPagination;
    public $search = '';
    public $perPage = 10;
    public $sortField = 'nama';
    public $sortDirection = 'asc';

    protected $queryString = ['search', 'perPage', 'sortField', 'sortDirection'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
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

    public function render()
    {
        $kecamatans = Kecamatan::withCount(['nagari'])
            ->with(['nagari']) // Important for penduduk calculation
            ->when($this->search, function ($query) {
                $query->where('nama', 'like', '%' . $this->search . '%');
            });

        // Handle custom sorting for relationship counts if needed, but for now focus on direct fields
        if ($this->sortField === 'nagari_count') {
            $kecamatans->orderBy('nagari_count', $this->sortDirection);
        } else {
            $kecamatans->orderBy($this->sortField, $this->sortDirection);
        }

        $kecamatans = $kecamatans->paginate($this->perPage);

        return view('livewire.list-kecamatan', [
            'kecamatans' => $kecamatans
        ]);
    }
}
