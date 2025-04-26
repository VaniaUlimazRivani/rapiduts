<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>Weather Info</title>
			<style>
				body {
					font-family: Arial, sans-serif;
					margin: 0; padding: 0;
					background: #eef2f3;
				}
				.container {
					max-width: 600px;
					margin: 50px auto;
					padding: 30px;
					background: white;
					box-shadow: 0px 0px 15px rgba(0,0,0,0.2);
				}
				h1 {
					text-align: center;
				}
				.weather {
					font-size: 1.2rem;
					line-height: 1.8;
				}
				.error {
					color: red;
					font-size: 1.2rem;
					text-align: center;
				}
			</style>
		</head>
		<body>

			<div class="container">
				<h1>Weather Information</h1>

				@if (isset($data['error']))
					<div class="error">
						<p>Error: {{ $data['error'] }}</p>
					</div>
				@else
					<div class="weather">
						<p><strong>City:</strong> {{ $data['name'] }}</p>
						<p><strong>Temperature:</strong> {{ $data['main']['temp'] }} &deg;C</p>
						<p><strong>Weather:</strong> {{ $data['weather'][0]['description'] }}</p>
						<p><strong>Humidity:</strong> {{ $data['main']['humidity'] }}%</p>
						<p><strong>Wind Speed:</strong> {{ $data['wind']['speed'] }} m/s</p>
					</div>
				@endif

			</div>

		</body>
		</html>