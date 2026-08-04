<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/login', function (Request $request) {
    AuthController::login($request->email, $request->password);
});

Route::get('/logout', function (Request $request) {
    AuthController::logout();
});
