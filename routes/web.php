<?php

use Illuminate\Support\Facades\Route;

Route::get('/{any}', function () {
    return view('app'); // Ensure you have a view named 'app.blade.php'
})->where('any', '^(?!api).*$');
