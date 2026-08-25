<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PublicNewsController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('news', [PublicNewsController::class, 'index'])->name('public.news.index');
Route::get('news/{slug}', [PublicNewsController::class, 'show'])->name('public.news.show');

Route::post('contact', [ContactController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('contact.submit');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [SettingsController::class, 'edit'])->name('dashboard');
    Route::put('dashboard', [SettingsController::class, 'update'])->name('dashboard.update');

    Route::get('dashboard/news', [NewsController::class, 'index'])->name('news.index');
    Route::post('dashboard/news', [NewsController::class, 'store'])->name('news.store');
    Route::put('dashboard/news/{news}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('dashboard/news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');
});

require __DIR__.'/settings.php';
