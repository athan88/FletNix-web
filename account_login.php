<?php

require "connection.php";
require "phpFunctions.php";
require "LoginFunction.php";

/*testing if the user is logged in*/
if(empty($_SESSION['email'])) {
    header("location: login.php");
    die();
}

/*getting information about the user*/
$query = "SELECT * FROM FletNix_Web.dbo.Customer WHERE customer_mail_adres = '$_SESSION[email]'";
$userinfo = executeQuery($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1" >
    <link rel="stylesheet" type="text/css" href="FletNix%20Style.css">


    <title>FletNix - Account</title>

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

    <div id="account-container">

        <h1>My account</h1>
        <p>Name: <?php echo $userinfo[0][1]?></p>
        <a>Change</a>
        <p>Email Adress: <?php echo $userinfo[0][0];?></p>
        <a>Change</a>
        <p>Credit Card: 9921 1293 4957 1238</p>
        <a>Change</a>
        <p>Subscription: <?php echo $userinfo[0][6]?></p>
        <a>Change</a>

        <h1>Subscription Details</h1>

        <table>
            <tr>
                <th>Select your subscription:</th>
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