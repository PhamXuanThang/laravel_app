<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'products', ], function () {
    Route::get('index', [ProductController::class, 'index']);
    Route::post('create', [ProductController::class, 'create']);
    Route::get('show/{id}', [ProductController::class, 'show'])->where('id', '[0-9]+');
    Route::patch('edit/{id}', [ProductController::class, 'edit'])->where('id', '[0-9]+');
    Route::delete('delete/{id}', [ProductController::class, 'delete'])->where('id', '[0-9]+');
});
