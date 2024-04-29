<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\GiftsController;

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
return view('page.index');
})->name('home');

Route::get('/', function () {
    return view('page.index');
})->name('home');

Route::get('/bonos', function () {
    return view('page.bonos');
})->name('bonos');

Route::get('/nosotros', function () {
    return view('page.nosotros');
})->name('nosotros');

Route::get('/donaciones', function () {
    return view('page.donaRegalo');
})->name('donaRegalo')->middleware('auth');

Route::post('/donaregalos', [DonationController::class, 'store'])->name('donaciones.store');
Route::get('/gifts', [GiftsController::class, 'index'])->name('gifts.index');




Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
