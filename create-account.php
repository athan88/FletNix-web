<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1" >
    <link rel="stylesheet" type="text/css" href="FletNix%20Style.css">


    <title>FletNix - Create Account</title>

</head>


<body>

<header>

    <a href="index.php" class="logo">FletNix</a>


    <form class="searchbar" action="search_login.php">

        <div class="search">

            <input type="text" class="textbox" placeholder="Search...">

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

    <div id="Login-Container">

        <h1>Create Account</h1>

        <div id="login-box">

            <form>
                <input type="text" class="textbox" placeholder="Full name">
                <input type="text" class="textbox" placeholder="Email-adress">
                <input type="text" class="textbox" placeholder="Username">
                <input type="password" class="textbox" placeholder="Password">
            </form>



        </div>

        <div id="Login-buttons">

            <ol>

                <li><a href="index_login.php">Create</a></li>

            </ol>
            <ol>

                <li><a href="login.php">Cancel</a></li>

            </ol>

        </div>

    </div>

</div>



<footer>
    <a href="about.php"><p>©FletNix 2016</p></a>
</footer>


</body>
</html>