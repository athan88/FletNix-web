<?php

    require 'connection.php';


    $data = NULL;


        function executeQuery($query){
            global $connection, $data;

            $statement = $connection->prepare($query);
            $statement->execute();
            $data=$statement->fetchAll();

        }

?>