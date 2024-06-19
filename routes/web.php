<?php

use Illuminate\Support\Facades\Route;

Route::get('/{any}', function () {
        return view('template/app');
    })->where('any', '.*');

// Route::get('/', function () {
//     return view('template/app');
// });
