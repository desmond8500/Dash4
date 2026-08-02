<?php

use Livewire\Component;

new class extends Component
{
    public $showModal = false;
    public $content = '';

    public function save()
    {
        Post::create(['content' => $this->content]);
        $this->reset('content');
 
        $this->showModal = false;
    }
};
?>

<div>
    <button x-on:click="$wire.showModal = true">New Post</button>

    <div class="dropdown open">
        <button class="btn btn-action" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
            <i class="ti ti-chevron-down"></i>
        </button>
        <div class="dropdown-menu" aria-labelledby="triggerId">
            <a class="dropdown-item" wire:click="edit_brand()"> <i class="ti ti-edit"></i> Editer</a>
            <a class="dropdown-item text-danger" wire:click="delete_brand()"> <i class="ti ti-trash"></i> Supprimer</a>
        </div>
    </div>
    
    <div wire:show="showModal" x-transition.duration.500ms>
        <form wire:submit="save">
            <textarea wire:model="content"></textarea>
    
            <button type="submit">Save Post</button>
        </form>
    </div>
</div>