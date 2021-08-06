<?php
session_start();
	
    include("connection.php");
	include("connection2.php");
	include("functions.php");
    $user_data = check_login($con);

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		// something was posted
		$title = $_POST['title'];
		$image_url = $_POST['image_url'];
		$difficulty = $_POST['difficulty'];
		$difficulty = strtolower($difficulty);
		$map = $_POST['map'];
		$map = strtolower($map);
		$type = $_POST['type'];
		$type = strtolower($type);

		if(!empty($title) && !empty($image_url) && !empty($difficulty) && !empty($map) && !empty($type))
		{
			//save to database
			$image_id = random_num(20);
			//check lineup type
			if($type == "snakebite")
			{
				//save to snakebite database
				$query = "INSERT INTO snakebites (title, image_id, image_url, difficulty, map) VALUES ('$title', '$image_id', '$image_url', '$difficulty', '$map')";

				mysqli_query($con2, $query);
				header("Location: silence.php");
				die();
			} elseif ($type == "toxin screen") 
			{
				//save to toxin screen database
				$query = "INSERT INTO toxinscreens (title, image_id, image_url, difficulty, map) VALUES ('$title', '$image_id', '$image_url', '$difficulty', '$map')";

				mysqli_query($con2, $query);
				header("Location: silence.php");
				die();
			} elseif ($type == "poison orb") 
			{
				//save to poison orb database
				$query = "INSERT INTO poisonorbs (title, image_id, image_url, difficulty, map) VALUES ('$title', '$image_id', '$image_url', '$difficulty', '$map')";

				mysqli_query($con2, $query);
				header("Location: silence.php");
				die();
			} else 
			{
				echo "Invalid type";
			}
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Submit a Lineup - Viper's Den</title>
	<style type="text/css">
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
		width: 100%;
	}

	#box{

		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	#dropdown{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}
	</style>
	<link rel="stylesheet" type="text/css" href="autoupdate-styles.css">
</head>
<body>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px; margin: 10px; color: white;">Submit a lineup</div>

			<input id="text" type="text" name="title" placeholder="Title"><br><br>
			<input id="text" type="text" name="image_url" placeholder="Image Url"><br><br>
			<select id="dropdown" name="difficulty" class="dropdown">
				<option value="Easy">Easy</option>
				<option value="Medium">Medium</option>
				<option value="Hard">Hard</option>
				<option value="Extreme">Extreme</option>
			</select><br><br>
			<select id="dropdown" name="map" class="dropdown">
				<option value="Asceht">Ascent</option>
				<option value="Bind">Bind</option>
				<option value="Haven">Haven</option>
				<option value="Split">Split</option>
				<option value="Breeze">Breeze</option>
				<option value="Icebox">Icebox</option>
			</select><br><br>
			<select id="dropdown" name="type" class="dropdown">
				<option value="Snakebites">Snakebite</option>
				<option value="Toxin Screen">Toxin Screen</option>
				<option value="Posion Orb">Poison Orb</option>
			</select><br><br>

			<input id="button" type="submit" value="Submit"><br><br>

			<a href="silence.php">Return to Home Page</a><br><br>
		</form>

	</div>

</body>
</html>