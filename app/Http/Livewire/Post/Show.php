<?php

namespace App\Http\Livewire\Post;

use App\Post;
use Faker\Guesser\Name;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Show extends Component
{
    public function index(Request $request)
    {
        $post = Post::where([
            ['name', '!=', Null],
            [function ($query) use ($request){
                if (($term = $request->term)){
                    $query->orWhere('title', 'Like', '%'. $term . '%')->get();
                }
            }]
        ])->orderBy("id", "desc");

    }
    public function render(Post $post)
    {
        $posts = Auth::user()->posts()->paginate(5);
        return view('livewire.post.show', compact('posts'));
    }
}
