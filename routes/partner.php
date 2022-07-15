<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Partner\OfferController;

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


Route::middleware('auth:partner')->group(function () {
    Route::get('/account/', function () {
        return view('account');
    });

    Route::resource('offers', OfferController::class);
});

Route::middleware('guest:partner')->group(function () {
    Route::get('login', [\App\Http\Controllers\Partner\AuthController::class, 'showLoginForm'])->name('partner_login');
    Route::post('login', [\App\Http\Controllers\Partner\AuthController::class, 'login_process'])->name('partner_login');
});
