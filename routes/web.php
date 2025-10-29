<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\WishListController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/details', function () {
    return view('details');
});

// Auth & verified routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('visit', VisitController::class);
    Route::resource('item', ItemController::class);
});

// Auth-only routes
Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Customers
    Route::resource('customer', CustomerController::class);

    // Wishlist
    Route::get('/wishlist', [WishListController::class, 'show'])->name('wishlist.show');
    Route::post('/wishlist/add/{id}', [WishListController::class, 'addItemToList'])->name('wishlist.add');
    Route::post('/wishlist/{item}/update', [WishListController::class, 'updateQuantity'])->name('wishlist.update');
    Route::delete('/wishlist/remove/{id}', [WishListController::class, 'removeItem'])->name('wishlist.remove');
});

require __DIR__ . '/auth.php';
