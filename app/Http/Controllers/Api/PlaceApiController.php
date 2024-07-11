<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlaceRequest;
use App\Http\Resources\PlaceResource;
use App\Interface\PlaceApiServiceInterface;
use Illuminate\Http\Request;

class PlaceApiController extends Controller
{
    protected PlaceApiServiceInterface $placeApiService;

    /**
     * @param PlaceApiServiceInterface $placeApiService
     */
    public function __construct(PlaceApiServiceInterface $placeApiService)
    {
        $this->placeApiService = $placeApiService;
    }

    /**
     *
     * @param PlaceRequest $request
     * @return PlaceResource
     */
    public function __invoke(PlaceRequest $request): PlaceResource
    {
        $places = $this->placeApiService->search($request->validated());
        return (new PlaceResource($places));
    }
}
