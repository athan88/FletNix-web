<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1" >
    <link rel="stylesheet" type="text/css" href="FletNix%20Style.css">


    <title>FletNix-Breaking Bad</title>

</head>


<body>


<header>

    <a href="index_login.php" class="logo">FletNix</a>


    <form action="search_login.php">

        <div class="search">

            <input type="text" class="textbox" placeholder="Search...">
            <input type="submit" class ="button" value="GO" >

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

        <iframe width="560" height="315" src="https://www.youtube.com/embed/HhesaQXLuRY" frameborder="0" allowfullscreen></iframe>

    </div>

    <div id="video-info">

        <a href="Breaking_Bad.php">Add to Favorites</a>
        <h1>Breaking Bad</h1>
        <p>Seasons: 5</p>
        <p>Rating: 9.5/10</p>


    </div>



    <p>A High school chemistry teacher diagnosed with inoperable lung cancer turns to manufacturing and selling methamphetamine in order to
    secure his family's future</p>


    <div id="season-overview">

        <ol>

            <li><a class="active">Season 1</a></li>
            <li><a>Season 2</a></li>
            <li><a>Season 3</a></li>
            <li><a>Season 4</a></li>
            <li><a>Season 5</a></li>

        </ol>
        <ol class="episodes">

            <li><a class="active">Pilot</a></li>
            <li><a>Cat's in the Bag</a></li>
            <li><a>...And the Bag's in the River</a></li>
            <li><a>Cancer Man</a></li>
            <li><a>Gray Matter</a></li>
            <li><a>Crazy Handful of Nothin'</a></li>
            <li><a>A No-Rough-Stuff-Type Deal</a></li>

        </ol>

    </div>

</div>





<footer>
    <a href="about_login.php"><p>©FletNix 2016</p></a>
</footer>


</body>
</html>