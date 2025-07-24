<?php

namespace App\Livewire;

use App\Models\Jorong;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;

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

    public function getJorongs()
    {
        return Jorong::query()
            ->with(['nagari.kecamatan'])
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('nama_jorong', 'like', '%' . $this->search . '%')
                      ->orWhere('nama_kepala_jorong', 'like', '%' . $this->search . '%')
                      ->orWhereHas('nagari', function ($nagari) {
                          $nagari->where('nama_nagari', 'like', '%' . $this->search . '%')
                                 ->orWhereHas('kecamatan', function ($kec) {
                                     $kec->where('nama', 'like', '%' . $this->search . '%');
                                 });
                      });
                });
            })
            ->when($this->nagariFilter, function ($query) {
                $query->where('nagari_id', $this->nagariFilter);
            })
            ->when($this->kecamatanFilter, function ($query) {
                $query->whereHas('nagari.kecamatan', function ($q) {
                    $q->where('id', $this->kecamatanFilter);
                });
            })
            ->orderBy('nama_jorong')
            ->paginate($this->perPage);
    }
    
    public function getNagaris()
    {
        return \App\Models\Nagari::orderBy('nama_nagari')->get();
    }
    
    public function getKecamatans()
    {
        return \App\Models\Kecamatan::orderBy('nama')->get();
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
