<?php
session_start();
	
	include("connection.php");
	include("connection2.php");
	include("functions.php");
	$user_data = check_admin_login($con);

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		// something was posted
		$image_id = $_POST['image_id'];
		$type = $_POST['type'];
		$veri_dele = $_POST['veri-dele'];

		if ($veri_dele == "verify")
		{
			if ($type == "poisonorbs")
			{
			// mark as verified
			$query = "UPDATE poisonorbs SET verified = '1' WHERE image_id = '$image_id'";
			$reuslt = mysqli_query($con2, $query);
			} elseif ($type == "snakebites")
			{
			// mark as verified
			$query = "UPDATE snakebites SET verified = '1' WHERE image_id = '$image_id'";
			$reuslt = mysqli_query($con2, $query);
			} elseif ($type == "toxinscreens")
			{
			// mark as verified
			$query = "UPDATE toxinscreens SET verified = '1' WHERE image_id = '$image_id'";
			$reuslt = mysqli_query($con2, $query);
			}
		} elseif ($veri_dele == "delete")
		{
			// something was deleted
			$image_id = $_POST['image_id'];
			$type = $_POST['type'];

			if ($type == "poisonorbs")
			{
			// remove from database
			$query = "DELETE FROM poisonorbs WHERE image_id = '$image_id'";
			$reuslt = mysqli_query($con2, $query);
			} elseif ($type == "snakebites")
			{
			// remove from database
			$query = "DELETE FROM snakebites WHERE image_id = '$image_id'";
			$reuslt = mysqli_query($con2, $query);
			} elseif ($type == "toxinscreens")
			{
			// remove from database
			$query = "DELETE FROM toxinscreens WHERE image_id = '$image_id'";
			$reuslt = mysqli_query($con2, $query);
			}
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Viper's Den</title>
	<link rel="stylesheet" type="text/css" href="autoupdate-styles.css">
	<!--FONTS-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<!--Overpass-->
	<link href="https://fonts.googleapis.com/css2?family=Overpass:wght@800&display=swap" rel="stylesheet">
	<!--Pattaya-->
	<link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet">
	<!--Nunito-->
	<link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600&display=swap" rel="stylesheet">
</head>
<body>
	<h1 class="header">Viper's Den</h1>
	<h2 class="sub-header">Welcome to my world.</h2>
	<br><br>

	<?php
		$query = "SELECT * FROM snakebites";
		$result = mysqli_query($con2, $query);
		$rows = mysqli_num_rows($result);

		for ($i = 1; $i <= $rows; $i++) 
		{
			$query = "SELECT * FROM snakebites WHERE id = '$i' LIMIT 1";
            $result = mysqli_query($con2, $query);
            $result = mysqli_fetch_assoc($result);
            if($result['id'] == $i)
            {
                echo fetch_unverified_snakebite_lineup($i, $con2);
            } else {
                $rows++;
            }
		}

		$query = "SELECT * FROM toxinscreens";
		$result = mysqli_query($con2, $query);
		$rows = mysqli_num_rows($result);

		for ($i = 1; $i <= $rows; $i++) 
		{
			$query = "SELECT * FROM toxinscreens WHERE id = '$i' LIMIT 1";
            $result = mysqli_query($con2, $query);
            $result = mysqli_fetch_assoc($result);
            if($result['id'] == $i)
            {
                echo fetch_unverified_toxinscreen_lineup($i, $con2);
            } else {
                $rows++;
            }
		}

		$query = "SELECT * FROM `poisonorbs`";
		$result = mysqli_query($con2, $query);
		$rows = mysqli_num_rows($result);

		for ($i = 1; $i <= $rows; $i++) 
		{
			$query = "SELECT * FROM poisonorbs WHERE id = '$i' LIMIT 1";
            $result = mysqli_query($con2, $query);
            $result = mysqli_fetch_assoc($result);
            if($result['id'] == $i)
            {
                echo fetch_unverified_poisonorb_lineup($i, $con2);
            } else {
                $rows++;
            }
		}	?>

	<br><br>
	<a href="silence.php">Return to home page</a>
</body>
</html>