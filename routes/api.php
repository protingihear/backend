<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AhliBahasaController,
    KosakataController,
    TemanTuliController,
    TemanDengarController,
    KomunitasController,
    KomentarController,
    PostinganRelationController,
    TranskripController
};
use Illuminate\Http\Middleware\HandleCors; // Import Middleware CORS

// Terapkan Middleware CORS untuk semua rute
Route::middleware([HandleCors::class])->group(function () {
    // Rute untuk user dengan middleware auth:sanctum
    Route::get('/user', function (Request $request) {
        return $request->user();
    })->middleware('auth:sanctum');

    // Semua rute lainnya
    Route::apiResource('ahli-bahasa', AhliBahasaController::class);
    Route::apiResource('kosakata', KosakataController::class);
    Route::apiResource('teman-tuli', TemanTuliController::class);
    Route::apiResource('teman-dengar', TemanDengarController::class);
    Route::apiResource('komunitas', KomunitasController::class);
    Route::apiResource('komentar', KomentarController::class);
    Route::apiResource('postingan', PostinganRelationController::class);
    Route::apiResource('transkrip', TranskripController::class);

Route::get('/transkrip/nomer/{nomer}', [TranskripController::class, 'searchByNomer']);
    Route::get('/auth', [TemanTuliController::class, 'authenticate']);

    Route::post('/teman-tuli/{id}/update', [TemanTuliController::class, 'update']);



});
