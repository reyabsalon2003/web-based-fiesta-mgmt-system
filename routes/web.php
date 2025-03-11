<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\AnalyticController;
use App\Http\Controllers\NotificationController;

// User routes
Route::resource('users', UserController::class);

// Event routes
Route::resource('events', EventController::class);

// Resource routes
Route::resource('resources', ResourceController::class);

// Analytics routes
Route::resource('analytics', AnalyticController::class);

// Notification routes (optional)
Route::resource('notifications', NotificationController::class);



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
