<?php 

function load_snakebite_lineups($i, $con2) {


        // find the row in the database
        $query = "SELECT * FROM snakebites WHERE id = '$i' LIMIT 1";
        $result = mysqli_query($con2, $query);
        // check if the query was successful
        if (mysqli_num_rows($result) == 0) {
            // query was not successful
            // add 1 to rows to make up for the gap
            return "gap";
        } else {
            // query returned one or more rows
        	// gather data
			// make the data accessible
            $data = mysqli_fetch_assoc($result);
            // get the data required to post the card
            $id = $data['id'];
            $conc_id = "item" . $id;
            $image_url = $data['image_url'];
            $map = $data['map'];
            $conc_map = $map . "-tag";
            $up_map = ucfirst($map);
            $title = $data['title'];
            $difficulty = $data['difficulty'];
            $up_difficulty = ucfirst($difficulty);
            $image_id = $data['image_id'];
            $tag1 = $data['tag1'];
            $tag2 = $data['tag2'];

            // return the data above into html code to be displayed to the user
            return
            "

<div id='$conc_id' class='card-container'>
<div class='image-wrapper'>
<img src='$image_url'>
</div>
<div class='content-container'>
<div class='header-container'>
<div class='map-tag' id='$conc_map'>$up_map</div>
<p>$title</p>
</div>
<div class='card-content'>
<div class='difficulty-tag' id='$difficulty'>$up_difficulty</div><div class='vl'></div>
<div class='info-tag'>
<form method='post'>
<!-- value is equal to the image_id -->
<button id='moreBtn' class='btn btn-primary-outline text-light' type='submit' name='submit' value='$image_id'>More Info</button>
</form>
</div>
<div class='desc-tag' id='tag-1'>$tag1</div>
<div class='desc-tag' id='tag-2'>$tag2</div>
</div>
</div>
</div>


                        ";
                    }
                }

function load_poisonorb_lineups($i, $con2) {


        // find the row in the database
        $query = "SELECT * FROM poisonorbs WHERE id = '$i' LIMIT 1";
        $result = mysqli_query($con2, $query);
        // check if the query was successful
        if (mysqli_num_rows($result) == 0) {
            // query was not successful
            // add 1 to rows to make up for the gap
            return "gap";
        } else {
            // query returned one or more rows
            // gather data
            // make the data accessible
            $data = mysqli_fetch_assoc($result);
            // get the data required to post the card
            $id = $data['id'];
            $conc_id = "item" . $id;
            $image_url = $data['image_url'];
            $map = $data['map'];
            $conc_map = $map . "-tag";
            $up_map = ucfirst($map);
            $title = $data['title'];
            $difficulty = $data['difficulty'];
            $up_difficulty = ucfirst($difficulty);
            $image_id = $data['image_id'];
            $tag1 = $data['tag1'];
            $tag2 = $data['tag2'];

            // return the data above into html code to be displayed to the user
            return
            "

<div id='$conc_id' class='card-container'>
<div class='image-wrapper'>
<img src='$image_url'>
</div>
<div class='content-container'>
<div class='header-container'>
<div class='map-tag' id='$conc_map'>$up_map</div>
<p>$title</p>
</div>
<div class='card-content'>
<div class='difficulty-tag' id='$difficulty'>$up_difficulty</div><div class='vl'></div>
<div class='info-tag'>
<form method='post'>
<!-- value is equal to the image_id -->
<button id='moreBtn' class='btn btn-primary-outline text-light' type='submit' name='submit' value='$image_id'>More Info</button>
</form>
</div>
<div class='desc-tag' id='tag-1'>$tag1</div>
<div class='desc-tag' id='tag-2'>$tag2</div>
</div>
</div>
</div>


                        ";
                    }
                }



function load_toxinscreen_lineups($i, $con2) {


        // find the row in the database
        $query = "SELECT * FROM toxinscreens WHERE id = '$i' LIMIT 1";
        $result = mysqli_query($con2, $query);
        // check if the query was successful
        if (mysqli_num_rows($result) == 0) {
            // query was not successful
            // add 1 to rows to make up for the gap
            return "gap";
        } else {
            // query returned one or more rows
            // gather data
            // make the data accessible
            $data = mysqli_fetch_assoc($result);
            // get the data required to post the card
            $id = $data['id'];
            $conc_id = "item" . $id;
            $image_url = $data['image_url'];
            $map = $data['map'];
            $conc_map = $map . "-tag";
            $up_map = ucfirst($map);
            $title = $data['title'];
            $difficulty = $data['difficulty'];
            $up_difficulty = ucfirst($difficulty);
            $image_id = $data['image_id'];
            $tag1 = $data['tag1'];
            $tag2 = $data['tag2'];

            // return the data above into html code to be displayed to the user
            return
            "

<div id='$conc_id' class='card-container'>
<div class='image-wrapper'>
<img src='$image_url'>
</div>
<div class='content-container'>
<div class='header-container'>
<div class='map-tag' id='$conc_map'>$up_map</div>
<p>$title</p>
</div>
<div class='card-content'>
<div class='difficulty-tag' id='$difficulty'>$up_difficulty</div><div class='vl'></div>
<div class='info-tag'>
<form method='post'>
<!-- value is equal to the image_id -->
<button id='moreBtn' class='btn btn-primary-outline text-light' type='submit' name='submit' value='$image_id'>More Info</button>
</form>
</div>
<div class='desc-tag' id='tag-1'>$tag1</div>
<div class='desc-tag' id='tag-2'>$tag2</div>
</div>
</div>
</div>


                        ";
                    }
                }