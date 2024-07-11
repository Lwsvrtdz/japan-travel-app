<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlaceRequest;
use App\Interface\OpenWeatherApiServiceInterface;
use Illuminate\Http\JsonResponse;

class WeatherApiController extends Controller
{
    protected $openWeatherApiService;

    public function __construct(OpenWeatherApiServiceInterface $openWeatherApiService)
    {
        $this->openWeatherApiService = $openWeatherApiService;
    }

    public function __invoke(PlaceRequest $request, string $type): JsonResponse
    {
        return response()->json($this->openWeatherApiService->getWeather($request->validated(), $type));
    }
}
