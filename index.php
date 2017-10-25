<!DOCTYPE html>
<html>
<head>
	<title>PHP used car site</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="stylesheeta384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="style.css">

</head>
<body class="container">

	<h1>PHP USed Cars</h1>
	<h2>Quality pre-owned vehicles</h2>

	<div style="padding: 10px;"></div>

	<table class="table">
		<tr>
			<th>ID</th>
			<th>Year</th>
			<th>Make</th>
			<th>Model</th>
			<th>Color</th>
			<th>Mileage</th>
			<th>Doors</th>
		</tr>	

<?php


	function getDb() {
	    if (file_exists('.env')) {
	      require __DIR__ . '/vendor/autoload.php';
	      $dotenv = new Dotenv\Dotenv(__DIR__);
	      $dotenv->load();
    }
    	$url = parse_url(getenv("DATABASE_URL"));
    	// var_dump($url);
    	$db_port = $url['port'];
	    $db_host = $url['host'];
	    $db_user = $url['user'];
	    $db_pass = $url['pass'];
	    $db_name = substr($url['path'], 1);
	    $db = pg_connect(
	      "host=" . $db_host .
	      " port=" . $db_port .
	      " dbname=" . $db_name .
	      " user=" . $db_user .
	      " password=" . $db_pass);
    
    	return $db;
  	
  	}

	function getInventory() {

		$request = pg_query(getDB(), "
			SELECT i.id, i.year, i.mileage, mo.name AS model, mo.doors, ma.name AS make, c.name AS color 
			FROM inventory i 
			JOIN models mo ON i.model_id = mo.id
			JOIN makes ma ON mo.make_id = ma.id
			JOIN colors c ON i.color_id = c.id;
		");

		return pg_fetch_all($request);
	}

	foreach (getInventory() as $car) {
		// var_dump($car);
		// $car is an associative array
		
		echo "<tr>";
		echo "<td>$car[id]</td>";
		echo "<td>$car[year]</td>";
		echo "<td>$car[make]</td>";
		echo "<td>$car[model]</td>";
		echo "<td>$car[color]</td>";
		echo "<td>$car[mileage]</td>";
		echo "<td>$car[doors]</td>";

		// foreach ($car as $field => $value) {
		// 	echo "<p>$field is $value</p>";
		// }

		echo "</tr>\n";
	}
?>	

	</table>

</body>
</html>