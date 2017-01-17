<?php

require "connection.php";
require "phpFunctions.php";
require "LoginFunction.php";

/*testing if the user is logged in*/
if(empty($_SESSION['email'])) {
    header("location: login.php");
    die();
}




?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1" >
    <link rel="stylesheet" type="text/css" href="FletNix%20Style.css">


    <title>FletNix - About</title>

</head>


<body>

<header>

    <a href="index_login.php" class="logo">FletNix</a>


    <form class="searchbar" method="get" action="search_login.php">

        <div class="search">

            <input type="text" class="textbox" name="keywords" placeholder="Search...">

        </div>
    </form>



    <div class="dropdown">
        <img class="dropbtn" src="Images/account.png" alt="Account Button">
        <div class="dropdown-content">
            <a href="Favorites.php">Favorites</a>
            <a href="account_login.php">Acount Details</a>
            <a href="about_login.php">About Us</a>
            <a href="index.php">Log Off</a>
        </div>
    </div>

</header>



<div id="content">

    <div id="account-container">

        <h1>About Us</h1>
        <div id="about">
            <p>FletNix was founded in 2016 as a video streaming service. It is the only service to offer Dutch content for only a subscription fee. Of course FletNix
                also has lots of great non-dutch content. we also produce our own original series and films. </p>

            <p>We offer three kinds of subscriptons: Basic, Premium and Ultimate. Each level has it's own benefits, as listed below. Once you have created your account
            you can immediately start watching. FletNix will work on your pc or mobile device. </p>



        </div>

        <h1>Subscription Details</h1>

        <table>
            <tr>
                <th>Subscriptions:</th>
                <th><a href="#">Basic</a></th>
                <th><a href="#">Premium</a></th>
                <th><a href="#">Ultimate</a></th>
            </tr>
            <tr>
                <td>Monthly fee</td>
                <td>&#x20AC; 6.99</td>
                <td>&#x20AC; 10.99</td>
                <td>&#x20AC; 12.99</td>
            </tr>
            <tr>
                <td>HD resolution</td>
                <td>&#x2716;</td>
                <td>&#x2705;</td>
                <td>&#x2705;</td>
            </tr>
            <tr>
                <td>Ultra HD resolution</td>
                <td>&#x2716;</td>
                <td>&#x2716;</td>
                <td>&#x2705;</td>
            </tr>
            <tr>
                <td>Unlimited Dutch films and TV shows</td>
                <td>&#x2716;</td>
                <td>&#x2716;</td>
                <td>&#x2705;</td>
            </tr>
            <tr>
                <td>Premium titles</td>
                <td>&#x2716;</td>
                <td>&#x2716;</td>
                <td>&#x2705;</td>
            </tr>
            <tr>
                <td>Simultaneous users (screens)</td>
                <td>1</td>
                <td>2</td>
                <td>4</td>
            </tr>
            <tr>
                <td>Unlimited movies and TV shows</td>
                <td>&#x2705;</td>
                <td>&#x2705;</td>
                <td>&#x2705;</td>
            </tr>
            <tr>
                <td>Can watch on any device</td>
                <td>&#x2705;</td>
                <td>&#x2705;</td>
                <td>&#x2705;</td>
            </tr>

        </table>

    </div>


</div>



<footer>
    <a href="about_login.php"><p>©FletNix 2016</p></a>
</footer>


</body>
</html>