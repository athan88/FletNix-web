<?php




?>



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
            <form action = "login.php" method="post">
                <div id="alertbox">
                </div>
                    <input type="text" class="textbox" name="firstname" placeholder="First name">
                    <input type="text" class="textbox" name="lastname" placeholder="Last name">
                    <input type="text" class="textbox" name="createemail" placeholder="Email-adress">
                    <input type="password" class="textbox" name="createpassword" placeholder="Password">
                    <input type="password" class="textbox" name="confirmpassword" placeholder="Confirm password">
                    <select name="subscription" >
                        <option disabled selected value>Subscription</option>
                        <option>Basic</option>
                        <option>Premium</option>
                        <option>Ultimate</option>
                    </select>
                    <div id="alertbox">
                    </div>
                </div>

            <div id="Login-buttons">

                <ol>
                    <input type="submit" value="create">
                </ol>
                <ol>

                    <li><a href="login.php">Cancel</a></li>

                </ol>

         </form>
        </div>

    </div>

</div>



<footer>
    <a href="about.php"><p>©FletNix 2016</p></a>
</footer>


</body>
</html>