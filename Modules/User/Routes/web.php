<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\AuthController;
use Modules\User\Http\Controllers\RoleController;
use  Modules\User\Http\Controllers\UserController;
use Modules\User\Http\Controllers\PermissionController;

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    ## user routes
    Route::resource('users', UserController::class);
    Route::get('users/ajax/datatable', [UserController::class, 'datatable'])->name('users.datatable');
    Route::get('users/{user}/change-status', [UserController::class, 'changeStatus'])->name('users.changeStatus');

    ## Role routes
    Route::resource('roles', RoleController::class);
    Route::get('roles/ajax/datatable', [RoleController::class, 'datatable'])->name('roles.datatable');
    Route::get('roles/{model}/change-status', [RoleController::class, 'changeStatus'])->name('roles.changeStatus');
    Route::get('roles/{model}/sync-permissions', [RoleController::class, 'syncPermissions'])->name('roles.syncPermissions');
    Route::post('roles/{model}/sync-permissions', [RoleController::class, 'syncPermissionsStore'])->name('roles.syncPermissionsStore');

    ## Permission routes
    Route::resource('permissions', PermissionController::class)->except(['edit', 'updated', 'destroy']);
    Route::get('permissions/ajax/datatable', [PermissionController::class, 'datatable'])->name('permissions.datatable');

    ## Auth routes
    Route::get('login', [AuthController::class, 'show_login_form'])->name('login')->withoutMiddleware('auth');
    Route::post('login', [AuthController::class, 'authenticate'])->name('authenticate')->withoutMiddleware('auth');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
