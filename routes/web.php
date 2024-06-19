<?php

use App\Models\Deck;
use Illuminate\Support\Facades\Route;

Route::get('/{any}', function () {
        return view('template/app');
    })->where('any', '.*');

Route::get('/decks', function () {
    return view('template/app');
});
