<?php

use App\Http\Controllers\ApiControllers\DataProdukController;
use App\Http\Controllers\ApiControllers\DataUMKMController;
use App\Http\Controllers\ApiControllers\DataUserController;
use App\Http\Controllers\ApiControllers\ProfileController;
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

/*
 * [[ API USER ]]
 */
// Menampilkan semua user data
Route::get('/users', [DataUserController::class, 'getData']);

// Register user
Route::post('/register', [SignInController::class, 'setData']);

// Login user
Route::post('/login', [SignInController::class, 'validasi']);

// Update data user dengan id = {id}
Route::put('/users/{id}', [ProfileController::class, 'setData']);

// Menampilkan detail user dengan id = {id}
Route::get('/users/{id}', [ProfileController::class, 'getData']);

// Menghapus data user
Route::delete('/users/{id}', [ProfileController::class, 'delete']);

/*
 * [[ API DATA PRODUK ]]
 */
Route::get('/categories', [DataProdukController::class, 'getAllCategories']);

// Ambil semua UMKM yg punya produk yg sesuai kategori
Route::get('categories/{kategori}', [DataUMKMController::class, 'getProductsOnCategory']);
