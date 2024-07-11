<?php

use App\Http\Controllers\Api\GeoLocationApiController;
use App\Http\Controllers\Api\PlaceApiController;
use App\Http\Controllers\Api\WeatherApiController;
use Illuminate\Support\Facades\Route;

Route::get('weather/{type}', WeatherApiController::class);
Route::get('location', GeoLocationApiController::class);
Route::get('place', PlaceApiController::class);
