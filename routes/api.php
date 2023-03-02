<?php

use App\Http\Controllers\ApiControllers\DataProdukController;
use App\Http\Controllers\ApiControllers\DataUMKMController;
use App\Http\Controllers\ApiControllers\ProfileController;
use App\Http\Controllers\ApiControllers\PromoController;
use App\Http\Controllers\ApiControllers\SignInController;
use App\Http\Controllers\ApiControllers\SignInUMKMController;
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

// USERS / PROFILE
Route::post('/register', [SignInController::class, 'setData'])->middleware('notAuthenticated'); // Register user
Route::post('/login', [SignInController::class, 'login'])->middleware('notAuthenticated');

// KATEGORI
Route::get('/categories', [DataProdukController::class, 'getAllCategories']);
Route::get('/categories/{kategori}', [DataUMKMController::class, 'getProductsOnCategory']);
Route::get('/products/umkm/{id}', [DataProdukController::class, 'getProductsOnUmkm']);


// User perlu login dulu utk bisa akses route ini (Protected Routes)
Route::group(['middleware' => ['auth:sanctum']], function () {
    /* USERS / PROFILE */
    Route::post('/logout', [SignInController::class, 'logout']); // Register user
    Route::put('/users/{id}', [ProfileController::class, 'setData']);
    Route::get('/users/{id}', [ProfileController::class, 'getData']);
    Route::delete('/users/{id}', [ProfileController::class, 'delete']);

    /* UMKM */
    Route::get('/umkm/{id}', [DataUMKMController::class, 'getUmkm']);
    Route::post('/register/umkm', [SignInUMKMController::class, 'setData']);
    Route::put('/umkm/{id}', [DataUMKMController::class, 'setData'])->middleware('role:penjual');
    Route::delete('/umkm/{id}', [DataUMKMController::class, 'delete'])->middleware('role:penjual');

    /* DATA PRODUK */
    Route::post('/product', [DataProdukController::class, 'createProduct'])->middleware('role:penjual');
    Route::put('/product/{id}', [DataProdukController::class, 'updateProduct'])->middleware('role:penjual');
    Route::delete('product/{id}', [DataProdukController::class, 'deleteProduct'])->middleware('role:penjual');

    /* PROMO */
    Route::post('/promo', [PromoController::class, 'createPromo'])->middleware('role:penjual');
    Route::get('/promo/umkm/{id}', [PromoController::class, 'getPromoOnUmkm']);
    Route::get('/allpromo', [PromoController::class, 'getAllPromo']);


    /* PESANAN */
});
