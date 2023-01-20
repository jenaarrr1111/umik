<?php

use App\Http\Controllers\ApiControllers\DataUserController;
use App\Http\Controllers\ApiControllers\SignInController;
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

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::get('/users', [DataUserController::class, 'getData']);

Route::post('/register', [SignInController::class, 'setData']);

Route::post('/login', [SignInController::class, 'validasi']);

/* Route::post('/register', function (Request $request) {
    dd($request);
}); */
