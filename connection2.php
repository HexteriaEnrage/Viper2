<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "viper_lineups_db";
if(!$con2 = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname))
{
	die("failed to connnect to database");
}
