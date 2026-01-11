<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Flux;
use App\Models\Post;

class PostEdit extends Component
{
    public $title, $body, $postId;
    public function render()
    {
        return view('livewire.post-edit');
    }

    #[On("editPost")]
    public function editPost($id)
    {
        // Logic to edit a post would go here      
        $post = Post::find($id);
        $this->postId = $id;
        $this->title = $post->title;
        $this->body = $post->body;
        Flux::modal("edit-post")->show();
    }

    public function update()
    {
        $this->validate([
            'title' => 'required|min:6',
            'body' => 'required|min:10',
        ]);

        // Logic to update the post would go here
        $post = Post::find($this->postId);
        $post->update([
            'title' => $this->title,
            'body' => $this->body,
        ]);

        $post->save();
        Flux::modal("edit-post")->close();
        $this->dispatch(event: 'reloadPost');

        // Optionally, you could emit an event or set a session message here
        
    }
}
