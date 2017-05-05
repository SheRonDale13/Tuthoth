<!DOCTYPE html>
<html lang="en">

<head>

	<?php
		if($_GET) {
			$exists = false;
			$city = str_replace(' ', '', $_GET['city']);
			$url = "http://www.weather-forecast.com/locations/" . $city . "/forecasts/latest";
			$file_headers = @get_headers($url);
			if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
				$exists = false;
			} else {
				$exists = true;
				$city = str_replace(' ', '', $_GET['city']);
				$forecastPage = file_get_contents($url);
				$explodedContents = explode('<span class="read-more-small"><span class="read-more-content"> <span class="phrase">', $forecastPage);
				$firstThreeDays = explode('</span></span></span></p>', $explodedContents[1]);
				$nextFourDays = explode('</span></span></span></p>', $explodedContents[2]);
				$lastThreeDays = explode('</span></span></span></p>', $explodedContents[3]);
			}
		}
	  ?>

		<title>Weather Scraper</title>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
		<style type="text/css">
			html {
				background-image: url(bg.jpg);
				<!--background: url(bg.jpg) no-repeat center center fixed;
				-->-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
				background-size: cover;
			}
			
			body {
				color: white;
				background: none;
			}
			
			input {
				margin: 20px 0;
			}
			
			.container {
				width: 450px;
				text-align: center;
			}
			
			#result {
				margin-top: 20px;
			}

		</style>
</head>

<body>
	<div class="container">
		<h1>What's The Weather?</h1>
		<form action="test.php">
			<div class="form-group">
				<label for="city">Enter the name of a city</label>
				<input type="text" class="form-control" id="city" name="city" value="<?php echo $_GET['city']; ?>">
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
		<div id="result">
			<?php
				if($_GET && !$exists) {
					echo '<div class="alert alert-danger" role="alert"><strong>' . $_GET['city'] . '</strong> does not exist</div>';
				} else if($_GET){
					echo '<div class="alert alert-success" role="alert"><strong>Day 1 - 3:</strong>    ' . $firstThreeDays[0] . '</div>';
					echo '<div class="alert alert-success" role="alert"><strong>Day 4 - 7:</strong>    ' . $nextFourDays[0] . '</div>';
					echo '<div class="alert alert-success" role="alert"><strong>Day 8 - 10:</strong>    ' . $lastThreeDays[0] . '</div>';
				}
			?>
		</div>
	</div>

	<!-- jQuery first, then Tether, then Bootstrap JS. -->
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>

</html>
