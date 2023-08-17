<?php
require_once("databaseConnection.php");


function isLoggedIn()
    {
        return isset($_SESSION["email"]); 
    }
    
    function isAdmin()
    {
        if (isLoggedIn()) 
        {
            $storedEmail = $_SESSION["email"];
            $type = get_Type($storedEmail);
            $type['type'] == 'Admin';
        }
        return false;
    }
function viewRoute()
{
    $conn = dbConnection();
    $sqlView = "SELECT * FROM `urojahaj`.`routedetails`";
    $result = mysqli_query($conn, $sqlView);

    $routeDetails = array();

    while($row = mysqli_fetch_array($result))
    {
        $routeDetails[] = $row;
    }
    
    return $routeDetails;
}
function searchRoute($routeID)
{
    $conn = dbConnection();
    $sqlSearch = "SELECT * FROM `urojahaj`.`routedetails` WHERE routeID = '$routeID'";
    $result2 = mysqli_query($conn, $sqlSearch);
    $routeDetails2 = array();
    if($result2 && mysqli_num_rows($result2)>0)
    {
        $routeDetails2 = mysqli_fetch_assoc($result2);
    }
    return $routeDetails2;
}

function advancedSearchRoute($routeID)
    {
    $conn = dbConnection();
    $sql4 = "SELECT * from `urojahaj`.`routedetails` where routeID = '{$routeID}'";
    $result4 = mysqli_query($conn, $sql4);
    
    return $result4;
    }
function addRoute($routeID, $boardingPoint, $boardingAirport, $destinationPoint, $destinationAirport, $tripType, $dSchedule, $tSchedule, $rDSchedule, $rTSchedule)
{
    $conn = dbConnection();
    $sqlInsert = "INSERT INTO `urojahaj`.`routedetails`(`routeID`, `boardingPoint`, `boardingAirport`, `destinationPoint`, `destinationAirport`, `tripType`, `dSchedule`, `tSchedule`, `rDSchedule`, `rTSchedule`) VALUES ('$routeID', '$boardingPoint', '$boardingAirport', '$destinationPoint', '$destinationAirport', '$tripType', '$dSchedule', '$tSchedule', '$rDSchedule', '$rTSchedule')";
    return mysqli_query($conn, $sqlInsert) ? true : false;
}

function updateRoute($routeID, $boardingPoint, $boardingAirport, $destinationPoint, $destinationAirport, $tripType, $dSchedule, $tSchedule, $rDSchedule, $rTSchedule)
{
    $conn = dbConnection();
    $routeID = mysqli_real_escape_string($conn, $routeID);
    $sqlUpdate = "UPDATE `urojahaj`.`routedetails` SET `routeID`='$routeID',`boardingPoint`='$boardingPoint',`boardingAirport`='$boardingAirport',`destinationPoint`='$destinationPoint',`destinationAirport`='$destinationAirport',`tripType`='$tripType', `dSchedule`='$dSchedule', `tSchedule`='$tSchedule', `rDSchedule`='$rDSchedule', `rTSchedule`='$rTSchedule' WHERE `routeID` = '$routeID'";
    return mysqli_query($conn, $sqlUpdate) ? true : false;
}

function deleteRoute($routeID)
{
    $conn = dbConnection();
    $sqlDelete = "DELETE FROM `urojahaj`.`routedetails` WHERE `routeID` = '$routeID'";
    return mysqli_query($conn,$sqlDelete) ? true : false;
}
?>