<?php

    require 'LoginFunction.php';
    require 'phpFunctions.php';

    /*
     *
     *
     * Checking login data
     *
     *
     */

        /*checking if the user just logged out*/
        if (isset($_GET['loggedout'])){session_destroy();}

        $nologindata = false;
        $incorrectLogindata = false;

        /*checking the login data if entered*/
        if(!empty($_POST['plainPassword']) && !empty($_POST['plainEmailaddress'])){

            /*clean input */
            $cleanedPwd = cleanInput($_POST['plainPassword']);
            $cleanedEmail = cleanInput($_POST['plainEmailaddress']);

            /*check the input*/
            if(checkCredentials($cleanedPwd, $cleanedEmail)){
                header("location: index_login.php");
            }else{
                $incorrectLogindata = true;
            }

        }elseif(isset($_POST['plainEmailaddress'])){
           $nologindata = true;
        }

    /*
     *
     * Creating new accounts
     *
     */

    /*form validation*/
    if(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['createemail']) && !empty($_POST['createpassword']) && !empty($_POST['confirmpassword']) && !empty(cleanInput($_POST['subscription']))){

        /*getting the data*/
        $userdata = array(
            cleanInput($_POST['firstname']),
            cleanInput($_POST['lastname']),
            cleanInput($_POST['createemail']),
            cleanInput($_POST['createpassword']),
            cleanInput($_POST['confirmpassword']),
            cleanInput($_POST['subscription'])

        );
        /*actually creating an account*/
        $errormessage = createAccount($userdata);
    }

    /*checking if one of the boxes was left empty*/
    if (isset($_POST['firstname'])){
        if (
            empty($_POST['firstname']) or
            empty($_POST['lastname']) or
            empty($_POST['createemail']) or
            empty($_POST['createpassword']) or
            empty($_POST['confirmpassword'])){
            $errormessage = "Account creation failed: please fill in all fields";
        }
    }









?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1" >
    <link rel="stylesheet" type="text/css" href="FletNix%20Style.css">


    <title>FletNix - Login</title>

</head>


<body>

<header>

    <a href="index.php" class="logo">FletNix</a>

    <form class="searchbar" method="get" action="search.php">

        <div class="search">

            <input type="text" class="textbox" name="keywords" placeholder="Search...">

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

        <h1>Please Login</h1>

        <div id="login-box">
            <form method = "post" action="login.php">
                <div id="alertbox">
                    <?php
                    if(isset($errormessage)){
                        echo "<p>$errormessage</p>";
                    }else{
                        if($nologindata){
                            echo "<p>please enter your data</p>";
                        }
                        if($incorrectLogindata){
                            echo "<p>Incorrect login data</p>";
                        }
                    }


                    ?>
                </div>
                <input name="plainEmailaddress" type="text" class="textbox" placeholder="email address">
                <input name="plainPassword" type="password" class="textbox" placeholder="Password">

        </div>

        <div id="Login-buttons">
            <ol>
                <li><input type="submit" value="Login"></li>
            </ol>
            <ol>
                <li><a href="create-account.php">Create Account</a></li>
            </ol>

        </div>

        </form>
    </div>

</div>



<footer>
    <a href="about.php"><p>©FletNix 2016</p></a>
</footer>


</body>
</html>