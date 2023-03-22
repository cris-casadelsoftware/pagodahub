<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use App\Models\bankrequest;
use Livewire\Component;

class listbankrequest extends Component
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
        return view('livewire.listbankrequest', ['bankrequests' => bankrequest::orderBy('created_at', 'desc')->paginate(5),]);
    }
}
