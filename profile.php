<?php
session_start();
        
    include("connection.php");
    include("connection2.php");
    include("functions.php");
    $user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="scss.css">
    <link rel="stylesheet" href="about.css">
    <link rel="stylesheet" href="profile.css">
	<title><?php echo $user_data['user_name']; ?> - Viper's Den</title>
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
<body onload="closeMore()">
    <script src="cardgen.js"></script>
    <script src="effects.js"></script>
    <script src="about.js"></script>

    <!--title bar above navbar-->
    <div class="titlediv">
        <div class='ctr'>
        <img id='titlebar'>
    </div>
        <h1>Viper's Den</h1>
        <h2>Welcome to my world, <?php echo $user_data['user_name']; ?>.</h2>
    </div>

    <!--Navigation bar-->
    <div class="navbar">
        <a class="left">
            <img src="images/orb-large.png" width=46px>
        </a>
        <a href="silence.php" class="left lnk" onclick="genAll()">Home</a>
        <a href="silence.php#ascent" class="left lnk" onmouseover="changeHeader('ascent')" onmouseout="resetHeader()" onclick="genCard('ascent')">Ascent</a>
        <a href="silence.php#bind" class="left lnk" onmouseover="changeHeader('bind')" onmouseout="resetHeader()" onclick="genCard('bind')">Bind</a>
        <a href="silence.php#haven" class="left lnk" onmouseover="changeHeader('haven')" onmouseout="resetHeader()" onclick="genCard('haven')">Haven</a>
        <a href="silence.php#icebox" class="left lnk" onmouseover="changeHeader('icebox')" onmouseout="resetHeader()" onclick="genCard('icebox')">Icebox</a>
        <a class="left lnk" onmouseover="changeHeader('split')" onmouseout="resetHeader()" onclick="genCard('split')">Split</a>
        <a href="logout.php" class="right lnk">Logout</a>
        <a href="profile.php" class="right lnk"><?php echo $user_data['user_name']; ?></a>
        <button id="sButton" type="submit" onclick="search()"></button>
        <input type="text" id="sbox" placeholder="Search.." onkeypress="sBoxPress(event)">
        <a href="silence.php#about" class="right lnk" onclick="about()">About</a>
        <a href="silence.php#faq" class="right lnk">FAQ</a>
        <a href="silence.php#top" id="clearfilters" class="right lnk" onclick="genAll()">Clear Filters</a>
    </div>

    <div class="spacer">
	    <div class="container">
	        <h1 class="header">Viper's Den</h1>
            <h2 class="sub-header">Welcome to my world.</h2>
	        <div class="content">   
	            
            <?php
                $query = "SELECT * FROM snakebites";
                $result = mysqli_query($con2, $query);
                $rows = mysqli_num_rows($result);

                for ($i = 1; $i <= $rows; $i++) 
                {
                    echo fetch_snakebite_lineup($i, $con2);
                }

                $query = "SELECT * FROM toxinscreens";
                $result = mysqli_query($con2, $query);
                $rows = mysqli_num_rows($result);

                for ($i = 1; $i <= $rows; $i++) 
                {
                    echo fetch_toxinscreen_lineup($i, $con2);
                }

                $query = "SELECT * FROM `poisonorbs`";
                $result = mysqli_query($con2, $query);
                $rows = mysqli_num_rows($result);

                for ($i = 1; $i <= $rows; $i++) 
                {
                    echo fetch_poisonorb_lineup($i, $con2);
                }


/*
            include("connection2.php");

                $query = "SELECT * FROM snakebites";
                $result = mysqli_query($con2, $query);
                $rows = mysqli_num_rows($result);

                for ($i = 1; $i <= $rows; $i++) 
                {
                    $query = "SELECT * FROM snakebites WHERE id = '$i' LIMIT 1";
                    $result = mysqli_query($con2, $query);
                    if(isset($result))
                    {
                        echo fetch_snakebite_lineup($i, $con2);
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
                    if(isset($result))
                    {
                        echo fetch_toxinscreen_lineup($i, $con2);
                    } else {
                        $rows++;
                    }
                }

                $query = "SELECT * FROM poisonorbs";
                $result = mysqli_query($con2, $query);
                $rows = mysqli_num_rows($result);

                for ($i = 1; $i <= $rows; $i++) 
                {
                    $query = "SELECT * FROM poisonorbs WHERE id = '$i' LIMIT 1";
                    $result = mysqli_query($con2, $query);
                    if(isset($result))
                    {
                        echo fetch_poisonorb_lineup($i, $con2);
                    } else {
                        $rows++;
                    }
                }*/


            ?>

    <br><br>
    <a href="newlineup.php">Submit a lineup</a>
    <a href="verifylineup.php">Verify a lineup</a>

	        </div>
	    </div>
    </div>
</body>
</html>