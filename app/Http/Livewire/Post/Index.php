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
    public $orderBy;
    public $order;

    public function toggleOrderBy($column)
    {
        if (!$this->order) {
            $this->order = 'asc';
        } else {
            $this->order = $this->order === 'asc' ? 'desc' : 'asc';
        }
        $this->orderBy = [$column, $this->order];
    }

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

        if (!is_null($this->orderBy)) {
            $query->orderBy(...$this->orderBy);
        }

        $posts = $query->paginate($this->perPage);

        return view('livewire.post.index', compact('posts'));
    }
}
