<?php

namespace App\Livewire\Buttons;

use Illuminate\Support\Facades\File;
use Livewire\Component;

class Delete extends Component
{
    public $post;
    public $confirmingPostDeletion = false;

    public function confirmPostDeletion()
    {
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('confirming-delete-post');
        $this->confirmingPostDeletion = false;
    }


    public function deletePost()
    {
        File::delete(storage_path('img/blog' . $this->post->cover_image));
        $this->post->delete();

        session()->flash('success', 'Post Succesfully Deleted');

        return redirect()->route('posts.index');
    }

    public function render()
    {
        return view('livewire.buttons.delete');
    }
}
