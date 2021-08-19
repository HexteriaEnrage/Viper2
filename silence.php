<?php 
session_start();
        
    include("connection.php");
    include("connection2.php");
    include("functions.php");
    include("autoupdate-funcs.php");
    $user_data = check_login($con);

?>

<!--The code above is completly optional
    Removing it will break some of the navbar
    This can be easily fixed by removing 1 or 2
    Lines of code. :)-->

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="scss.css">
    <link rel="stylesheet" href="about.css">
    <link rel="stylesheet" href="card-styles.css">
    <link rel="stylesheet" href="bootstrap.min.css">
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

        <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect data that was submitted
    $id = $_POST['submit'];
    // collect data from databse
    // write query to be sent to database
    $query = "SELECT * FROM snakebites WHERE image_id = '$id' LIMIT 1"; // LIMIT 1 INCASE THERE ARE DUPLICATES
    // send query to databse
    $result = mysqli_query($con, $query);
    // chcek if $result is set
    if($result)
    {
        // idrk what this does but it lets u read the data for some reason. u can google it if u want ig
        $data = mysqli_fetch_assoc($result);
        // check if the original id mathces with id returned from database
        if($data['image_id'] == $id)
        {
            // if so, return the data to html so the modal is displayed with the correct information
            // get the data to be reutrned
            $video_url = $data['video_url'];
            $title = $data['title'];
            $description = $data['description'];
            $tag1 = $data['tag1'];
            $tag2 = $data['tag2'];
            echo
            "
            <div id='modal_1' class='modal'>
                <div class='modal-content'>
                    <span class='close'>&times;</span>
                    <div class='video-wrapper'>
                        <iframe src='$video_url' frameborder='0' allowfullscreen></iframe>
                    </div>
                    <div class='content'>
                        <h2 class='title'>$title</h2>
                        <h4 class='description'>$description</h4>
                    </div>
                </div>
            </div>
            ";
        }
    }
    // if it isnt set or the image ids dont match then check for the poinson orb lineup database
    // collect data from databse
    // write query to be sent to database
    $query = "SELECT * FROM poisonorbs WHERE image_id = '$id' LIMIT 1"; // LIMIT 1 INCASE THERE ARE DUPLICATES
    // send query to databse
    $result = mysqli_query($con, $query);
    // chcek if $result is set
    if($result)
    {
        // idrk what this does but it lets u read the data for some reason. u can google it if u want ig
        $data = mysqli_fetch_assoc($result);
        // check if the original id mathces with id returned from database
        if($data['image_id'] == $id)
        {
            // if so, return the data to html so the modal is displayed with the correct information
            // get the data to be reutrned
            $video_url = $data['video_url'];
            $title = $data['title'];
            $description = $data['description'];
            $tag1 = $data['tag1'];
            $tag2 = $data['tag2'];
            echo
            "
            <div id='modal_1' class='modal'>
                <div class='modal-content'>
                    <span class='close'>&times;</span>
                    <div class='video-wrapper'>
                        <iframe src='$video_url' frameborder='0' allowfullscreen></iframe>
                    </div>
                    <div class='content'>
                        <h2 class='title'>$title</h2>
                        <h4 class='description'>$description</h4>
                    </div>
                </div>
            </div>
            ";
        }
    }
    // if it isnt set or the image ids dont match then check for the toxin screens lineup database
    // collect data from databse
    // write query to be sent to database
    $query = "SELECT * FROM toxinscreens WHERE image_id = '$id' LIMIT 1"; // LIMIT 1 INCASE THERE ARE DUPLICATES
    // send query to databse
    $result = mysqli_query($con, $query);
    // chcek if $result is set
    if($result)
    {
        // idrk what this does but it lets u read the data for some reason. u can google it if u want ig
        $data = mysqli_fetch_assoc($result);
        // check if the original id mathces with id returned from database
        if($data['image_id'] == $id)
        {
            // if so, return the data to html so the modal is displayed with the correct information
            // get the data to be reutrned
            $video_url = $data['video_url'];
            $title = $data['title'];
            $description = $data['description'];
            $tag1 = $data['tag1'];
            $tag2 = $data['tag2'];
            echo
            "
            <div id='modal_1' class='modal'>
                <div class='modal-content'>
                    <span class='close'>&times;</span>
                    <div class='video-wrapper'>
                        <iframe src='$video_url' frameborder='0' allowfullscreen></iframe>
                    </div>
                    <div class='content'>
                        <h2 class='title'>$title</h2>
                        <h4 class='description'>$description</h4>
                    </div>
                </div>
            </div>
            ";
        }
    }

}
?>
<!--
<div id='modal_1" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div class="video-wrapper">
            <iframe src="https://www.youtube.com/embed/Et1hxC_-9RA" frameborder="0" allowfullscreen></iframe>
        </div>
        <div class="content">
            <h2 class="title">What 2000 Hours of VIPER Looks Like</h2>
            <h4 class="description">2000 hours isn't a lot tho... It's only like 83.33 days</h4>
        </div>
    </div>
</div>
-->

<div class="grid-container">

    <?php
        $query = "SELECT * FROM snakebites";
        $result = mysqli_query($con2, $query);
        $rows = mysqli_num_rows($result);

        for ($i = 1; $i <= $rows; $i++) 
        {
            $info_returned = load_snakebite_lineups($i, $con2);
            if ($info_returned == "gap")
            {
                $rows++;
            } else {
                echo $info_returned;
            }
        }

        $query = "SELECT * FROM poisonorbs";
        $result = mysqli_query($con2, $query);
        $rows = mysqli_num_rows($result);

        for ($i = 1; $i <= $rows; $i++) 
        {
            $info_returned = load_poisonorb_lineups($i, $con2);
            if ($info_returned == "gap")
            {
                $rows++;
            } else {
                echo $info_returned;
            }
        }
        
        $query = "SELECT * FROM toxinscreens";
        $result = mysqli_query($con2, $query);
        $rows = mysqli_num_rows($result);        

        for ($i = 1; $i <= $rows; $i++) 
        {
            $info_returned = load_toxinscreen_lineups($i, $con2);
            if ($info_returned == "gap")
            {
                $rows++;
            } else {
                echo $info_returned;
            }
        }
    ?>

    <script type="text/javascript" src="modal-config.js"></script>
    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    </script>



    <!--
        <script>
            genAll();
        </script>
    -->
    </div>
    <div id="cardPop" class="cInfo">
        
    </div>

    <div style="height: 10000px;">
    </div>
</body>
</html>