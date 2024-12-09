<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AhliBahasaController,
    KosakataController,
    TemanTuliController,
    TemanDengarController,
    KomunitasController,
    KomentarController
};

// Rute untuk user dengan middleware auth:sanctum
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Menghapus prefix 'api' dan mendefinisikan rute langsung
Route::apiResource('ahli-bahasa', AhliBahasaController::class);
Route::apiResource('kosakata', KosakataController::class);
Route::apiResource('teman-tuli', TemanTuliController::class);
Route::apiResource('teman-dengar', TemanDengarController::class);
Route::apiResource('komunitas', KomunitasController::class);
Route::apiResource('komentar', KomentarController::class);
