<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeckController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// INDEX
Route::get('decks', [DeckController::class, 'index']);

// SHOW
Route::get('deck/{id}/card-listing', [DeckController::class, 'show']);
Route::get('deck/{deck_id}/card/{card_id}', [DeckController::class, 'cardShow']);