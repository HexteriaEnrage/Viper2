<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "viper_login_db";
if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname))
{
	die("failed to connnect to database");
}
