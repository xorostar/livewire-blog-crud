<?php

namespace App\Http\Livewire;

use App\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component
{
    use WithPagination;

    public $postToEdit;
    public $postToEditTitle;
    public $postToEditExcerpt;
    public $postToEditBody;
    public $title;
    public $excerpt;
    public $body;

    protected $paginationTheme = 'bootstrap';

    // protected $rule = [
    //     'title' => 'required|string',
    //     'excerpt' => 'required|string',
    //     'body' => 'required|string'
    // ];

    function storePost()
    {
        $data = $this->validate([
            'title' => 'required|string',
            'excerpt' => 'required|string',
            'body' => 'required|string'
        ]);

        Auth::user()->posts()->create($data);

        $this->title = '';
        $this->excerpt = '';
        $this->body = '';

        $this->emit('postAdded');
    }

    public function editPost(Post $post)
    {
        $this->postToEdit = $post;
        $this->postToEditTitle = $post->title;
        $this->postToEditExcerpt = $post->excerpt;
        $this->postToEditBody = $post->body;

        $this->emit('editPost');
    }

    public function updatePost()
    {
        $data = $this->validate([
            'postToEditTitle' => 'required|string',
            'postToEditExcerpt' => 'required|string',
            'postToEditBody' => 'required|string'
        ]);

        $this->postToEdit->update([
            'title' => $this->postToEditTitle,
            'excerpt' => $this->postToEditExcerpt,
            'body' => $this->postToEditBody,
        ]);

        $this->emit('postUpdated');
    }

    public function destroyPost(Post $post)
    {
        $post->delete();
        $this->emit('postDeleted');
    }



    public function render()
    {
        $posts = Auth::user()->posts()->paginate(5);
        return view('livewire.posts', compact('posts'));
    }
}
