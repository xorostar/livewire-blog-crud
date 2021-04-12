<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class DataTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
    public $records = 10;
    public function mount()
    {
    }

    public function render()
    {
        $posts = Auth::user()->posts()
            ->where('title', 'like', '%' . $this->search . '%')
            ->orWhere('excerpt', 'like', '%' . $this->search . '%')
            ->orWhere('body', 'like', '%' . $this->search . '%')
            ->paginate($this->records);
        return view('livewire.data-table', compact('posts'));
    }
}
