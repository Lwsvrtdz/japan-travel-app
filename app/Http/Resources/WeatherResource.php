<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WeatherResource extends JsonResource
{
    public static $wrap = null;

    public function toArray($request)
    {
        return [
            'city' => $this->transformCity($this->resource['city']),
            'list' => $this->transformList($this->resource['list']),
        ];
    }

    private function transformCity(array $city): array
    {
        return [
            'name' => $city['name'],
            'country' => $city['country'],
            'population' => $city['population'],
        ];
    }

    private function transformList(array $list): array
    {
        return array_map(function ($item) {
            return [
                'dt' => $item['dt'],
                'main' => $item['main'],
                'weather' => $item['weather'],
                'clouds' => $item['clouds'],
                'wind' => $item['wind'],
                'visibility' => $item['visibility'],
                'pop' => $item['pop'],
                'sys' => $item['sys'],
                'dt_txt' => \Carbon\Carbon::parse($item['dt_txt'])->format('l, F j, Y g:i A'),
            ];
        }, $list);
    }
}
