<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Backend\Pages\Chat\Chat;
use App\Http\Livewire\Backend\Pages\Dashboard\Dashboard;


## Backend routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', Dashboard::class)->name('dashboard');
    Route::get('/chat', Chat::class)->name('chat');
});


## Other routes
Route::redirect('/', 'admin');
