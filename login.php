<?php
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		// something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		$password = encrypt_str($password);

		if(!empty($user_name) && !empty($password))
		{
			// read from database
			$query = "SELECT * FROM users WHERE user_name = '$user_name' LIMIT 1";

			$result = mysqli_query($con, $query);

			if($result && mysqli_num_rows($result) > 0)
			{
				$user_data = mysqli_fetch_assoc($result);

				if($user_data['password'] == $password)
				{
					$_SESSION['user_id'] = $user_data['user_id'];
					header("Location: silence.php");
					die();
				}
			}
			echo '<script type="text/javascript">',
     			 'document.getElementById("invalid-info").styles = "display: block;"',
           '</script>';
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
	<title>Viper's Den - Login</title>
	<link rel="stylesheet" type="text/css" href="login-styles.css">
</head>
<body>
		<div id="invalid-info" class="alert" style="display:none;">
			<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
			Invalid username or password. Please check your spelling and try again.
		</div>

		<form class="box" method="post">
			<h1>Login</h1>
			<input id="text" type="text" name="user_name" placeholder="Username">
			<input id="text" type="password" name="password" placeholder="Pasword">
			<input type="submit" value="Login"><hr>
			<a class="button" id="signup-button" href="signup.php">Signup</a>
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
