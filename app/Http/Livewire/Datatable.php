<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Post;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Datatable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $pagination = 10;

    public $search = '';

    public $orderBy = 'id';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $user = Auth::user();

        if ($this->search !== '') {
            $posts = $user->posts()->where('title', 'like', '%' . $this->search . '%')
                ->orWhere('excerpt', 'like', '%' . $this->search . '%')
                ->orWhere('body', 'like', '%' . $this->search . '%')
                ->orderBy($this->orderBy)
                ->paginate($this->pagination);
        } else {
            $posts = $user->posts()->orderBy($this->orderBy)->paginate($this->pagination);
        }

        return view('livewire.datatable', compact('posts'));
    }
}
