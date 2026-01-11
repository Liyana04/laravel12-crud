<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Flux;

class PostCreate extends Component
{
    public $title, $body;
    
    public function render()
    {
        return view('livewire.post-create');
    }

    function submit()
    {
        $this->validate([
            'title' => 'required|min:6',
            'body' => 'required|min:10',
        ]);

        // Logic to create a new post would go here
        Post::create([
            'title' => $this->title,
            'body' => $this->body,
        ]);

        // Reset form fields after submission
        $this->reset(['title', 'body']);
        Flux::modal("create-post")->close();
        $this->dispatch(event: 'reloadPost');

        // Optionally, you could emit an event or set a session message here
        
    }
}
