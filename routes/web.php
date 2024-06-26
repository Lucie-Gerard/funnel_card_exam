<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeckController;

Route::any('{slug}', function () {
    return view('template/app');
});

// INDEX
Route::get('/', function () {
        return view('template/app');
    })->name('home');

Route::get('/decks/create', function() {
    return view('template/app');
});


// SHOW
Route::get('/deck/{id}/card-listing', function() {
    return view('template/app');
})->name('card-listing');

Route::get('/deck/{deck_id}/card/{card_id}', function() {
    return view('template/app');
});

// SHOW - INDEX PLAY CARDS
Route::get('/deck/{deck_id}/play', function() {
    return view('template/app');
});


// INSERT
Route::post('/decks/create', [DeckController::class, 'deckStore']);
Route::post('/deck/{id}/create-card', [DeckController::class, 'cardStore']);


// UPDATE
Route::post('/deck/{id}/card-listing', [DeckController::class, 'updateDeck']);
Route::post('/deck/{deck_id}/card/{card_id}', [DeckController::class, 'updateCard']);