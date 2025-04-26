<?php

			namespace App\Http\Controllers\Api;

			use App\Http\Controllers\Controller;
			use App\Services\WeatherApiService;
			use Illuminate\Http\Request;

			class WeatherController extends Controller
			{
				protected $weatherService;

				public function __construct(WeatherApiService $weatherService)
				{
					$this->weatherService = $weatherService;
				}

				public function getWeather(Request $request)
				{
					$city = $request->query('city', 'Jakarta');
					$weather = $this->weatherService->getWeatherByCity($city);

					return view('weather', ['data' => $weather]);
				}
			}