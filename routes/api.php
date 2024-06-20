<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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



Route::group(['prefix' => 'login'], function () {
    Route::post('/', [UserController::class, 'login']);
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::group(['prefix' => 'users',], function () {
        Route::post('logout', [UserController::class, 'logout']);
        Route::post('create', [UserController::class, 'create']);
        Route::get('detail', [UserController::class, 'detail']);
    });

    Route::group(['prefix' => 'roles',], function () {
        Route::get('index', [RoleController::class, 'index']);
        Route::post('create', [RoleController::class, 'create']);
        Route::get('show/{id}', [RoleController::class, 'detail']);
        Route::put('edit/{id}', [RoleController::class, 'update']);
        Route::delete('delete/{id}', [RoleController::class, 'delete']);
        Route::get('list/{id}/users', [RoleController::class, 'listUsers']);
        Route::post('sync/{id}/users', [RoleController::class, 'syncUsers']);
        Route::patch('detach/{id}/users', [RoleController::class, 'detachUsers']);
    });

    Route::group(['prefix' => 'products', ], function () {
        Route::get('index', [ProductController::class, 'index']);
        Route::post('create', [ProductController::class, 'create']);
        Route::get('show/{id}', [ProductController::class, 'show'])->where('id', '[0-9]+');
        Route::patch('edit/{id}', [ProductController::class, 'edit'])->where('id', '[0-9]+');
        Route::delete('delete/{id}', [ProductController::class, 'delete'])->where('id', '[0-9]+');
    });
});




