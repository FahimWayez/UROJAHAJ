<?php

require_once("databaseConnection.php");
function flightCount()
{
    $conn = dbConnection();
    $sqlSearch = "SELECT * FROM `urojahaj`.`flightdetails`";
    $result = mysqli_query($conn, $sqlSearch);
    $count = mysqli_num_rows($result);

    return $count;
}
function routeCount()
{
    $conn = dbConnection();
    $sqlSearch2 = "SELECT * FROM `urojahaj`.`routedetails`";
    $result2 = mysqli_query($conn, $sqlSearch2);
    $count2 = mysqli_num_rows($result2);

    return $count2;
}
function customerCount()
{
    $conn = dbConnection();
    $sqlSearch3 = "SELECT * FROM `urojahaj`.`customerdetails`";
    $result3 = mysqli_query($conn, $sqlSearch3);
    $count3 = mysqli_num_rows($result3);

    return $count3;
}
function employeeCount()
{
    $conn = dbConnection();
    $sqlSearch4 = "SELECT * FROM `urojahaj`.`employeedetails`";
    $result4 = mysqli_query($conn, $sqlSearch4);
    $count4 = mysqli_num_rows($result4);

    return $count4;
}



?>