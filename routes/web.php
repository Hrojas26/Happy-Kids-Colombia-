<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\GiftsController;
use App\Http\Controllers\InformationUserController;
use App\Http\Controllers\Auth\UpdatePasswordController;
use App\Http\Controllers\GiftUserController;
use App\Http\Controllers\CretaeUserController;
use App\Http\Controllers\DashboradController;
use App\Http\Controllers\UserController;
use App\Models\User;


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


/*

Route::get('/', function () {
    return view('page.index');
})->name('home');*/

Route::get('/', function () {
    return view('page.index');
})->name('/');

Route::get('/bonos', function () {
    return view('page.bonos');
})->name('bonos');

Route::get('/informacion', function () {
    return view('page.informacionUser');
})->name('information');

Route::get('/nosotros', function () {
    return view('page.nosotros');
})->name('nosotros');

Route::get('/gracias', function () {
    return view('page.gracias');
})->name('gracias');

Route::get('/donaciones', function () {
    return view('page.donaRegalo');
})->name('donaRegalo')->middleware('auth');

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']], function () {
    Route::get('/', [DashboradController::class, 'index'])->name('dashboard');
});
/*
Route::get('/dashboard', function () {
    Route::get('/', [DashboradController::class, 'index'])->name('dashboard');
    //return view('page.empresa.dashboard', ['users' => User::all()]);
    //return view('page.empresa.dashboard');
})->name('dashboard')->middleware('auth');
*/
Route::post('/donaregalos', [DonationController::class, 'store'])->name('donaciones.store');
Route::get('/gifts', [GiftsController::class, 'index'])->name('gifts.index');
Route::post('/crear-bono', [GiftsController::class, 'create'])->name('crear.bono');
Route::post('/crear-user', [CretaeUserController::class, 'createUsuario'])->name('crear.user');

Route::get('/gifts-all', [GiftsController::class, 'store'])->name('gifts.all');
Route::post('/gifts-all/gifts', [GiftsController::class, 'update'])->name('edit.gifts');
Route::delete('/gifts-all/gifts/{gifts}', [GiftsController::class, 'destroy'])->name('destroy.gifts');
Route::get('/user-all', [UserController::class, 'all'])->name('user.all');




Route::get('/informacion-data', [InformationUserController::class, 'index'])->name('information.index');




Auth::routes();
Route::post('/update-password', [UpdatePasswordController::class, 'update'])->name('update.password');
Route::post('/reclamar-bono', [GiftUserController::class, 'create'])->name('reclama.bono');
Route::post('/edit-all', [UserController::class, 'saveUserEdit'])->name('edit.user');

Route::put('/donations/{donation}', [DonationController::class, 'updateStatus'])->name('updateStatus');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
