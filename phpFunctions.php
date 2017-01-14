<?php

    require 'connection.php';
    session_start();

    /* function for sending queries to the database */
        function executeQuery($query){
            global $connection;

            $statement = $connection->prepare($query);
            $statement->execute();
            $response=$statement->fetchAll();

            return $response;
        }
    /*function for cleaning user input*/
    function cleanInput($input){

        $input = strip_tags($input);
        $input = trim($input);
        $input = str_replace("'", "''", $input);

        return $input;
    }

?>