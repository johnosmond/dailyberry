<?php

use App\Http\Controllers\CurrentSpecialController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlavorController;
use App\Http\Controllers\FlavorDateController;
use Symfony\Component\Console\Input\Input;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoreController;
use App\Models\CurrentSpecial;
use App\Models\FlavorDate;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::resource('flavors', FlavorController::class)->middleware('auth');

Route::resource('stores', StoreController::class)->middleware('auth');

Route::resource('calendars', FlavorDateController::class)->middleware('auth');

Route::resource('specials', CurrentSpecialController::class);

require __DIR__.'/auth.php';
