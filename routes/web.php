<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeckController;

Route::any('{slug}', function () {
    return view('template/app');
});

// INDEX
Route::get('/', function () {
        return view('template/app');
    });

    // SHOW
Route::get('/deck/{id}/card-listing', function() {
    return view('template/app');
});

Route::get('/deck/{deck_id}/card/{card_id}', function() {
    return view('template/app');
});

// SHOW - INDEX PLAY CARDS
Route::get('/deck/{deck_id}/play', function() {
    return view('template/app');
});

// CREATE
Route::get('/decks/create', function() {
    return view('template/app');
});