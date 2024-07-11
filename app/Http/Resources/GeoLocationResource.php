<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GeoLocationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'city' => $this->resource['city'],
            'country' => $this->resource['country'],
            'country_code' => $this->resource['country_code'],
            'coordinate' => [
                'lon' => $this->resource['lon'],
                'lat' => $this->resource['lat'],
            ],
        ];
    }
}
