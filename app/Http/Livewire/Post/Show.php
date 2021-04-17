<?php

namespace App\Http\Livewire\Post;

use App\Post;
use Faker\Guesser\Name;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\withPagination;

class Show extends Component
{
    use withPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;

    public function render(Post $post)
    {
        $posts = Auth::user()->posts()->when($this->search, function($query , $value){
            $query->where('title', 'LIKE', '%' . $value .  '%')->orWhere('excerpt', 'LIKE', '%' . $value . '%')->orWhere->orderBy('id','DESC') ;
        })->paginate(5);
        return view('livewire.post.show', compact('posts'));
    }
}
