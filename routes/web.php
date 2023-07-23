<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlavorController;
use Symfony\Component\Console\Input\Input;
use App\Http\Controllers\ProfileController;

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

Route::post('flavor', [FlavorController::class, 'updateByAjax'])->name('flavor.update');
Route::delete('flavor', [FlavorController::class, 'deleteByAjax'])->name('flavor.delete');
Route::resource('/flavors', FlavorController::class)->middleware('auth');

require __DIR__.'/auth.php';
