<?php

use App\Http\Controllers\Api\V1\AuthorController;
use App\Http\Controllers\Api\V1\BookController;
use App\Http\Controllers\Api\V1\GenreController;
use App\Http\Controllers\Api\V1\LanguageController;
use Illuminate\Support\Facades\Route;

Route::prefix('books')->group(function () {
    Route::get('/', [BookController::class, 'index']);
    Route::post('/', [BookController::class, 'store']);
    Route::get('{id}', [BookController::class, 'show']);
    Route::put('{id}', [BookController::class, 'update']);
    Route::delete('{id}', [BookController::class, 'destroy']);
});

Route::prefix('authors')->group(function () {
    Route::get('/', [AuthorController::class, 'index']);
    Route::post('/', [AuthorController::class, 'store']);
    Route::get('{id}', [AuthorController::class, 'show']);
    Route::delete('{id}', [AuthorController::class, 'destroy']);
});
