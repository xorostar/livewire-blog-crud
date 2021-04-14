<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Post;
use Illuminate\Support\Facades\Auth;
use App\Traits\DataTables\DataTable as UpdatedDataTable;

class Datatable extends Component
{
    use UpdatedDataTable;

    public function render()
    {
        $user = Auth::user();

        if ($this->search !== '') {
            $posts = $user->posts()->where('title', 'like', '%' . $this->search . '%')
                ->orWhere('excerpt', 'like', '%' . $this->search . '%')
                ->orWhere('body', 'like', '%' . $this->search . '%')
                ->orderBy($this->orderBy)
                ->paginate($this->perPage);
        } else {
            $posts = $user->posts()->orderBy($this->orderBy, $this->hasSortBy)->paginate($this->perPage);
        }

        return view('livewire.datatable', compact('posts'));
    }
}
