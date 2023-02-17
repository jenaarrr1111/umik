<?php

use App\Http\Controllers\ApiControllers\DataProdukController;
use App\Http\Controllers\ApiControllers\DataUMKMController;
use App\Http\Controllers\ApiControllers\DataUserController;
use App\Http\Controllers\ApiControllers\ProfileController;
use App\Http\Controllers\ApiControllers\SignInController;
use App\Http\Controllers\ApiControllers\SignInUMKMController;
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
 * [[ API UMKM ]]
 */
// Ambil UMKM tertentu
Route::get('/umkm/{id}', [DataUMKMController::class, 'getUmkm']);

// Registrasi UMKM
Route::post('/register/umkm', [SignInUMKMController::class, 'setData']);

// Update data UMKM
Route::put('/umkm/{id}', [DataUMKMController::class, 'setData']);

// Update data UMKM
Route::delete('/umkm/{id}', [DataUMKMController::class, 'delete']);

/*
 * [[ API DATA PRODUK ]]
 */
Route::post('/product', [DataProdukController::class, 'createProduct']);

Route::get('products/umkm/{id}', [DataProdukController::class, 'getProductsOnUmkm']);

Route::put('product/{id}', [DataProdukController::class, 'updateProduct']);

Route::delete('product/{id}', [DataProdukController::class, 'deleteProduct']);

/*
 * [[ API KATEGORI ]]
 */
Route::get('/categories', [DataProdukController::class, 'getAllCategories']);

Route::get('categories/{kategori}', [DataUMKMController::class, 'getProductsOnCategory']);
