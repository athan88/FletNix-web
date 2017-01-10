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

                <input type="text" class="textbox" placeholder="<?php echo $_GET['keywords'] ?>">

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

            <div class="searchbox"><select name="Genre">

                    <option value="Sci-Fi">Sci-Fi</option>
                    <option value="Horoor">Horror</option>

            </select></div>

            <div class="searchbox">

                <input type="text" class="textbox" placeholder="Actor">

            </div>

        </form>





    </div>


    <div id="content">



        <h1>Results</h1>



    </div>



    <footer>
        <a href="about_login.php"><p>©FletNix 2016</p></a>
    </footer>


</body>
</html>