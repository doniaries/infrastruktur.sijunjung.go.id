<?php

namespace App\Livewire;

use App\Models\Lapor;
use Livewire\Component;

class SearchLaporan extends Component
{
    public $query = '';
    public $results = [];
    public $highlightIndex = 0;
    public $showResults = false;

    protected $listeners = ['resetSearch' => 'resetSearch'];

    public function updatedQuery()
    {
        if (strlen($this->query) > 2) {
            $this->results = Lapor::query()
                ->where('uraian_laporan', 'like', '%' . $this->query . '%')
                ->orWhere('no_tiket', 'like', '%' . $this->query . '%')
                ->orWhere('nama_pelapor', 'like', '%' . $this->query . '%')
                ->with('opd')
                ->orderBy('created_at', 'desc')
                ->take(5)
                ->get()
                ->toArray();
            
            $this->showResults = true;
        } else {
            $this->results = [];
            $this->showResults = false;
        }
    }

    public function selectResult($index = null)
    {
        if (!is_null($index)) {
            $this->highlightIndex = $index;
        }

        if (isset($this->results[$this->highlightIndex])) {
            $laporan = $this->results[$this->highlightIndex];
            return redirect()->route('list.laporan', ['ticket' => $laporan['no_tiket']]);
        }
    }

    public function resetSearch()
    {
        $this->query = '';
        $this->results = [];
        $this->showResults = false;
    }

    public function render()
    {
        return view('livewire.search-laporan');
    }
}
