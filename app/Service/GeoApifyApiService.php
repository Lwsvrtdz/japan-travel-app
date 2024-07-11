<?php

namespace App\Service;

use App\Http\Resources\GeoLocationResource;
use App\Interface\GeoApifyApiServiceInterface;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class GeoApifyApiService implements GeoApifyApiServiceInterface
{
    public function getLocation(string $location): array
    {
        $response = Http::get(config('services.geoapify.api_uri'), [
            'text' => $location,
            'apiKey' => config('services.geoapify.api_key'),
            'format' => config('services.geoapify.format'),
            'lang' => config('services.geoapify.lang'),
            'limit' => config('services.geoapify.limit'),
            'type' => config('services.geoapify.type'),
        ]);

        return $response->json('results')[0];
    }
}
