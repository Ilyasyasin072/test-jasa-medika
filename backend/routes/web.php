<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.index');
});

Route::post('/register/user', [AuthController::class, 'register']);
Route::post('/login/user', [AuthController::class, 'login']);
Route::post('/current/user', [AuthController::class, 'getUserToken']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::group(['prefix' => 'pasien'], function() {
//     Route::get('/list', [\App\Http\Controllers\PasienController::class, 'index'])->name('pasien-index');
// });

Route::group(['prefix' => 'kelurahan'], function() {
    Route::get('/list', [\App\Http\Controllers\KelurahanController::class, 'indexList'])->name('kelurahan-list');
    Route::get('/data', [\App\Http\Controllers\KelurahanController::class, 'index'])->name('kelurahan-index');
    Route::post('/create', [\App\Http\Controllers\KelurahanController::class, 'store'])->name('kelurahan-store');
    Route::post('/edit/{id}', [\App\Http\Controllers\KelurahanController::class, 'edit'])->name('kelurahan-edit');
    Route::post('/update/{id}', [\App\Http\Controllers\KelurahanController::class, 'update'])->name('kelurahan-update');
});


Route::group(['prefix' => 'pasien'], function () {
    Route::get('/', [\App\Http\Controllers\PasienController::class, 'index']);
    Route::post('/register/', [\App\Http\Controllers\PasienController::class, 'store']);
    Route::post('/{id}', [\App\Http\Controllers\PasienController::class, 'edit']);
    Route::get('/list', [\App\Http\Controllers\PasienController::class, 'index'])->name('pasien-index');
});