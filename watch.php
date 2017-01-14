<?php

    require 'connection.php';
    require 'phpFunctions.php';
    require 'LoginFunction.php';


    /*getting information about the selected movie*/
    $name = $_GET['name'];
    $name = cleanInput($name);
    $query = "SELECT * FROM Movie WHERE title = '$name'";

    $data = executeQuery($query);
    $row = $data[0];
    $description = $row[3];


    /*getting the rating*/
    $query = "
    select avg(Movie_rating.rating)
    FROM Movie JOIN
    Movie_rating ON Movie.movie_id = Movie_rating.Movie_id
    WHERE $row[0] = Movie.movie_id
    GROUP BY Movie.movie_id";

    $data = executeQuery($query);

    if (isset($data[0])){

        $rating = $data[0];

    }else{

        $rating = 'N';

    }




?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1" >
    <link rel="stylesheet" type="text/css" href="FletNix%20Style.css">


    <title><?php echo "FletNix-".$row[1] ?></title>

</head>


<body>


<header>

    <a href="index_login.php" class="logo">FletNix</a>


    <form class="searchbar" action="search_login.php">

        <div class="search">

            <input type="text" class="textbox" placeholder="Search...">


        </div>
    </form>




    <div class="dropdown">
        <img class="dropbtn" src="Images/account.png" alt="Account Button">
        <div class="dropdown-content">
            <a href="#">Favorites</a>
            <a href="account_login.php">Acount Details</a>
            <a href="index.php">Log Off</a>
        </div>
    </div>

</header>



<div id="content-video">


    <div class="videoWrapper">

        <iframe width="560" height="315" src="<?php echo $row[7] ?>" allowfullscreen></iframe>

    </div>

    <div id="video-info">

        <a href="#">Add to Favorites</a>
        <h1><?php echo $row[1] ?></h1>
        <p>Rating:<?php echo "$rating[0]";?>/5</p>


    </div>



    <p><?php echo "$description" ?></p>



</div>





<footer>
    <a href="about_login.php"><p>©FletNix 2016</p></a>
</footer>


</body>
</html>
