<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div>
    <h1>Dash 4</h1>
    <p>The new version of our Security Company Management ERP.</p>

    <ul>
        <li>
            <a href="/test-pdf" target="_blank" class="btn btn-primary">Generate PDF</a>
        </li>
        <li>
            <a href="/customers" wire:navigate  class="btn btn-primary">Clients</a>
        </li>
        <li>
            <a href="/docs/api" target="_blank" class="btn btn-primary">Scrammble</a>
        </li>
    </ul>

    @livewire('modal')

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

</div>
