<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class DataTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function mount()
    {
    }

    public function render()
    {
        $posts = Auth::user()->posts()->paginate(1);
        return view('livewire.data-table', compact('posts'));
    }
}
