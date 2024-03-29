<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
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

// customerのCRUD
Route::get('retrieve', [CustomerController::class, 'retrieve']);
Route::get('retrieve/{id}', [CustomerController::class, 'searchById']);
Route::post('create', [CustomerController::class, 'create']);
Route::post('update/{id}', [CustomerController::class, 'update']);
Route::post('delete/{id}', [CustomerController::class, 'delete']);
