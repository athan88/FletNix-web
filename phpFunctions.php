<?php

    require 'connection.php';


    /* function for sending queries to the database */
    $data = NULL;

        function executeQuery($query){
            global $connection, $data;

            $statement = $connection->prepare($query);
            $statement->execute();
            $response=$statement->fetchAll();

            return $response;
        }


    /*function for cleaning user input*/
    function cleanInput($input){

        $input = trim($input);
        $input = str_replace("'", "''", $input);

        return $input;
    }

?>