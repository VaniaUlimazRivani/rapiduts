<?php

			namespace App\Services;

			use GuzzleHttp\Client;
			use GuzzleHttp\Exception\RequestException;

			class WeatherApiService
			{
				protected $client;
				protected $apiKey;

				public function __construct()
				{
					$this->client = new Client();
					$this->apiKey = env('OPENWEATHER_API_KEY');
				}

				public function getWeatherByCity($city)
				{
					try {
						$response = $this->client->request('GET', 'https://api.openweathermap.org/data/2.5/weather', [
							'query' => [
								'q' => $city,
								'appid' => $this->apiKey,
								'units' => 'metric',
							],
							'verify' => false
						]);

						$data = json_decode($response->getBody()->getContents(), true);
						return $data;
					} catch (RequestException $e) {
						return ['error' => $e->getMessage()];
					}
				}
				}