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

        if($password = $confirmpassword){

            $password =  password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO FletNix_Web.dbo.Customer VALUES ('$email','$name','no account','$date',NULL,'$password')";
            executeQuery($query);

            return "Account creation successful";
        }else{
            return "Account creation failed: mismatched password";
        }
    }





?>