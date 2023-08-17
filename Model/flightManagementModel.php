<?php
require_once("databaseConnection.php");


function viewFlight()
{
    $conn = dbConnection();
    $sqlView = "SELECT * FROM `urojahaj`.`flightdetails`";
    $result = mysqli_query($conn, $sqlView);

    $flightDetails = array();

    while($row = mysqli_fetch_array($result))
    {
        $flightDetails[] = $row;
    }
    
    return $flightDetails;
}
function searchFlight($flightID)
{
    $conn = dbConnection();
    $sqlSearch = "SELECT * FROM `urojahaj`.`flightdetails` WHERE flightID = '$flightID'";
    $result2 = mysqli_query($conn, $sqlSearch);
    $flightDetails2 = array();
    if($result2 && mysqli_num_rows($result2)>0)
    {
        $flightDetails2 = mysqli_fetch_assoc($result2);
    }
    return $flightDetails2;
}

 function advancedSearchFlight($flightID)
    {
    $conn = dbConnection();
    $sql4 = "SELECT * from `urojahaj`.`flightdetails` where flightID = '{$flightID}'";
    $result4 = mysqli_query($conn, $sql4);
    
    return $result4;
    }
    
function addFlight($flightID, $flightType, $economyClassSeatsCapacity, $economyClassSeatsFare, $businessClassSeatsCapacity, $businessClassSeatsFare, $routeID)
{
    $conn = dbConnection();
    $sqlInsert = "INSERT INTO `urojahaj`.`flightdetails`(`flightID`, `fleet`, `economyClassSeatsCapacity`, `economyClassSeatsFare`, `businessClassSeatsCapacity`, `businessClassSeatsFare`, `routeID`) VALUES ('$flightID', '$flightType', '$economyClassSeatsCapacity', '$economyClassSeatsFare', '$businessClassSeatsCapacity', '$businessClassSeatsFare','$routeID')";
    return mysqli_query($conn, $sqlInsert) ? true : false;
}

function viewFRoute()
{
    $conn = dbConnection();
    $sqlViewRoute = "SELECT routeID from `urojahaj`.`routedetails`";
    $result3 = mysqli_query($conn, $sqlViewRoute);
    return $result3;
}
function updateFlight($flightID, $flightType, $economyClassSeatsCapacity, $economyClassSeatsFare, $businessClassSeatsCapacity, $businessClassSeatsFare, $routeID)
{
    $conn = dbConnection();
    $flightID = mysqli_real_escape_string($conn, $flightID);
    $sqlUpdate = "UPDATE `urojahaj`.`flightdetails` SET `flightID`='$flightID',`fleet`='$flightType',`economyClassSeatsCapacity`='$economyClassSeatsCapacity',`economyClassSeatsFare`='$economyClassSeatsFare',`businessClassSeatsCapacity`='$businessClassSeatsCapacity',`businessClassSeatsFare`='$businessClassSeatsFare', `routeID` = '$routeID' WHERE `flightID` = '$flightID'";
    return mysqli_query($conn, $sqlUpdate) ? true : false;
}

function deleteFlight($flightID)
{
    $conn = dbConnection();
    $sqlDelete = "DELETE FROM `urojahaj`.`flightdetails` WHERE `flightID` = '$flightID'";
    return mysqli_query($conn,$sqlDelete) ? true : false;
}
?>