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
Route::get('/payment/approved/permission', [PaymentController::class, 'payment_approved'])->name('payment.approved.permission');
Route::post('/payment/approved/permission/post', [PaymentController::class, 'payment_approved_post'])->name('payment.permission.post');
Route::get('/payment/remove/permission/{id}', [PaymentController::class, 'payment_remove_post'])->name('payment.permission.remove');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/user/create', [App\Http\Controllers\HomeController::class, 'user'])->name('user.create');
