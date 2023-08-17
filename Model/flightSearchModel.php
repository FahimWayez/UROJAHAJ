<?php
require_once("databaseConnection.php");
function searchRoute($boardingPoint, $destinationPoint, $tripType, $dSchedule, $rDSchedule)
{
    $conn = dbConnection();

    $boardingPoint = mysqli_real_escape_string($conn, $boardingPoint);
    $destinationPoint = mysqli_real_escape_string($conn, $destinationPoint);
    $tripType = mysqli_real_escape_string($conn, $tripType);
    $dSchedule = mysqli_real_escape_string($conn, $dSchedule);
    $rDSchedule = mysqli_real_escape_string($conn, $rDSchedule);

    $sqlSearch = "SELECT r.*, f.*
                  FROM `routedetails` AS r
                  INNER JOIN `flightdetails` AS f ON r.routeID = f.routeID
                  WHERE r.boardingPoint LIKE '%$boardingPoint%'
                  AND r.destinationPoint LIKE '%$destinationPoint%'
                  AND r.tripType = '$tripType'";

    if ($tripType === 'Return') {
        $sqlSearch .= " AND r.dSchedule = '$dSchedule' AND r.rDSchedule = '$rDSchedule'";
    } else {
        $sqlSearch .= " AND r.dSchedule = '$dSchedule'";
    }

    $result = mysqli_query($conn, $sqlSearch);

    $searchResults = array();

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $searchResults[] = $row;
        }
    }

    return $searchResults;
}

function searchFlight($routeDetails)
{
    $conn = dbConnection();

    $flightDetails = array();

    foreach ($routeDetails as $route) {
        $routeID = $route['routeID'];

        $sqlSearch = "SELECT * FROM flightdetails WHERE routeID = '$routeID'";
        $result = mysqli_query($conn, $sqlSearch);

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $flightDetails[] = $row;
            }
        }
    }

    return $flightDetails;
}

?>