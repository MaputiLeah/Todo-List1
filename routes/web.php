<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
// Enabling email verification for user registration
Auth::routes([
    'verify'=>true
]);
// Default welcome page route
Route::get('/', function () {
    return view('welcome');
});
// Home route for authenticated users
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Grouping routes that require authentication middleware
Route::middleware(['auth'])->group(function () { 
    // Duplicate home route for authenticated users
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); 

     // Grouping routes for managing todos
    Route::prefix('todos')->as('todos.')->group(function () {
           // Todo index route
        Route::get('index', [App\Http\Controllers\TodoController::class, 'index'])->name('index');
           // Todo creation route
        Route::get('create', [App\Http\Controllers\TodoController::class, 'create'])->name('create');
           // Todo view and edit route
        Route::post('store', [App\Http\Controllers\TodoController::class, 'store'])->name('store');
        Route::get('show/{id}', [App\Http\Controllers\TodoController::class, 'show'])->name('show');
        Route::get('{id}/edit', [App\Http\Controllers\TodoController::class, 'edit'])->name('edit');
        Route::put('update', [App\Http\Controllers\TodoController::class, 'update'])->name('update');
           // Todo deletion route
        Route::delete('destroy', [App\Http\Controllers\TodoController::class, 'destroy'])->name('destroy');
    });
});
// User profile routes
Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::get('profile/update', [ProfileController::class, 'showUpdateForm'])->name('profile.update.form');
Route::put('profile/update', [ProfileController::class, 'update'])->name('profile.update');
Auth::routes();
// Duplicate home route (consider removing)
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
