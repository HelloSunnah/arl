<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\NewController;
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
    return view('master');
});
Route::post('/updateStatus', [NewController::class, 'updateStatus'])->name('updateStatus');

Route::get('/appointment', [NewController::class, 'appointment'])->name('appointment');
Route::get('/appointments', [NewController::class, 'getAppointmentsForDate'])->name('appointment');


Route::get('/hr/create', [NewController::class, 'hr_create'])->name('hr.create');
Route::post('/hr/create/post', [NewController::class, 'hr_create_post'])->name('hr.create.post');

Route::get('/appointment/create', [NewController::class, 'appointment_create'])->name('appointment.create');
Route::post('/appointment/create/post', [NewController::class, 'appointment_create_post'])->name('appointment.create.post');
