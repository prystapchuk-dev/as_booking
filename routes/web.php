<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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
    return view('home');
});


Route::middleware('guest')->group(function () {
    Route::get('register', [\App\Http\Controllers\User\AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('register', [\App\Http\Controllers\User\AuthController::class, 'register_process'])->name('register');

    Route::get('login', [\App\Http\Controllers\User\AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [\App\Http\Controllers\User\AuthController::class, 'login_process'])->name('login');
});

Route::get('/email/verify', function () {
    return view('verify-email');
})->middleware('auth')->name('verification.notice');

Route::middleware('auth')->group(function () {
    Route::post('logout', [\App\Http\Controllers\User\AuthController::class, 'destroy'])->name('logout');
});

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

