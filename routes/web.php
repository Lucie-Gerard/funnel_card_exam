<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeckController;

Route::any('{slug}', function () {
    return view('template/app');
});

Route::get('/', function () {
        return view('template/app');
    });

Route::get('/deck/{id}/card-listing', function() {
    return view('template/app');
});