<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

// Welcome Page
Route::livewire('/', 'pages::welcome-page')->name('welcome-page');

// CRM
Route::livewire('/customers', 'pages::crm.customers-page')->name('customers');
Route::livewire('/customer', 'pages::crm.customer-page')->name('customer');
Route::livewire('/projects', 'pages::crm.projects-page')->name('projects');
Route::livewire('/project', 'pages::crm.project-page')->name('project');
Route::livewire('/quotation', 'pages::crm.quotation-page')->name('quotation');
Route::livewire('/quotation_model', 'pages::crm.quotation-model-page')->name('quotation-model');
Route::livewire('/tasks', 'pages::crm.tasks-page')->name('tasks');
Route::livewire('/task', 'pages::crm.task-page')->name('tasks');

// Company
Route::livewire('/company', 'pages::config.company-page')->name('company');

// Inventory
Route::livewire('/items', 'pages::inventory.items-page')->name('items');
Route::livewire('/item', 'pages::inventory.item-page')->name('items');
Route::livewire('/suppliers', 'pages::inventory.suppliers-page')->name('suppliers');
Route::livewire('/supplier', 'pages::inventory.supplier-page')->name('suppliers');
Route::livewire('/brands', 'pages::inventory.brands-page')->name('brands');
Route::livewire('/brand', 'pages::inventory.brand-page')->name('brands');
Route::livewire('/purchases', 'pages::inventory.purchases-page')->name('purchases');
Route::livewire('/purchase', 'pages::inventory.purchase-page')->name('purchases');

// Medias
Route::livewire('/images', 'pages::medias.images-page')->name('images');
Route::livewire('/videos', 'pages::medias.videos-page')->name('videos');
Route::livewire('/video', 'pages::medias.video-page')->name('videos');
Route::livewire('/games', 'pages::medias.games-page')->name('gamess');
Route::livewire('/game', 'pages::medias.game-page')->name('gamess');

// Settings
Route::livewire('/users', 'pages::config.users-page')->name('users');

// Test
Route::get('test-pdf', function () {
    return TestController::pdf();
})->name('task_pdf');

