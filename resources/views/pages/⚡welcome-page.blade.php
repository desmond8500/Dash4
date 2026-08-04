<?php

use Livewire\Component;
use App\Models\User;

new class extends Component
{
    function initAdmin(){
        User::create([
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('passer1234'),
            'job_title' => 'Admin',
        ]);
    }
};
?>

<div>
    <h1>Dash 4</h1>
    <p>The new version of our Security Company Management ERP.</p>

    <div class="btn-list">
            <a href="/test-pdf" target="_blank" class="btn btn-primary">Generate PDF</a>
            <a href="/customers" wire:navigate  class="btn btn-primary">Clients</a>
            <a href="/docs/api" target="_blank" class="btn btn-primary">Scrammble</a>
            <div class="btn" wire:click="initAdmin()">Init Admin</div>
    </div>

    <br>

    <livewire:modal x-transition.duration.500ms>

    </livewire:modal>



</div>
