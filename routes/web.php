<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

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



Route::get('/payment/request', [PaymentController::class, 'paymentRequest'])->name('payment.request');
Route::post('/payment/request/post', [PaymentController::class, 'payment_Request_post'])->name('payment.request.post');

Route::get('/payment/dashboard', [PaymentController::class, 'payment_dashboard'])->name('payment.dashboard');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
