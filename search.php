<?php

    require 'connection.php';
    include 'phpFunctions.php';






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

    <a href="index.php" class="logo">FletNix</a>


    <form action="search.php">

        <div class="search">

            <input type="text" class="textbox" placeholder="Search...">
            <input type="submit" class ="button" value="GO" >

        </div>
    </form>



    <div class="dropdown">
        <img class="dropbtn" src="Images/account-no-login.png" alt="Account Button">
        <div class="dropdown-content">
            <a href="login.php">Log in</a>
            <a href="about.php">About Us</a>
        </div>
    </div>

</header>



<div id="content">

    <div id="searchbuttons">

        <ul>
            <li><a href="#">Adventure</a></li>
            <li><a href="#">Action</a></li>
            <li><a href="#">Animation</a></li>
            <li><a href="#">Comedy</a></li>
            <li><a href="#">Documentary</a></li>
            <li><a href="#">Family</a></li>
            <li><a href="#">Horror</a></li>
            <li><a href="#">Musical</a></li>
            <li><a href="#">Crime</a></li>
            <li><a href="#">Drama</a></li>
            <li><a href="#">Sci-Fi</a></li>
            <li><a href="#">Thriller</a></li>
            <li><a href="#">Western</a></li>
        </ul>



    </div>
    <h1>Results</h1>

    <div id="last-watched">

        <div><a href="login.php"><img src="Images/Stranger_Things.jpg" alt="Stranger Things poster"></a></div>
        <div><a href="login.php"><img class="second" src="Images/House_Of_Cards.jpg" alt="House Of Cards poster"></a></div>
        <div><a href="login.php"><img class="third" src="Images/Breaking_Bad.jpg" alt="Breaking Bad poster"></a></div>


    </div>


</div>



<footer>
    <a href="about.php"><p>©FletNix 2016</p></a>
</footer>


</body>
</html>