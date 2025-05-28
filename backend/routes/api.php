<?php

use App\Http\Controllers\Anilibria\TitleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/hello', function (Request $request) {
    return response()->json(['message' => 'Привет от Laravel!']);
});

Route::prefix('title')->group(function () {
    Route::get('random', [TitleController::class, 'random']);
    Route::get('updates', [TitleController::class, 'updates']);
    Route::get('search', [TitleController::class, 'search']);
});


// роут на случайное аниме
// https://api.anilibria.tv/v3
///title/random

