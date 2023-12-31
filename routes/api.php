<?php

use App\Http\Controllers\{WalletController, TransactionController, AuthController};
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::middleware('auth:api')
->prefix('/bank')
->group(function() {
    Route::apiResource('wallet', WalletController::class);
    Route::apiResource('transaction', TransactionController::class);
});


