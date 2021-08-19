<?php
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		// something was posted
		$user_name = $_POST['user_name'];
		$email = $_POST['email'];
		$name = $_POST['name'];
		$password = $_POST['password'];
		$password = encrypt_str($password);
		$confirm_password = $_POST['confirm_password'];
		$confirm_password = encrypt_str($confirm_password);

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name) && $password == $confirm_password)
		{
			//save to database
			$user_id = random_num(20);
			$query = "INSERT INTO users (user_id, user_name, email, full_name, password) VALUES ('$user_id', '$user_name', '$email', '$name' '$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die();
		} else
		{
			echo '<script type="text/javascript">',
     			 'document.getElementById("invalid-info").styles = "display: block;"',
           '</script>';
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Viper's Den - Signup</title>
	<link rel="stylesheet" type="text/css" href="login-styles.css">
</head>
<body>
	<div id="invalid-info" class="alert" style="display:none;">
		<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
		Some of the details you entered are invalid. Please double check them and try again.
	</div>

	<form class="box" method="post">
		<h1>SIGNUP</h1>
		<input id="text" type="text" name="name" placeholder="Full Name" required>
		<input id="text" type="email" name="email" placeholder="Email Address" required>
		<input id="text" type="text" name="user_name" placeholder="Username" required>
		<input id="text" type="password" name="password" placeholder="Pasword" required>
		<input id="text" type="password" name="confirm_password" placeholder="Confirm Pasword" required>
		<input type="submit" value="Signup"><hr>
		<a class="button" id="signup-button" href="login.php">Login</a>
	</form>

	<script>
	var close = document.getElementsByClassName("closebtn");
	var i;

	for (i = 0; i < close.length; i++) {
	close[i].onclick = function(){

		var div = this.parentElement;

		div.style.opacity = "0";

		setTimeout(function(){ div.style.display = "none"; }, 600);
	}
	}
	</script>
</body>
</html>
