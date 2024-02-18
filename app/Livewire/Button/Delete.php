<?php

namespace App\Livewire\Button;

use Illuminate\Support\Facades\File;
use Livewire\Component;

class Delete extends Component
{
    public $post;
    public $confirmingPostDeletion = false;

    public function confirmPostdeletion()
    {
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('confirming-delete-post');
        $this->confirmingPostDeletion = true;
    }

    public function deletePost()
    {
        File::delete(storage_path('app/public/images/' . $this->post->cover_image));
        $this->post->delete();

        session()->flash('success', 'Post Succesfully Deleted');

        return redirect()->route('posts.index');
    }

    public function render()
    {
        return view('livewire.button.delete');
    }
}
