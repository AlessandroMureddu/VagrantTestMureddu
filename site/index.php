<!DOCTYPE html>
<html>
<head>
	<title>Titolo della tua pagina</title>
	<style>
		body {
			background-color: #f2f2f2;
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
		}

		header {
			background-color: #333;
			color: #fff;
			padding: 20px;
			text-align: center;
		}

		h1 {
			font-size: 36px;
			margin-bottom: 0;
		}

		p {
			font-size: 18px;
			margin-top: 0;
		}

		.container {
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
			height: 100vh;
		}

		.btn {
			background-color: #4CAF50;
			border: none;
			color: white;
			padding: 16px 32px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 4px 2px;
			cursor: pointer;
			border-radius: 10px;
		}

		.btn:hover {
			background-color: #3e8e41;
		}
	</style>
</head>
<body>
	<header>
		<h1>Benvenuto nell'index del Vagrant!</h1>
	</header>

	

	<div class="container">
		<img>
		<p>Why am I this way?</p>
		<p>Stupid medicine not doing anything</p>
		<?php
		if(isset($_POST['pulsante'])){
			ini_set('display_errors', 1);
			ini_set('display_startup_errors', 1);
			error_reporting(E_ALL);
				$servername = "10.10.20.11";
				$username = "webAccess";
				$password = "Password&1";
				$dbname = "vagra1";

			// Create connection
			$conn = new mysqli($servername, $username, $password,$dbname);

			// Check connection
			if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
			}

			
			$result = $conn->query("SELECT * FROM song");

			//This will avoid encountering the missing property on a boolean error in case mysqli returns false
			if ($result !== false) {
				foreach ($result as $row) {
					echo "<p>" . $row["testo"] . "</p>";
				}
			}
			echo "(Connected successfully)";
		}
		?>
		<button class="btn" onclick="location.href='apacheFile/info.html'" >apache info</button>
		<form method="post">
			<input class="btn" type="submit" name="pulsante" value="Connetti al database">
		</form>
	</div>
</body>
</html>

