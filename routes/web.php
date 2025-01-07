<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');  //view('welcome');
})->name('home');

Route::middleware(['auth'])->group(function () {
    Route::middleware(['verified'])->group(function () {
        Route::get('settings', function () {
            return view('settings');
        })->name('settings');

        Route::get('admin', fn() => view('admin'))->middleware(['permission:admin.index'])->name('admin');

        Route::get('dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require_once "cli.php";
