<?php
session_start();
        
    include("connection.php");
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
	        <h1 class="title">Lorem ipsum dolor sit amet</h1>
	        <div class="content">   
	            <h2 class="text">
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean rhoncus, lacus in mattis sagittis, enim lorem finibus nulla, nec pretium ipsum ex et mi. Vivamus ut urna lorem. Maecenas dolor quam, gravida a fermentum at, ullamcorper at urna. Integer rhoncus ante eget ligula suscipit cursus. Quisque nibh tellus, efficitur vel felis et, malesuada porta nulla. In ultricies diam enim, in varius leo facilisis eget. Quisque non nulla metus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis faucibus tortor sit amet erat porttitor, sit amet suscipit lectus consequat. Phasellus auctor urna ac quam feugiat finibus. Donec eu rhoncus turpis.
				<br>
				Suspendisse sagittis urna vitae tristique posuere. Nam dui nulla, mattis efficitur varius in, venenatis vitae nulla. Fusce et quam vel enim tempor luctus. Proin nisi ex, finibus eget iaculis id, cursus at ipsum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean non nibh vulputate, tincidunt neque ultricies, ultricies nibh. Vestibulum commodo dolor eu leo scelerisque dapibus. Donec sed ex nec risus condimentum mollis eget ut augue. Vestibulum bibendum tortor erat, ac lacinia lectus sodales sit amet. Ut id suscipit nunc. Donec sed malesuada massa, id tempus turpis. Aenean vulputate ligula et tortor sagittis pulvinar. Duis tristique semper turpis eget posuere. Aliquam sit amet lacinia libero. Proin varius, tellus eget fringilla facilisis, nibh ligula lobortis ante, nec condimentum lacus purus sed quam.</h2>
	        </div>
	    </div>
    </div>
</body>
</html>