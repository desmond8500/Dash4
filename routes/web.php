<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

// Welcome Page
Route::livewire('/', 'pages::welcome-page')->name('welcome-page');

// Auth
Route::livewire('/login', 'pages::auth.login-page')->name('login');
Route::livewire('/register', 'pages::auth.register-page')->name('register');
Route::livewire('/reset', 'pages::auth.reset-page')->name('reset');

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

// Accounting
Route::livewire('/accounting', 'pages::accounting.accounting-page')->name('accounting');
Route::livewire('/invoices', 'pages::accounting.invoices-page')->name('invoices');
Route::livewire('/invoice', 'pages::accounting.invoice-page')->name('invoice');

// Inventory
Route::livewire('/items', 'pages::inventory.items-page')->name('items');
Route::livewire('/item', 'pages::inventory.item-page')->name('items');
Route::livewire('/suppliers', 'pages::inventory.suppliers-page')->name('suppliers');
Route::livewire('/supplier', 'pages::inventory.supplier-page')->name('suppliers');
Route::livewire('/brands', 'pages::inventory.brands-page')->name('brands');
Route::livewire('/brand', 'pages::inventory.brand-page')->name('brands');
Route::livewire('/purchases', 'pages::inventory.purchases-page')->name('purchases');
Route::livewire('/purchase', 'pages::inventory.purchase-page')->name('purchases');
Route::livewire('/inventory_settings', 'pages::inventory.inventory-settings-page')->name('inventory-settings');
Route::livewire('/orders', 'pages::inventory.orders-page')->name('orders');
Route::livewire('/storage', 'pages::inventory.storage-page')->name('storage');

// Medias
Route::livewire('/images', 'pages::medias.images-page')->name('images');
Route::livewire('/videos', 'pages::medias.videos-page')->name('videos');
Route::livewire('/video', 'pages::medias.video-page')->name('videos');
Route::livewire('/games', 'pages::medias.games-page')->name('games');
Route::livewire('/game', 'pages::medias.game-page')->name('game');

// Personnal
Route::livewire('/cvs', 'pages::user.cvs-page')->name('cvs');
Route::livewire('/cv', 'pages::user.cv-page')->name('cv');
Route::livewire('/personas', 'pages::user.personas-page')->name('personas');
Route::livewire('/kits', 'pages::user.kits-page')->name('kits');
Route::livewire('/kit', 'pages::user.kit-page')->name('kit');
Route::livewire('/softwares', 'pages::user.softwares-page')->name('softwares');
Route::livewire('/software', 'pages::user.software-page')->name('software');
Route::livewire('/websites', 'pages::user.websites-page')->name('websites');

// Settings
Route::livewire('/users', 'pages::config.users-page')->name('users');

// Test
Route::get('test-pdf', function () {
    return TestController::pdf();
})->name('task_pdf');

