<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/appointment', [ApiController::class, 'index']);
Route::put('/update-status/{id}', [ApiController::class, 'updateStatus']);
Route::get('/appointments', [ApiController::class, 'getAppointmentsForDate']);


Route::get('/list/date', [ApiController::class, 'list_date']);
