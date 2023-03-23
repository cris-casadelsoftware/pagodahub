<?php

namespace App\Http\Livewire;

use App\Models\bankdeposit;
use Livewire\WithPagination;
use App\Models\bankrequest;
use Livewire\Component;

class listbankdeposit extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $searchTerm;
    public $tipo = "Sucursal";
    public $date = "";
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.listbankdeposit', ['bankdeposits' => bankdeposit::orderBy('created_at', 'desc')->paginate(5),]);
    }
}
