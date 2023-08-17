<?php
require_once("databaseConnection.php");

function getCustomerDetails($customerID)
{
    $conn = dbConnection();
    $sql = "SELECT * FROM `urojahaj`.`customerdetails` WHERE customerID = '{$customerID}'";
    $result = mysqli_query($conn, $sql);
    $customerDetails = array();
    if($result && mysqli_num_rows($result)>0)
    {
        $customerDetails = mysqli_fetch_assoc($result);
    }
    return $customerDetails;
}
function getFLightDetails($flightID)
{
    $conn = dbConnection();
    $sql2 = "SELECT * FROM `urojahaj`.`flightdetails` WHERE flightID = '{$flightID}'";
    $result2 = mysqli_query($conn, $sql2);
    $flightDetails = array();
    if($result2 && mysqli_num_rows($result2)>0)
    {
        $flightDetails = mysqli_fetch_assoc($result2);
    }
    return $flightDetails;
}
function getRouteDetails($routeID)
{
    $conn = dbConnection();
    $sql3 = "SELECT * FROM `urojahaj`.`routedetails` WHERE routeID = '{$routeID}'";
    $result3 = mysqli_query($conn, $sql3);
    $routeDetails = array();
    if($result3 && mysqli_num_rows($result3)>0)
    {
        $routeDetails = mysqli_fetch_assoc($result3);
    }
    return $routeDetails;
}
?>