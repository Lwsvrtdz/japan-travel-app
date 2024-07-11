<?php

namespace App\Service;

use App\Http\Resources\CurrentWeatherResource;
use App\Http\Resources\WeatherResource;
use App\Interface\OpenWeatherApiServiceInterface;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Http;

class OpenWeatherApiService implements OpenWeatherApiServiceInterface
{
    /**
     * @param array $payload
     * @param string $type
     * @return WeatherResource|CurrentWeatherResource
     */
    public function getWeather(array $payload, string $type): WeatherResource|CurrentWeatherResource
    {
        $city = $payload['city'] ?? 'Tokyo, Japan';
        $response = $this->fetchWeatherData($city, $type);

        if ($type == 'weather') {
            return new CurrentWeatherResource($response);
        }

        return new WeatherResource($response);
    }

    /**
     * @param string $city
     * @param string $type
     * @return array
     */
    private function fetchWeatherData(string $city, string $type): array
    {
        $response = Http::get(
            config(
                'services.openweather.api_uri'
            ) . '/' . $type ?? config('services.openweather.default_type'),
            [
                'q' => $city,
                'units' => config('services.openweather.units'),
                'appid' => config('services.openweather.api_key'),
                'cnt' => config('services.openweather.limit'),
            ]
        );

        return $response->json();
    }
}
