<?php

use App\Http\Controllers\Backend\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Backend\Chat\Chat;


## Backend routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/chat', Chat::class)->name('chat');
});


## Other routes
// Route::redirect('/', 'admin');