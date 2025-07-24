<?php

namespace App\Livewire;

use App\Models\Nagari;
use Livewire\Component;
use Livewire\WithPagination;

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

    public function getNagaris()
    {
        return Nagari::query()
            ->with('kecamatan')
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('nama_nagari', 'like', '%' . $this->search . '%')
                      ->orWhere('nama_wali_nagari', 'like', '%' . $this->search . '%')
                      ->orWhere('alamat_kantor', 'like', '%' . $this->search . '%')
                      ->orWhereHas('kecamatan', function ($kec) {
                          $kec->where('nama', 'like', '%' . $this->search . '%');
                      });
                });
            })
            ->when($this->kecamatanFilter, function ($query) {
                $query->where('kecamatan_id', $this->kecamatanFilter);
            })
            ->orderBy('nama_nagari')
            ->paginate($this->perPage);
    }
    
    public function getKecamatans()
    {
        return \App\Models\Kecamatan::orderBy('nama')->get();
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
