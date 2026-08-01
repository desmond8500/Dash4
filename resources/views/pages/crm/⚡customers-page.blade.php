<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div>
    @component('page-header', ['title' => 'Clients', 'breadcrumbs' => [['url' => route('customers'), 'label' => 'Clients']]])
        <button class="btn btn-primary disabled">
            <i class="ti ti-plus"></i>
            Client
        </button>
        <a href="{{ route('customer', ['customer_id' => 1]) }}" class="btn" wire:navigate>
            Details
        </a>
    @endcomponent

</div>