<?php

function check_login($con)
{

	if (isset($_SESSION['user_id']))
	{
		$id = $_SESSION['user_id'];
		$query = "SELECT * FROM users WHERE user_id = '$id' LIMIT 1";

		$result = mysqli_query($con, $query);
		if($result && mysqli_num_rows($result) > 0)
		{
			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	// redirect to login page
	header("Location: login.php");
	die();
} // CALL THIS FUNCTION WHENEVER THE USER MAY BE TRYING TO ACCESS SOMEWHERE THEY SHOULDN'T WITHOUT LOGGING INTO THEIR ACCOUNT


function random_num($length)
{
	$text = "";
	if($length < 5)
	{
		$length = 5;
	}
	$len = rand(4, $length);

	for ($i=0; $i < $len; $i++) { 
		$text .= rand(0,9);
	}

	return $text;
}

function fetch_snakebite_lineup($id, $con2)
{
	$query = "SELECT * FROM snakebites WHERE id = '$id' LIMIT 1";
	$result = mysqli_query($con2, $query);
	$row = mysqli_fetch_assoc($result);
	$image = $row['image_url'];
	$title = $row['title'];
	$difficulty = $row['difficulty'];
	$map = $row['map'];
	$up_difficulty = ucfirst($difficulty);
	$up_map = ucfirst($map);

	if ($row['verified'] == 1)
	{
	return "<div class=item>
			<img src='$image'>
			<h4 class='title'>$title</h4>
			<p class='$difficulty' id='difficulty-tag'>$up_difficulty</p>
			<p class='$map' id='map-tag'>$up_map</p>
			</div>";
	} // INSERT THE CARD HTML ABOVE
	return "";
}

function fetch_toxinscreen_lineup($id, $con2) {
	$query = "SELECT * FROM toxinscreens WHERE id = '$id' LIMIT 1";
	$result = mysqli_query($con2, $query);
	$row = mysqli_fetch_assoc($result);
	$image = $row['image_url'];
	$title = $row['title'];
	$difficulty = $row['difficulty'];
	$map = $row['map'];
	$up_difficulty = ucfirst($difficulty);
	$up_map = ucfirst($map);

	if ($row['verified'] == 1)
	{
	return "<div class=item>
			<img src='$image'>
			<h4 class='title'>$title</h4>
			<p class='$difficulty' id='difficulty-tag'>$up_difficulty</p>
			<p class='$map' id='map-tag'>$up_map</p>
			</div>";
	} // INSERT THE CARD HTML ABOVE
	return "";
}

function fetch_poisonorb_lineup($id, $con2) {
	$query = "SELECT * FROM poisonorbs WHERE id = '$id' LIMIT 1";
	$result = mysqli_query($con2, $query);
	$row = mysqli_fetch_assoc($result);
	$image = $row['image_url'];
	$title = $row['title'];
	$difficulty = $row['difficulty'];
	$map = $row['map'];
	$up_difficulty = ucfirst($difficulty);
	$up_map = ucfirst($map);

	if ($row['verified'] == 1)
	{
	return "<div class=item>
			<img src='$image'>
			<h4 class='title'>$title</h4>
			<p class='$difficulty' id='difficulty-tag'>$up_difficulty</p>
			<p class='$map' id='map-tag'>$up_map</p>
			</div>";
	} // INSERT THE CARD HTML ABOVE
	return "";
}

function fetch_unverified_snakebite_lineup($id, $con2) {
	$query = "SELECT * FROM snakebites WHERE id = '$id' LIMIT 1";
	$result = mysqli_query($con2, $query);
	$row = mysqli_fetch_assoc($result);
	$image_id = $row['image_id'];
	$image = $row['image_url'];
	$title = $row['title'];
	$difficulty = $row['difficulty'];
	$map = $row['map'];
	$up_difficulty = ucfirst($difficulty);
	$up_map = ucfirst($map);

	if ($row['verified'] == 0)
	{
	return "

			<div class='item'>
				<form method='post'>
					<img src='$image'>
					<input style='color: #000; width: 100%; text-align: center;' type='text' class='title' value='$image_id' placeholder='image_id' name='image_id' required><br>
					<input style='color: #000; width: 100%; text-align: center;' type='text' class='title' value='$title' placeholder='Title' name='title' required><br>
					<input style='width: 100%; text-align: center;' type='text' class='$difficulty' id='difficulty-tag' value='$up_difficulty' placeholder='Difficulty' name='difficulty' required><br>
					<input style='width: 100%; text-align: center;' type='text' class='$map' id='map-tag' value='$up_map' placeholder='Map' name='map' required><br>
					<input style='width: 100%; text-align: center;' type='text' class='type' id='type-tag' value='snakebites' placeholder='Type' name='type' required><br>
					<input type='radio' id='verify-tag' value='verify' name='veri-dele'>
					<label for='verify-tag'>Verify</label><br>
					<input type='radio' id='dele-tag' value='delete' name='veri-dele'>
					<label for='dele-tag'>Delete</label><br>
					<input style='width: 100%; text-align: center; background-color: limegreen; color: white;' type='submit' value='Submit'>
				</form>
			</div>

			";
	} // INSERT THE PRE-VERIFIED CARD HTML ABOVE
	return "";
}

function fetch_unverified_toxinscreen_lineup($id, $con2) {
	$query = "SELECT * FROM toxinscreens WHERE id = '$id' LIMIT 1";
	$result = mysqli_query($con2, $query);
	$row = mysqli_fetch_assoc($result);
	$image_id = $row['image_id'];
	$image = $row['image_url'];
	$title = $row['title'];
	$difficulty = $row['difficulty'];
	$map = $row['map'];
	$up_difficulty = ucfirst($difficulty);
	$up_map = ucfirst($map);

	if ($row['verified'] == 0)
	{
	return "

			<div class='item'>
				<form method='post'>
					<img src='$image'>
					<input style='color: #000; width: 100%; text-align: center;' type='text' class='title' value='$image_id' placeholder='image_id' name='image_id' required><br>
					<input style='color: #000; width: 100%; text-align: center;' type='text' class='title' value='$title' placeholder='Title' name='title' required><br>
					<input style='width: 100%; text-align: center;' type='text' class='$difficulty' id='difficulty-tag' value='$up_difficulty' placeholder='Difficulty' name='difficulty' required><br>
					<input style='width: 100%; text-align: center;' type='text' class='$map' id='map-tag' value='$up_map' placeholder='Map' name='map' required><br>
					<input style='width: 100%; text-align: center;' type='text' class='type' id='type-tag' value='toxinscreens' placeholder='Type' name='type' required><br>
					<input type='radio' id='verify-tag' value='verify' name='veri-dele'>
					<label for='verify-tag'>Verify</label><br>
					<input type='radio' id='dele-tag' value='delete' name='veri-dele'>
					<label for='dele-tag'>Delete</label><br>
					<input style='width: 100%; text-align: center; background-color: limegreen; color: white;' type='submit' value='Submit'>
				</form>
			</div>

			";
	} // INSERT THE PRE-VERIFIED CARD HTML ABOVE
	return "";
}

function fetch_unverified_poisonorb_lineup($id, $con2) {
	$query = "SELECT * FROM poisonorbs WHERE id = '$id' LIMIT 1";
	$result = mysqli_query($con2, $query);
	$row = mysqli_fetch_assoc($result);
	$image_id = $row['image_id'];
	$image = $row['image_url'];
	$title = $row['title'];
	$difficulty = $row['difficulty'];
	$map = $row['map'];
	$up_difficulty = ucfirst($difficulty);
	$up_map = ucfirst($map);

	if ($row['verified'] == 0)
	{
	return "

			<div class='item'>
				<form method='post'>
					<img src='$image'>
					<input style='color: #000; width: 100%; text-align: center;' type='text' class='title' value='$image_id' placeholder='image_id' name='image_id' required><br>
					<input style='color: #000; width: 100%; text-align: center;' type='text' class='title' value='$title' placeholder='Title' name='title' required><br>
					<input style='width: 100%; text-align: center;' type='text' class='$difficulty' id='difficulty-tag' value='$up_difficulty' placeholder='Difficulty' name='difficulty' required><br>
					<input style='width: 100%; text-align: center;' type='text' class='$map' id='map-tag' value='$up_map' placeholder='Map' name='map' required><br>
					<input style='width: 100%; text-align: center;' type='text' class='type' id='type-tag' value='poisionorbs' placeholder='Type' name='type' required><br>
					<input type='radio' id='verify-tag' value='verify' name='veri-dele'>
					<label for='verify-tag'>Verify</label><br>
					<input type='radio' id='dele-tag' value='delete' name='veri-dele'>
					<label for='dele-tag'>Delete</label><br>
					<input style='width: 100%; text-align: center; background-color: limegreen; color: white;' type='submit' value='Submit'>
				</form>
			</div>

			";
	} // INSERT THE PRE-VERIFIED CARD HTML ABOVE
	return "";
}

function check_admin_login($con)
{
	if(isset($_SESSION['user_id']))
	{
		$id = $_SESSION['user_id'];
		$query = "SELECT * FROM users WHERE user_id = '$id' LIMIT 1";

		$result = mysqli_query($con, $query);
		if($result && mysqli_num_rows($result) > 0)
		{
			$user_data = mysqli_fetch_assoc($result);
			if($user_data['admin'] == 1)
			{
				return $user_data;
			}
		}
		
	}

	// redirect to home page
	header("Location: silence.php");
	die();
}

function encrypt_str($data)
{
	$data = hash("sha256", $data);
	return $data;
}
