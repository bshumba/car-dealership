<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/signup', [SignupController::class, 'create'])->name('signup');
Route::get('/login', [LoginController::class, 'create'])->name('login');

Route::get('/car/search', [CarController::class, 'search'])->name('car.search');
Route::get('/car/watchlist', [CarController::class, 'watchlist'])->name('car.watchlist');
Route::resource('car', CarController::class);

// This will be executed everytime when the route is not found instead of the 404
Route::fallback(function() {
    return "Fallback";
    // You can also return a view
});

// ==================== Testing ========================

// Route::get('/user/{username}', function (string $username) {

// })->where('username', '[a-z]+');


// Route::get("{lang}/product/{id}", function (string $lang, string $id) {

// })->where(['lang' => 'a-z]{2}', 'id' => '\d{4,}']);

// Route::get('/search/{search}', function (string $search) {
//     return $search;
// })->where('search', '.+');
