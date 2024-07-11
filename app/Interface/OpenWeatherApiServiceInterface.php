<?php

namespace App\Interface;

use App\Http\Resources\CurrentWeatherResource;
use App\Http\Resources\WeatherResource;

interface OpenWeatherApiServiceInterface
{
    public function getWeather(array $payload, string $type): CurrentWeatherResource|WeatherResource;
}
