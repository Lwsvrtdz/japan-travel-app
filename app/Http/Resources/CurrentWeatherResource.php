<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CurrentWeatherResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'coord' => [
                'lon' => $this->resource['coord']['lon'],
                'lat' => $this->resource['coord']['lat'],
            ],

            'date' => Carbon::createFromTimestamp(
                $this->resource['dt']
            )->setTimezone($this->convertSecondsToHour($this->resource['timezone']))
                ->format('l, F j, Y g:i A'),
            'weather' => [
                'id' => $this->resource['weather'][0]['id'],
                'main' => $this->resource['weather'][0]['main'],
                'description' => $this->resource['weather'][0]['description'],
                'icon' => $this->resource['weather'][0]['icon'],
            ],
            'base' => $this->resource['base'],
            'main' => [
                'temp' => $this->resource['main']['temp'],
                'feels_like' => $this->resource['main']['feels_like'],
                'temp_min' => $this->resource['main']['temp_min'],
                'temp_max' => $this->resource['main']['temp_max'],
                'pressure' => $this->resource['main']['pressure'],
                'humidity' => $this->resource['main']['humidity'],
                'sea_level' => $this->resource['main']['sea_level'],
                'grnd_level' => $this->resource['main']['grnd_level'],
            ],
            'visibility' => $this->resource['visibility'],
            'wind' => [
                'speed' => $this->resource['wind']['speed'],
                'deg' => $this->resource['wind']['deg'],
            ],
            'rain' => [
                '1h' => $this->resource['rain']['1h'],
            ],
            'clouds' => [
                'all' => $this->resource['clouds']['all'],
            ],
            'dt' => $this->resource['dt'],
            'sys' => [
                'type' => $this->resource['sys']['type'],
                'id' => $this->resource['sys']['id'],
                'country' => $this->resource['sys']['country'],
                'sunrise' => $this->resource['sys']['sunrise'],
                'sunset' => $this->resource['sys']['sunset'],
            ],
            'timezone' => $this->resource['timezone'],
            'id' => $this->resource['id'],
            'name' => $this->resource['name'],
            'cod' => $this->resource['cod'],
        ];
    }


    private function convertSecondsToHour(int $seconds): int
    {
        return (string) $seconds / 3600;
    }
}
