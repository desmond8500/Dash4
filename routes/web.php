<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

// Welcome Page
Route::livewire('/', 'pages::welcome-page')->name('welcome-page');
Route::get('test-pdf', function () {
    return TestController::pdf();
})->name('task_pdf');

