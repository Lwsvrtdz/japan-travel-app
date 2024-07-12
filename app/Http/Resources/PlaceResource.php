<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlaceResource extends JsonResource
{
    public static $wrap = null;

    public function __construct($resource)
    {
        parent::__construct($resource);
    }

    public function toArray($request)
    {
        //dd($this->resource);
        return [
            'places' => $this->transformPlaces($this->resource),
        ];
    }

    private function transformPlaces($places)
    {
        // dd($places); // Remove or comment out the debug line
        return array_map(
            function ($place) {
                return [
                    'fsq_id' => $place['fsq_id'],
                    'name' => $place['name'],
                    'categories' => array_map(function ($category) {
                        return [
                            'id' => $category['id'],
                            'name' => $category['name'],
                            'short_name' => $category['short_name'],
                            'plural_name' => $category['plural_name'],
                            'icon' => [
                                'prefix' => $category['icon']['prefix'],
                                'suffix' => $category['icon']['suffix'],
                            ],
                        ];
                    }, $place['categories']),
                    'chains' => $place['chains'],
                    'closed_bucket' => $place['closed_bucket'],
                    'distance' => $place['distance'],
                    'geocodes' => [
                        'main' => [
                            'latitude' => $place['geocodes']['main']['latitude'],
                            'longitude' => $place['geocodes']['main']['longitude'],
                        ],
                    ],
                    'link' => $place['link'],
                    'location' => [
                        'address' => $place['location']['address'] ?? null,
                        'country' => $place['location']['country'],
                        'formatted_address' => $place['location']['formatted_address'],
                        'locality' => $place['location']['locality'],
                        'postcode' => $place['location']['postcode'],
                        'region' => $place['location']['region'],
                    ],
                    'related_places' => $place['related_places'],
                    'timezone' => $place['timezone'],
                ];
            },
            $places
        );
    }
}
