<?php

use Illuminate\Support\Facades\Route;
use Modules\Role\app\Livewire\Index;
use Modules\Role\App\Http\Controllers\RoleController;

/*
 *--------------------------------------------------------------------------
 * Web Routes
 *--------------------------------------------------------------------------
 *
 * Here is where you can register web routes for your application. These
 * routes are loaded by the RouteServiceProvider within a group which
 * contains the "web" middleware group. Now create something great!
 *
*/

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('roles', RoleController::class)->except(['index'])->names('role');
    Route::get('roles', Index::class)->name('role.index');

    // Trash
    Route::get('roles/{role}/restore', [RoleController::class, 'restore'])->name('role.restore');
    Route::delete('roles/{role}/permanent', [RoleController::class, 'permanent'])->name('role.destroy.permanent');
});