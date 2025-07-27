<?php

namespace App\Livewire;

use App\Models\Jorong;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Barryvdh\DomPDF\Facade\Pdf;

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
            ->join('nagaris', 'jorongs.nagari_id', '=', 'nagaris.id')
            ->join('kecamatans', 'nagaris.kecamatan_id', '=', 'kecamatans.id')
            ->orderBy('kecamatans.nama')
            ->orderBy('jorongs.nama_jorong')
            ->select('jorongs.*')
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

    public function exportPdf()
    {
        $jorongs = Jorong::query()
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
            ->join('nagaris', 'jorongs.nagari_id', '=', 'nagaris.id')
            ->join('kecamatans', 'nagaris.kecamatan_id', '=', 'kecamatans.id')
            ->orderBy('kecamatans.nama')
            ->orderBy('jorongs.nama_jorong')
            ->select('jorongs.*')
            ->get();

        $pdf = Pdf::loadView('exports.jorong-pdf', [
            'jorongs' => $jorongs,
            'totalData' => $jorongs->count(),
            'filters' => [
                'search' => $this->search,
                'nagariFilter' => $this->nagariFilter,
                'kecamatanFilter' => $this->kecamatanFilter
            ]
        ]);

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'data-jorong-' . date('Y-m-d') . '.pdf');
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
