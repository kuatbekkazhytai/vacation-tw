<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/users/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');


    Route::resource('vacation', App\Http\Controllers\VacationController::class)
        ->except(['index', 'show', 'destroy'])
        ->middleware('role:employee');
    Route::post('/vacation/{vacation}/approve', [App\Http\Controllers\VacationController::class, 'approve'])
        ->name('vacation.approve')->middleware('role:employer');
});

