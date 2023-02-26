<?php

use App\Http\Controllers\Backend\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Backend\Chat\Chat;
use App\Http\Livewire\Backend\Pages\Dashboard\Dashboard;


## Backend routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/chat', Chat::class)->name('chat');
});


## Other routes
// Route::redirect('/', 'admin');