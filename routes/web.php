<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Auth::routes([
    'verify'=>true
]);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::prefix('todos')->as('todos.')->group(function () {
        Route::get('index', [App\Http\Controllers\TodoController::class, 'index'])->name('index');
        Route::get('create', [App\Http\Controllers\TodoController::class, 'create'])->name('create');
        Route::post('store', [App\Http\Controllers\TodoController::class, 'store'])->name('store');
        Route::get('show/{id}', [App\Http\Controllers\TodoController::class, 'show'])->name('show');
        Route::get('{id}/edit', [App\Http\Controllers\TodoController::class, 'edit'])->name('edit');
        Route::put('update', [App\Http\Controllers\TodoController::class, 'update'])->name('update');
        Route::delete('destroy', [App\Http\Controllers\TodoController::class, 'destroy'])->name('destroy');
    });
});

Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::get('profile/update', [ProfileController::class, 'showUpdateForm'])->name('profile.update.form');
Route::put('profile/update', [ProfileController::class, 'update'])->name('profile.update');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
