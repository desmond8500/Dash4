<?php

use Livewire\Component;

new class extends Component
{
    public bool $showModal = false;
    public string $content = '';

    public function openModal()
    {
        $this->content = 'Bonjour depuis Livewire !';
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function save()
    {
        // Traitement...

        $this->closeModal();
    }

   
};
?>

<div>

    <button class="btn btn-primary" wire:click="openModal">
        Ouvrir
    </button>

    @if($showModal)
    <div class="modal fade show d-block" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>

                    <button class="btn-close" wire:click="closeModal">
                    </button>
                </div>

                <div class="modal-body">
                    {{ $content }} 
                    {{ $slot }} 
                </div>

                <div class="modal-footer">

                    <button class="btn btn-secondary" wire:click="closeModal">
                        Fermer
                    </button>

                    <button class="btn btn-primary" wire:click="save">
                        Enregistrer
                    </button>

                </div>

            </div>
        </div>
    </div>

    <div class="modal-backdrop fade show"></div>
    @endif

</div>