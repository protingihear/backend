<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\MessageStatusController;
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
    TranskripController,
    InformationController,
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
    Route::apiResource('information', InformationController::class);
    Route::apiResource('chat', ChatController::class);
    Route::apiResource('message', MessageController::class);
    Route::apiResource('msgstatus', MessageStatusController::class);

Route::get('/transkrip/nomer/{nomer}', [TranskripController::class, 'searchByNomer']);
    Route::get('/auth', [TemanTuliController::class, 'authenticate']);

    Route::post('/teman-tuli/{id}/update', [TemanTuliController::class, 'update']);
    Route::post('/put_information/{id}/update', [InformationController::class, 'update']);
    // Route::post('/postingan/{id}/like', [PostinganRelationController::class, 'likePost']);
    // Route::post('/postingan/{id}/like', [PostinganRelationController::class, 'toggleLike']);
    Route::post('/postingan/toggle-like/{id}', [PostinganRelationController::class, 'toggleLike']);
    Route::delete('/postingan/{id}', [PostinganRelationController::class, 'destroy']);
    Route::put('/postingan/{id}/update', [PostinganRelationController::class, 'update']);
    // Route::get('message/{id}', [MessageController::class, 'update']);
    // Route::get('/message', function (Request $request) {
    //     // Ambil parameter `chat_id` dari query string
    //     $chatId = $request->query('chat_id');

    //     // Contoh: Cek apakah `chat_id` ada
    //     if (!$chatId) {
    //         return response()->json([
    //             'error' => 'chat_id parameter is required'
    //         ], 400);
    //     }
    // });
});


