<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ConversationController;


## Backend routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    ## Conversation routes
    Route::get('conversations', [ConversationController::class, 'index'])->name('conversations');
});




## Other routes
// Route::redirect('/', 'admin');