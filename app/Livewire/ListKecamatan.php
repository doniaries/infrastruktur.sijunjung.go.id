<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Kecamatan;
use Illuminate\Support\Facades\DB;

class ListKecamatan extends Component
{
    public $search = '';
    public $perPage = 12;

    public function render()
    {
        $kecamatans = Kecamatan::withCount(['nagari'])
            ->withCount(['nagari as jorong_count' => function($query) {
                $query->select(DB::raw('sum((select count(*) from jorongs where jorongs.nagari_id = nagaris.id))'));
            }])
            ->when($this->search, function($query) {
                $query->where('nama', 'like', '%' . $this->search . '%');
            })
            ->orderBy('nama')
            ->paginate($this->perPage);

        return view('livewire.list-kecamatan', [
            'kecamatans' => $kecamatans
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
