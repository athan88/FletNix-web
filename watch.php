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

    <?php
        if(empty($_SESSION['email'])){
            echo "<a href=\"index.php\" class=\"logo\">FletNix</a>";
        } else {
            echo "<a href=\"index_login.php\" class=\"logo\">FletNix</a>";
        }
    ?>

    <form class="searchbar" action=<?php
        if(empty($_SESSION['email'])) {
            echo "search_login.php";
        }else{
            echo "search.php";
        }

        ?>>

        <div class="search">

            <input type="text" class="textbox" placeholder="Search...">


        </div>
    </form>


    <div class="dropdown">
        <?php
        if(empty($_SESSION['email'])){
            echo "<img class=\"dropbtn\" src=\"Images/account-no-login.png\" alt=\"Account Button\">";
        } else {
            echo "<img class=\"dropbtn\" src=\"Images/account.png\" alt=\"Account Button\">";
        }
        ?>

        <div class="dropdown-content">
            <?php
            if(empty($_SESSION['email'])){
                echo "<a href=\"login.php\">Log in</a>";
                echo "<a href=\"about.php\">About Us</a>";
            } else {
                echo "<a href=\"#\">Favorites</a>";
                echo "<a href=\"about_login.php\">About Us</a>";
                echo "<a href=\"account_login.php\">Acount Details</a>";
                echo "<a href=\"login.php?loggedout=true\">Log Off</a>";
            }
            ?>
        </div>
    </div>

</header>



<div id="content-video">


        <?php

        if(empty($_SESSION['email'])){

            echo "<img src= \"".$row[5]."\" alt=\"".$row[1]."\" >";
            echo "<div class=\"nologin\"><h1>Please login to view this content</h1></div>";

        } else {
            echo "<div class=\"videoWrapper\">";
            echo "<iframe width=\"560\" height=\"315\" src=\"$row[7]\" allowfullscreen></iframe>";
            echo "</div>";
        }

        ?>


    <div id="video-info">

       <?php
       if(!empty($_SESSION['email'])){

           echo "<a href=\"#\">Add to Favorites</a>";

       }
       ?>
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
