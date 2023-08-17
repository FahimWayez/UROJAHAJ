<?php
require_once("databaseConnection.php");

function addUser($fName, $lName, $email)
{
    $conn = dbConnection();
    $sqlInsert = "INSERT INTO `urojahaj`.`customerdetails`(`firstName`, `lastName`, `email`, `miles`) 
        VALUES ('$fName','$lName', '$email','500')";
    return mysqli_query($conn, $sqlInsert) ? true : false;
}   
function addLoginCredentials($fName, $lName, $email, $hashedPassword)
{
    $conn = dbConnection();
    $sqlInsert2 = "INSERT INTO `urojahaj`.`logincredentials`(`type`,`firstName`,`lastName`,`email`,`password`) VALUES ('Customer','$fName','$lName','$email','$hashedPassword')";
    return mysqli_query($conn, $sqlInsert2) ? true : false;
}
?>