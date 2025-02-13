<?php

use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\YachtController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('yachts', YachtController::class);
Route::apiResource('reservations',ReservationController::class);
Route::apiResource('reviews', ReviewController::class);

Route::put('reservations/{reservation}/confirm',[ReservationController::class,'confirmReservation']);
Route::put('reservations/{reservation}/cancel',[ReservationController::class,'cancelReservation']);
