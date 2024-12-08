<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AhliBahasaController,
    KosakataController,
    TemanTuliController,
    TemanDengarController,
    KomunitasController,
    KomentarController
};

Route::prefix('api')->group(function () {
    // Routes for AhliBahasa
    Route::apiResource('ahli-bahasa', AhliBahasaController::class);

    // Routes for Kosakata
    Route::apiResource('kosakata', KosakataController::class);

    // Routes for TemanTuli
    Route::apiResource('teman-tuli', TemanTuliController::class);

    // Routes for TemanDengar
    Route::apiResource('teman-dengar', TemanDengarController::class);

    // Routes for Komunitas
    Route::apiResource('komunitas', KomunitasController::class);

    // Routes for Komentar
    Route::apiResource('komentar', KomentarController::class);
});
