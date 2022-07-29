<?php

use App\Http\Controllers\Reglog\LoginController;
use App\Http\Controllers\Reglog\RegisterController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/indexReg', [RegisterController::class, 'index']);
Route::post('/storeReg', [RegisterController::class, 'store']);

Route::get('/auth', function() {
    return view('auth');
})->middleware('auth');
