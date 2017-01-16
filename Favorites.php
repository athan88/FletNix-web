<?php


include 'connection.php';
include 'phpFunctions.php';
include 'LoginFunction.php';

/*testing if the user is logged in*/
if(empty($_SESSION['email'])) {
    header("location: login.php");
    die();
}

/*testing if the user wants to add a new movie*/
if (!empty($_GET['new'])){
    $emailadres = $_SESSION['email'];
    $newmovieId = $_GET['new'];

    $query = "INSERT INTO Favorites VALUES ('$emailadres', $newmovieId)";
    echo $query;
    executeQuery($query);
}

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

    <form class="searchbar" method="get" name="keywords"  action="Favorites.php">

        <div class="search">
        </div>
    </form>

    <div class="dropdown">
        <img class="dropbtn" src="Images/account.png" alt="Account Button">
        <div class="dropdown-content">
            <a href="#">Favorites</a>
            <a href="account_login.php">Acount Details</a>
            <a href="about_login.php">About Us</a>
            <a href="login.php?loggedout=true">Log Off</a>
        </div>
    </div>

</header>

<div id="searchboxes">

    <form method="get" action="Favorites.php">

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
        <input class="searchbox" type="text" name="Title" class="textbox" placeholder="title">
        <input class="searchbox" type="submit" value="search">


</div>

</form>

</div>


<div id="content-search">

    <h1>Your Favorites</h1>
    <div id="thumbnails">


        <?php

        $categories =  array("Title","Actor","Director","Year","Genre");

        /*getting the user input and preparing for query*/
        foreach($categories as $category){
            if(!empty($_GET["$category"])){
                /*clean input*/
                $searchOptions[$category] = cleanInput($_GET["$category"]);
            }
            else{
                $searchOptions[$category] = 'not set';
            }
        }

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
        if($searchOptions["Title"] != 'not set'){
            $title = $searchOptions["Title"];
            $query .= "AND Movie.title like '%$title%'";
        }
        if($searchOptions["Genre"] != 'not set'){
            $genre = $searchOptions["Genre"];
            $query .= "AND Movie_genre.genre_name like '%$genre%' ";
        }
        if($searchOptions["Year"] != 'not set'){
            $year = $searchOptions["Year"];
            $query .= "AND Movie.publication_year = $year";
        }
        if($searchOptions["Director"] != 'not set'){
            $director = $searchOptions["Director"];
            $query .= "AND person.firstname like '%$director%' or person.lastname like '%$director%'";
        }
        if(!empty($_GET["keywords"])){
            $keyword = cleanInput($_GET["keywords"]);
            $query = "SELECT Movie.movie_id, Movie.title, Movie.duration, Movie.[description], Movie.publication_year, Movie.cover_image, Movie.previous_part, Movie.[URL], Movie.series
                            FROM Movie 
                            LEFT JOIN Movie_genre 
                            ON Movie.movie_id = Movie_genre.movie_id
                            LEFT JOIN Movie_cast
                            ON Movie_cast.movie_id = Movie.movie_id
                            LEFT JOIN Person 
                            ON Person.person_id = Movie_cast.person_id
                            LEFT JOIN Movie_director 
                            ON Person.person_id = Movie_director.person_id
                            WHERE Movie.movie_id IS NOT NULL AND (Movie.title like '%$keyword%' OR Movie_genre.genre_name like '%$keyword%'
                            OR person.firstname like '%$keyword%' OR person.lastname like '%$keyword%')
                             ";
        }

        /*adding the criteria that the movie must be in users favorite list*/
        $emailadres = $_SESSION['email'];
        $query .= "AND Movie.movie_id in(
        SELECT Movie_id 
        FROM Favorites 
        WHERE customer_mail_adres = '$emailadres')";

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
        $connection = null;
        ?>

    </div>

</div>

<footer>
    <a href="about_login.php"><p>©FletNix 2016</p></a>
</footer>

</body>
</html>