<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div>
    @component('page-header', [
        'title' => 'Client', 
        'breadcrumbs' => [
            ['url' => route('customers'), 'label' => 'Clients'],
            ['url' => route('customer',['customer_id' => 1]), 'label' => 'Client']
            ]
        ])
    
    @endcomponent
</div>