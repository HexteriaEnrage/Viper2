<?php 
session_start();
        
    include("connection.php");
    include("functions.php");
    $user_data = check_login($con);

?>

<!--The code above is completly optional
    Removing it will break some of the navbar
    This can be easily fixed-->

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="scss.css">
    <link rel="stylesheet" href="about.css">
    <title>Viper's Den</title>
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
        <h2>Welcome to my world.</h2>
    </div>

    <!--Navigation bar-->
    <div class="navbar">
        <a class="left">
            <img src="images/orb-large.png" width=46px>
        </a>
        <a href="#home" class="left lnk" onclick="genAll()">Home</a>
        <a href="#ascent" class="left lnk" onmouseover="changeHeader('ascent')" onmouseout="resetHeader()" onclick="genCard('ascent')">Ascent</a>
        <a href="#bind" class="left lnk" onmouseover="changeHeader('bind')" onmouseout="resetHeader()" onclick="genCard('bind')">Bind</a>
        <a href="#haven" class="left lnk" onmouseover="changeHeader('haven')" onmouseout="resetHeader()" onclick="genCard('haven')">Haven</a>
        <a href="#icebox" class="left lnk" onmouseover="changeHeader('icebox')" onmouseout="resetHeader()" onclick="genCard('icebox')">Icebox</a>
        <a class="left lnk" onmouseover="changeHeader('split')" onmouseout="resetHeader()" onclick="genCard('split')">Split</a>
        <a href="profile.php" class="right lnk"><?php echo $user_data['user_name']; ?></a>
        <button id="sButton" type="submit" onclick="search()"></button>
        <input type="text" id="sbox" placeholder="Search.." onkeypress="sBoxPress(event)">
        <a href="#about" class="right lnk" onclick="about()">About</a>
        <a href="#faq" class="right lnk">FAQ</a>
        <a href="#top" id="clearfilters" class="right lnk" onclick="genAll()">Clear Filters</a>
    </div>
    <div id="cardContainer" class="cardCenter">
        <script>
            genAll();
        </script>
    </div>
    <div id="cardPop" class="cInfo">
        
    </div>

    <div style="height: 10000px;">
    </div>
</body>

</html>