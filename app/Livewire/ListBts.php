<?php

namespace App\Livewire;

use App\Models\Bts;
use Livewire\Component;
use Livewire\WithPagination;

class ListBts extends Component
{
    use WithPagination;
    
    public $search = '';
    public $operatorFilter = '';
    public $kecamatanFilter = '';
    public $teknologiFilter = '';
    public $statusFilter = '';
    public $perPage = 10;
    
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

    public function getBts()
    {
        return Bts::query()
            ->with(['operator', 'kecamatan', 'nagari'])
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('titik_koordinat', 'like', '%' . $this->search . '%')
                      ->orWhere('alamat', 'like', '%' . $this->search . '%')
                      ->orWhereHas('operator', function ($op) {
                          $op->where('nama_operator', 'like', '%' . $this->search . '%');
                      })
                      ->orWhereHas('kecamatan', function ($kec) {
                          $kec->where('nama', 'like', '%' . $this->search . '%');
                      })
                      ->orWhereHas('nagari', function ($nag) {
                          $nag->where('nama_nagari', 'like', '%' . $this->search . '%');
                      });
                });
            })
            ->when($this->operatorFilter, function ($query) {
                $query->where('operator_id', $this->operatorFilter);
            })
            ->when($this->kecamatanFilter, function ($query) {
                $query->where('kecamatan_id', $this->kecamatanFilter);
            })
            ->when($this->teknologiFilter, function ($query) {
                $query->where('teknologi', $this->teknologiFilter);
            })
            ->when($this->statusFilter, function ($query) {
                $query->where('status', $this->statusFilter);
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);
    }
    
    public function getOperators()
    {
        return \App\Models\Operator::orderBy('nama_operator')->get();
    }
    
    public function getKecamatans()
    {
        return \App\Models\Kecamatan::orderBy('nama')->get();
    }


    public function render()
    {
        $totalBts = Bts::count();
        return view('livewire.list-bts', [
            'totalData' => $totalBts,
            'bts' => $this->getBts(),
            'operators' => $this->getOperators(),
            'kecamatans' => $this->getKecamatans()
        ]);
    }
}
