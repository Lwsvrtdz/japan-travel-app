<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GeoLocationResource;
use App\Interface\GeoApifyApiServiceInterface;
use Illuminate\Http\Request;

class GeoLocationApiController extends Controller
{
    protected $geoApifyApiService;

    public function __construct(GeoApifyApiServiceInterface $geoApifyApiService)
    {
        $this->geoApifyApiService = $geoApifyApiService;
    }

    public function __invoke(Request $request): GeoLocationResource
    {
        $location = $request->input('location') ?? 'Tokyo';


        //TO CONFIRM: After checking the API response from GeoapifyAPI, not really sure what to do with it? As its almost the same with Openweather?
        return (new GeoLocationResource($this->geoApifyApiService->getLocation($location)));
    }
}
