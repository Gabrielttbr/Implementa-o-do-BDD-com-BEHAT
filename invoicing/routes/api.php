<?php

use App\Http\Controllers\DeferralController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/teste', function () {
    return 'teste';
});

Route::post('/deferrals', [DeferralController::class, 'store']);