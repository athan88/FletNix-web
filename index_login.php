<?php

    require 'connection.php';




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


        <form class="searchbar" method="get" action="search_login.php">

            <div class="search">

                <input type="text" class="textbox" name="keywords" placeholder="Search...">

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



    <div id="content">

        <div id="thumbnails">

            <?php

            $query = "SELECT * FROM Movie";
            $statement = $connection->prepare($query);
            $statement->execute();
            $data=$statement->fetchAll();


            /*creating the tumbnail for each movie*/

                foreach ($data as $row) {

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