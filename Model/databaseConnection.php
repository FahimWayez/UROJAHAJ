<?php
$dbServer = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "urojahaj";

function dbConnection()
{   
    global $dbServer;
    global $dbUserName;
    global $dbPassword;
    global $dbName;
    $conn = mysqli_connect($dbServer, $dbUserName, $dbPassword, $dbName);
    
    if(!$conn)
    {
        echo "Connection error".mysqli_connect_error();
    }

    return $conn;
}
?>