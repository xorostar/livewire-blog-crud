<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class Datatables extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';


    public function render()
    {
        $posts = $this->posts->paginate(4);
        return view('livewire.datatables', compact('posts'));
    }
}
