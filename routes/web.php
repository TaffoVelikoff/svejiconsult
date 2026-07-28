<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::post('contact', [ContactController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('contact.submit');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [SettingsController::class, 'edit'])->name('dashboard');
    Route::put('dashboard', [SettingsController::class, 'update'])->name('dashboard.update');
});

require __DIR__.'/settings.php';
