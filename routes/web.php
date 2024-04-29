<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\GiftsController;
use App\Http\Controllers\InformationUserController;
use App\Http\Controllers\Auth\UpdatePasswordController;
use App\Http\Controllers\GiftUserController;
use App\Http\Controllers\CretaeUserController;
use App\Http\Controllers\UserController;


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

Route::get('/informacion', function () {
    return view('page.informacionUser');
})->name('information');

Route::get('/nosotros', function () {
    return view('page.nosotros');
})->name('nosotros');

Route::get('/donaciones', function () {
    return view('page.donaRegalo');
})->name('donaRegalo')->middleware('auth');


Route::get('/dashboard', function () {
    return view('page.empresa.dashboard');
})->name('dashboard')->middleware('auth');

Route::post('/donaregalos', [DonationController::class, 'store'])->name('donaciones.store');
Route::get('/gifts', [GiftsController::class, 'index'])->name('gifts.index');
Route::post('/crear-bono', [GiftsController::class, 'create'])->name('crear.bono');
Route::post('/crear-user', [CretaeUserController::class, 'createUsuario'])->name('crear.user');

Route::get('/gifts-all', [GiftsController::class, 'store'])->name('gifts.all');
Route::get('/user-all', [UserController::class, 'all'])->name('user.all');


Route::get('/informacion-data', [InformationUserController::class, 'index'])->name('information.index');




Auth::routes();
Route::post('/update-password', [UpdatePasswordController::class, 'update'])->name('update.password');
Route::post('/reclamar-bono', [GiftUserController::class, 'create'])->name('reclama.bono');
Route::post('/edit-all', [UserController::class, 'saveUserEdit'])->name('edit.user');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
