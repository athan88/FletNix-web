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

                <input type="text" class="textbox" name="keywords" placeholder="<?php echo $_GET['keywords'] ?>">

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

            <select class="searchbox" name="Genre">

                    <option value="Action">Action</option>
                    <option value="Adventure">Adventure</option>
                    <option value="Animation">Animation</option>
                    <option value="Horoor">Comedy</option>
                    <option value="Sci-Fi">Sci-Fi</option>
                    <option value="Horoor">Horror</option>
                    <option value="Sci-Fi">Sci-Fi</option>
                    <option value="Horoor">Horror</option>
                    <option value="Sci-Fi">Sci-Fi</option>
                    <option value="Horoor">Horror</option>

            </select>

                <input class="searchbox" type="text" class="textbox" placeholder="Actor">
                <input class="searchbox" type="text" class="textbox" placeholder="Director">
                <input class="searchbox" type="text" class="textbox" placeholder="Year">

            </div>

        </form>





    </div>


    <div id="content-search">

        <div id="thumbnails">

            <?php

            /*clean the user input */
            $input = $_GET['keywords'];
            $input = str_replace("'", "''", $input);

            /*create the query*/
            $query = "SELECT * FROM Movie WHERE title like '%$input%'";
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


        <h1>Results</h1>



    </div>



    <footer>
        <a href="about_login.php"><p>©FletNix 2016</p></a>
    </footer>


</body>
</html>