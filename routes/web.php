<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('posts', 'posts')
    ->middleware(['auth', 'verified'])
    ->name('posts');

require __DIR__.'/settings.php';
