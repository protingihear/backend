<?php

use Illuminate\Support\Facades\Route;
use App\Models\{AhliBahasa, Kosakata, TemanTuli, TemanDengar, Komunitas, Komentar};

Route::prefix('api')->group(function () {
    // CRUD routes for AhliBahasa
    Route::get('/ahli-bahasa', fn() => AhliBahasa::all());
    Route::post('/ahli-bahasa', fn() => AhliBahasa::create(request()->all()));
    Route::put('/ahli-bahasa/{id}', fn($id) => AhliBahasa::find($id)->update(request()->all()));
    Route::delete('/ahli-bahasa/{id}', fn($id) => AhliBahasa::destroy($id));

    // CRUD routes for Kosakata
    Route::get('/kosakata', fn() => Kosakata::all());
    Route::post('/kosakata', fn() => Kosakata::create(request()->all()));
    Route::put('/kosakata/{id}', fn($id) => Kosakata::find($id)->update(request()->all()));
    Route::delete('/kosakata/{id}', fn($id) => Kosakata::destroy($id));

    // CRUD routes for TemanTuli
    Route::get('/teman-tuli', fn() => TemanTuli::all());
    Route::post('/teman-tuli', fn() => TemanTuli::create(request()->all()));
    Route::put('/teman-tuli/{id}', fn($id) => TemanTuli::find($id)->update(request()->all()));
    Route::delete('/teman-tuli/{id}', fn($id) => TemanTuli::destroy($id));

    // CRUD routes for TemanDengar
    Route::get('/teman-dengar', fn() => TemanDengar::all());
    Route::post('/teman-dengar', fn() => TemanDengar::create(request()->all()));
    Route::put('/teman-dengar/{id}', fn($id) => TemanDengar::find($id)->update(request()->all()));
    Route::delete('/teman-dengar/{id}', fn($id) => TemanDengar::destroy($id));

    // CRUD routes for Komunitas
    Route::get('/komunitas', fn() => Komunitas::all());
    Route::post('/komunitas', fn() => Komunitas::create(request()->all()));
    Route::put('/komunitas/{id}', fn($id) => Komunitas::find($id)->update(request()->all()));
    Route::delete('/komunitas/{id}', fn($id) => Komunitas::destroy($id));

    // CRUD routes for Komentar
    Route::get('/komentar', fn() => Komentar::all());
    Route::post('/komentar', fn() => Komentar::create(request()->all()));
    Route::put('/komentar/{id}', fn($id) => Komentar::find($id)->update(request()->all()));
    Route::delete('/komentar/{id}', fn($id) => Komentar::destroy($id));
});
