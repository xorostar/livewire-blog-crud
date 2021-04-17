<?php

namespace App\Http\Livewire\Posts;

use App\Post;
use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Livewire\WithSorting;

class Index extends Component
{
    use WithPagination, WithSorting;

    protected $paginationTheme = 'bootstrap';
    public $perPage = 10;
    public $search;

    // public function updatingSearch(){
    //     $this->resetPage();
    // }

    // public function updatingPerPage()
    // {
    //     $this->resetPage();
    // }

    public function updating()
    {
        $this->resetPage();
    }

    public function getPosts()
    {
        return Post::with('user:id,name')->when($this->search, function ($query, $value) {
            $query->where('title', 'LIKE', '%' . $value . '%')->orWhere('excerpt', 'LIKE', '%' . $value . '%')->orWhere('body', 'LIKE', '%' . $value . '%');
        })->orderBy($this->sortBy, $this->sortDirection)->paginate($this->perPage);
    }

    public function render()
    {
        $posts = $this->getPosts();
        return view('livewire.posts.index', compact('posts'));
    }
}
