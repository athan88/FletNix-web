<?php

    require 'connection.php';
    session_start();

    /* function for sending queries to the database */
        function executeQuery($query){
            global $connection;

            $statement = $connection->prepare($query);

            try{
                $statement->execute();
                $response=$statement->fetchAll();
            }catch (Exception $e){
                return $statement->rowCount();
            }

            return $response;
        }
    /*function for cleaning user input*/
    function cleanInput($input){

        $input = strip_tags($input);
        $input = trim($input);
        $input = str_replace("'", "''", $input);

        return $input;
    }

    /* function for creating an account*/
    function createAccount($input){

        $firstname = $input[0];
        $lastname = $input[1];
        $email = $input[2];
        $password = $input[3];
        $confirmpassword = $input[4];
        $subscription = $input[5];

        $name = $firstname ." ".$lastname;
        $date = $date = date('m-d-y');


        /*checking if the email adress is in use*/
        $query = "SELECT * FROM FletNix_Web.dbo.Customer WHERE customer_mail_adres = '$email'";
        echo $query;
        $foundusers = executeQuery($query);
        if(!empty($foundusers[0][0])){
            return "Account creation failed: The mail address is already in use";
        }else{
                /*confirming password*/
                if($password = $confirmpassword){

                    $password =  password_hash($password, PASSWORD_DEFAULT);
                    $query = "INSERT INTO FletNix_Web.dbo.Customer VALUES ('$email','$name','no account','$date',NULL,'$password','$subscription')";
                    executeQuery($query);

                    return "Account creation successful: please log in";
                }else{
                    return "Account creation failed: mismatched password";
                }
            }
        }

        /*function for adding ratings*/
        function addrating($customermail, $movieid, $rating){
            $query = "INSERT INTO Movie_rating VALUES ('$customermail','$movieid','$rating')";
            executeQuery($query);
        }
?>