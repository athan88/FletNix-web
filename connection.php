<?php


$hostname = "localhost";
$dbname = "FletNix_Web";

$username = "sa";
$pw= "1q2w3e4r";

$connection=NULL;


try {

    $connection = new PDO ("sqlsrv:server=$hostname;database=$dbname;ConnectionPooling=0", "$username", "$pw");
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connection->setAttribute(PDO::SQLSRV_ATTR_DIRECT_QUERY, true);





} catch (PDOException $exception){

    echo "Error connecting to SQL database <br>";
    echo "following errors occured:<br>";

    echo $exception->getMessage();

    echo "<h1>Please contact your system administrator for further assistance</h1>";
    exit();


}



?>

