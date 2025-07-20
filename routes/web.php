<?php

use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';

Route::resource('listing', ListingController::class)->only(['create', 'store', 'edit', 'update', 'destroy'])->middleware('auth');
Route::resource('listing', ListingController::class)->except(['create', 'store', 'edit', 'update', 'destroy']);
