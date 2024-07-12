<?php

namespace Tests\Feature\Api;

use App\Http\Resources\CurrentWeatherResource;
use App\Http\Resources\WeatherResource;
use App\Service\OpenWeatherApiService;
use Carbon\Carbon;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class WeatherApiTest extends TestCase
{
    #[Test]
    public function testGetCurrentWeather()
    {
        $mockResponse = json_decode(file_get_contents(
            base_path('tests/Feature/MockResponseApi/currentWeather.json')
        ), true);

        $resource = new CurrentWeatherResource($mockResponse);
        $formattedResponse = $resource->toArray(null);

        $this->assertEquals([
            'coord' => [
                'lon' => $mockResponse['coord']['lon'],
                'lat' => $mockResponse['coord']['lat'],
            ],
            'date' => Carbon::createFromTimestamp(
                $mockResponse['dt']
            )->setTimezone($this->convertSecondsToHour($mockResponse['timezone']))
                ->format('l, F j, Y g:i A'),
            'weather' => [
                'id' => $mockResponse['weather'][0]['id'],
                'main' => $mockResponse['weather'][0]['main'],
                'description' => $mockResponse['weather'][0]['description'],
                'icon' => $mockResponse['weather'][0]['icon'],
            ],
            'base' => $mockResponse['base'],
            'main' => [
                'temp' => $mockResponse['main']['temp'],
                'feels_like' => $mockResponse['main']['feels_like'],
                'temp_min' => $mockResponse['main']['temp_min'],
                'temp_max' => $mockResponse['main']['temp_max'],
                'pressure' => $mockResponse['main']['pressure'],
                'humidity' => $mockResponse['main']['humidity'],
                'sea_level' => $mockResponse['main']['sea_level'],
                'grnd_level' => $mockResponse['main']['grnd_level'],
            ],
            'visibility' => $mockResponse['visibility'],
            'wind' => [
                'speed' => $mockResponse['wind']['speed'],
                'deg' => $mockResponse['wind']['deg'],
            ],
            'rain' => [
                '1h' => $mockResponse['rain']['1h'] ?? null,
            ],
            'clouds' => [
                'all' => $mockResponse['clouds']['all'],
            ],
            'dt' => $mockResponse['dt'],
            'sys' => [
                'type' => $mockResponse['sys']['type'],
                'id' => $mockResponse['sys']['id'],
                'country' => $mockResponse['sys']['country'],
                'sunrise' => $mockResponse['sys']['sunrise'],
                'sunset' => $mockResponse['sys']['sunset'],
            ],
            'timezone' => $mockResponse['timezone'],
            'id' => $mockResponse['id'],
            'name' => $mockResponse['name'],
            'cod' => $mockResponse['cod'],
        ], $formattedResponse);
    }

    #[Test]
    public function testWeatherForecasts()
    {
        $mockResponse = json_decode(file_get_contents(
            base_path('tests/Feature/MockResponseApi/weatherForecast.json')
        ), true);

        $resource = new WeatherResource($mockResponse);
        $formattedResponse = $resource->toArray(null);

        $expectedResponse = [
            'city' => [
                'name' => $mockResponse['city']['name'],
                'country' => $mockResponse['city']['country'],
                'population' => $mockResponse['city']['population'],
            ],
            'list' => array_map(
                function ($forecast) {
                    return [
                        'dt' => $forecast['dt'],
                        'main' => $forecast['main'],
                        'weather' => $forecast['weather'],
                        'clouds' => $forecast['clouds'],
                        'wind' => $forecast['wind'],
                        'visibility' => $forecast['visibility'],
                        'pop' => $forecast['pop'],
                        'sys' => $forecast['sys'],
                        'dt_txt' =>
                        \Carbon\Carbon::parse($forecast['dt_txt'])->format('l, F j, Y g:i A'),
                    ];
                },
                $mockResponse['list']
            ),
        ];

        $this->assertEquals($expectedResponse, $formattedResponse);
    }

    /**
     * @param int $seconds
     * @return int
     */
    private function convertSecondsToHour(int $seconds): int
    {
        return (string) $seconds / 3600;
    }

    #[Test]
    public function itShouldReturnErrorWhenCityNotFoundInCurrentWeather()
    {
        $response = $this->getJson('/api/weather/weather?city=not_found');
        $response->assertStatus(422);
    }

    #[Test]
    public function itShouldReturnErrorWhenCityNotFoundInWeatherForecast()
    {
        $response = $this->getJson('/api/weather/forecast?city=not_found');
        $response->assertStatus(422);
    }
}
