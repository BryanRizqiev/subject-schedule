<?php

use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\Reglog\LoginController;
use App\Models\Schedule;
use Carbon\Carbon;
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

Route::middleware(['guest'])->group(function () {
    Route::get('/login', function () {
        return view('login');
    })->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/guest', [GuestController::class, 'index']);
    Route::get('/guest/{day}/show', [GuestController::class, 'show']);
    Route::get('/guest/showAll', [GuestController::class, 'showAll']);
});


Route::middleware(['auth'])->group(function() {
    Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

    Route::resource('schedule', ScheduleController::class)->names('schedule');
    Route::resource('subject', SubjectController::class)->names('subject');

    Route::get('/', function () {
        return redirect()->route('schedule.index');
    });

    // Route::get('/create-schedule', function () {
    //     return view('pages.create-schedule');
    // })->name('create-schedule');

    Route::get('/create-subject', function () {
        return view('pages.create-subject');
    })->name('create-subject');
    
    // Route::get('/basic-table', function () {
    //     return view('pages.basic-table');
    // })->name('basic-table');
    
    Route::get('/icons', function () {
        return view('pages.fontawesome');
    })->name('icons');
    
    // Route::get('/google-map', function () {
    //     return view('pages.map-google');
    // })->name('google-map');
    
    // Route::get('/blank-page', function () {
    //     return view('pages.blank');
    // })->name('blank-page');
    
    // Route::get('/404', function () {
    //     return view('pages.404');
    // })->name('404-page');
});