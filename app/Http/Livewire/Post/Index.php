<?php

namespace App\Http\Livewire\Post;

use App\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $perPage = 10;
    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Post::with('user');
        if ($this->search) {
            $query->where('title', 'like', '%' . $this->search . '%')
                ->orWhere('excerpt', 'like', '%' . $this->search . '%')
                ->orWhere('body', 'like', '%' . $this->search . '%');
        }
        $posts = $query->paginate($this->perPage);

        return view('livewire.post.index', compact('posts'));
    }
}
