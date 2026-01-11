<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Post;
use Flux;

class Posts extends Component
{
    public $posts, $postId;

    public function mount()
    {
        // Fetch all posts from the database when the component is initialized
        $this->posts = \App\Models\Post::all();
    }

    public function render()
    {
        return view('livewire.posts');
    }

    #[On('reloadPost')]
    public function reloadPost()
    {
        // Refresh the posts list
        $this->posts = Post::all();
    }

    public function edit($id)
    {
        // Logic to edit a post would go here
        $this->dispatch('editPost', id: $id);
    }

    public function delete($id)
    {
        $this->postId = $id;
        Flux::modal("delete-post")->show();
        // Logic to delete a post would go here

    }

    public function destroy()
    {
        Post::find($this->postId)->delete();
        $this->reloadPost(); 
        Flux::modal("delete-post")->close();
    }

}
