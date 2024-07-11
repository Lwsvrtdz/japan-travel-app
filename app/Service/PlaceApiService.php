<?php

namespace App\Service;

use App\Interface\PlaceApiServiceInterface;
use Illuminate\Support\Facades\Http;

class PlaceApiService implements PlaceApiServiceInterface
{
    public function search(array $payload): array
    {
        if (false === isset($payload['city'])) {
            $payload['city'] = 'Tokyo';
        }

        $response = Http::withHeaders([
            'Authorization' => config('services.foursquare.api_token'),
            'Accept' => 'application/json',
        ])->withoutVerifying()
            ->get(config('services.foursquare.api_uri'), [
                'near' => $payload['city'],
                'limit' => config('services.foursquare.api_limit'),
            ]);

        return $response->json('results');
    }
}
