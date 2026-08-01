<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

// Welcome Page
Route::livewire('/', 'pages::welcome-page')->name('welcome-page');

// CRM
Route::livewire('/customers', 'pages::crm.customers-page')->name('customers');
Route::livewire('/customer', 'pages::crm.customer-page')->name('customer');

// Test
Route::get('test-pdf', function () {
    return TestController::pdf();
})->name('task_pdf');

