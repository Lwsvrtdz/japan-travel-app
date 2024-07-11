<?php

namespace App\Providers;

use App\Interface\GeoApifyApiServiceInterface;
use App\Interface\OpenWeatherApiServiceInterface;
use App\Interface\PlaceApiServiceInterface;
use App\Service\GeoApifyApiService;
use App\Service\OpenWeatherApiService;
use App\Service\PlaceApiService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(GeoApifyApiServiceInterface::class, GeoApifyApiService::class);
        $this->app->bind(OpenWeatherApiServiceInterface::class, OpenWeatherApiService::class);
        $this->app->bind(PlaceApiServiceInterface::class, PlaceApiService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
