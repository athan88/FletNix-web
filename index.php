<?php

require "connection.php";
require "phpFunctions.php";
require "LoginFunction.php";

session_destroy();

?>





<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1" >
    <link rel="stylesheet" type="text/css" href="FletNix%20Style.css">


    <title>FletNix</title>

</head>


<body>

<header>

    <a href="index_login.php" class="logo">FletNix</a>


    <form class="searchbar" method="get" action="search.php">

        <div class="search">

            <input type="text" class="textbox" name="keywords" placeholder="Search...">

        </div>
    </form>

    <div class="dropdown">
        <img class="dropbtn" src="Images/account-no-login.png" alt="Account Button">
        <div class="dropdown-content">
            <a href="login.php">Log In</a>
            <a href="about.php">About Us</a>
        </div>
    </div>




</header>



<div id="content">

    <div id="thumbnails">

        <?php

        /*getting information about all movies*/
        $query = "SELECT * FROM Movie";
        $response = executeQuery($query);

        /*creating the tumbnail for each movie*/
        foreach ($response as $row) {

            echo '<div class="thumbnail">';

            $title = urlencode($row[1]);

            echo "<a href=\"".'watch.php?name='.$title."\" >";
            echo "<img src= \"".$row[5]."\" alt=\"".$row[1]."\" > </a>";

            echo '</div>';
        }


        $connection = null;
        ?>




    </div>



</div>



<footer>
    <a href="about.php"><p>©FletNix 2016</p></a>
</footer>


</body>
</html>