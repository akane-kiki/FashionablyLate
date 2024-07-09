<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RegisterController;
use Laravel\Fortify\Fortify;
use App\Http\Controllers\AuthenticatedSessionController;


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

Route::get('/', [ContactController::class, 'index']);

Route::post('/confirm', [ContactController::class, 'confirm']);

Route::post('/thanks', [ContactController::class, 'store']);

Fortify::registerView(function () {
    return view('auth.login');
});

Route::post('/register', [RegisterController::class, 'store']);

Route::get('/register', [RegisterController::class, 'create'])->name('register');

Route::middleware('auth')->group(function () {

    Route::get('/admin', [ContactController::class, 'admin'])->name('admin');

    Route::get('/search', [ContactController::class, 'search']);

    Route::post('/delete', [ContactController::class, 'destroy']);

    Route::post('/export', [ContactController::class, 'export']);

});

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware(['guest'])
    ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware(['guest'])
    ->name('login.post');
