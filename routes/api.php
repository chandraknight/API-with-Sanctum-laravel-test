<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;

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

//public route
Route::post('/register',[AuthController::class,'register'])->name('register');
Route::post('/login',[AuthController::class,'login'])->name('login');
Route::get('/products',[ProductController::class,'index'])->name('products');
Route::get('/product/show/{id}',[ProductController::class,'show'])->name('product.show');
    Route::get('/products/search/{name}',[ProductController::class,'search'])
    ->name('products.search');

    //private route
    Route::group(['middleware'=>['auth:sanctum']], function () {
        Route::post('/products',[ProductController::class,'store'])->name('product.store');
        Route::put('/products/{id}',[ProductController::class,'update'])->name('product.update');
        Route::delete('/products/{id}', [ProductController::class,'destroy'])->name('product.destory');
        Route::post('/logout', [AuthController::class,'logout'])->name('logout');

    });
//create post
//Route::resource('post', [PostController::class]);
// Route::get('/testApi', function () {
//     return (['message' => 'hello Api']);
// });
// Route::get('/products',[ProductController::class,'index'])->name('products');
// Route::post('/product/store',[ProductController::class,'store'])->name('product.store');
// Route::get('/product/show/{id}',[ProductController::class,'show'])->name('product.show');
// Route::put('/product/update',[ProductController::class,'update'])->name('product.update');
// Route::delete('/product/destory', [ProductController::class,'destory'])->name('product.destory');

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
