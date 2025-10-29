<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\WishListController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/details', function (){
return view('details');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware('auth')->group(function () {
    Route::resource('customer', CustomerController::class);
});

Route::resource('visit', VisitController::class)
    ->middleware(['auth', 'verified']);

Route::resource('item', ItemController::class)
    ->middleware(['auth', 'verified']);

Route::get('/wishList/addItemToList/{id}/{quantity}',
[WishListController::class, 'addItemToList'])->name('wishlist.addItemToList');
Route::get('/wishlist', function (){
return view('wishlist.show');
});
require __DIR__ . '/auth.php';
