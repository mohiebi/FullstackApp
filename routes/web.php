<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\ListingOfferController;
use App\Http\Controllers\RealtorListingAcceptOfferController;
use App\Http\Controllers\RealtorListingController;
use App\Http\Controllers\RealtorListingImageController;
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

Route::resource('listing', ListingController::class)->only(['index', 'show']);

Route::resource('listing.offer', ListingOfferController::class)->middleware('auth')->only('store');

Route::prefix('realtor')->name('realtor.')->middleware('auth')->group(function () {
    Route::name('listing.restore')
        ->put('listing/{listing}/restore', [RealtorListingController::class, 'restore'])->withTrashed();
    Route::resource('listing', RealtorListingController::class)->withTrashed();
    Route::name('offer.accept')
        ->put('offer/{offer}/accept', RealtorListingAcceptOfferController::class);
    Route::resource('listing.image', RealtorListingImageController::class)
        ->only(['create', 'store', 'destroy']);
});
