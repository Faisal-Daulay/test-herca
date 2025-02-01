<?php

use App\Http\Controllers\Api\V1\CargoController;
use App\Http\Controllers\Api\V1\MarketingController;
use App\Http\Controllers\Api\V1\PaymentController;
use App\Http\Controllers\Api\V1\TransactionController;
use Illuminate\Support\Facades\Route;

Route::as('api.')->group(function (): void {
    Route::prefix('v1')->as('v1.')->group(function (): void {
        Route::get('marketings', [MarketingController::class, 'index']);
        Route::get('cargos', [CargoController::class, 'index']);
        Route::get('transactions', [TransactionController::class, 'index']);

        Route::get('payments', [PaymentController::class, 'index']);
        Route::post('payments', [PaymentController::class, 'store']);
    });
});
