<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Example route for API
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Add your API routes here
Route::get('/example', function () {
    return response()->json(['message' => 'This is an example API route']);
});

include 'src/weather.php';
