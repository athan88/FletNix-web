<?php

require 'connection.php';
include 'phpFunctions.php';


$keywords = $_GET;




?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1" >
    <link rel="stylesheet" type="text/css" href="FletNix%20Style.css">


    <title>FletNix - Search</title>

</head>

<body>

    <header>

        <a href="index_login.php" class="logo">FletNix</a>


        <form class="searchbar" method="get" name="keywords"  action="search_login.php">

            <div class="search">

                <input type="text" class="textbox" name="keywords" placeholder="search">

            </div>
        </form>


        <div class="dropdown">
            <img class="dropbtn" src="Images/account.png" alt="Account Button">
            <div class="dropdown-content">
                <a href="#">Favorites</a>
                <a href="account_login.php">Acount Details</a>
                <a href="about_login.php">About Us</a>
                <a href="index.php">Log Off</a>
            </div>
        </div>

    </header>

    <div id="searchboxes">

        <form method="get" action="search_login.php">

            <select class="searchbox" name="Genre" >
                <option disabled selected value>Genre</option>
                <?php
                /*getting all the movie genres*/
                    $query = 'SELECT * FROM genre';
                    $genres = executeQuery($query);

                    foreach($genres as $row){
                        echo "<option value=".$row[0].">$row[0]</option>";
                    }
                ?>
            </select>

                <input class="searchbox" type="text" name="Actor" class="textbox" placeholder="Actor">
                <input class="searchbox" type="text" name="Director" class="textbox" placeholder="Director">
                <input class="searchbox" type="text" name="Year" class="textbox" placeholder="Year">
                <input class="searchbox" type="text" name="keywords" class="textbox" placeholder="title">
                <input class="searchbox" type="submit" value="search">


            </div>

        </form>

    </div>


    <div id="content-search">


        <h1>Results</h1>

        <div id="thumbnails">


            <?php



            $categories =  array("keywords","Actor","Director","Year","genre");

            /*getting the user input and preparing for query*/
            foreach($categories as $category){
                if(isset($_GET["$category"])){
                    /*clean input*/
                    $searchOptions[$category] = cleanInput($_GET["$category"]);
                }
                else{
                    $searchOptions[$category] = 'not set';
                }
            }
            print_r($searchOptions);

            /*create and execute the query*/
            $query = "  SELECT Movie.movie_id, Movie.title, Movie.duration, Movie.[description], Movie.publication_year, Movie.cover_image, Movie.previous_part, Movie.[URL], Movie.series
                            FROM Movie 
                            LEFT JOIN Movie_genre 
                            ON Movie.movie_id = Movie_genre.movie_id
                            LEFT JOIN Movie_cast
                            ON Movie_cast.movie_id = Movie.movie_id
                            LEFT JOIN Person 
                            ON Person.person_id = Movie_cast.person_id
                            LEFT JOIN Movie_director 
                            ON Person.person_id = Movie_director.person_id
                            WHERE Movie.movie_id IS NOT NULL
                            ";



            /*building the final query*/
            if($searchOptions["keywords"] != 'not set'){
                $title = $searchOptions["keywords"];
                $query .= "AND Movie.title like '%$title%'";
            }

            if($searchOptions["Actor"] != 'not set'){
                $genre = $searchOptions["Actor"];
                $query .= "AND Movie_genre.genre_name like '%$genre%' ";
            }

            echo "<br> $query";

            /*sending the query*/
            $response = executeQuery($query);

            /*creating the thumbnail for each movie*/
            foreach ($response as $row) {
                echo '<div class="thumbnail">';

                $title = urlencode($row[1]);

                echo "<a href=\"".'watch.php?name='.$title."\" >";
                echo "<img src= \"".$row[5]."\" alt=\"".$row[1]."\" > </a>";

                echo '</div>';
            }
            ?>

        </div>

    </div>


    <footer>
        <a href="about_login.php"><p>©FletNix 2016</p></a>
    </footer>


</body>
</html>