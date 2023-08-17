<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["adminAuthenticated"]) || $_SESSION["adminAuthenticated"] !== true) {
    header("location: landingPage.php");
    exit(); 
}

require_once("../Model/flightManagementModel.php");

if(isset($_POST['updateFlight'])) {
    $flightID = $_POST['flightID'];
    $flightType = $_POST['flightType'];
    $economyClassSeatsCapacity = $_POST['economyClassSeatsCapacity'];
    $economyClassSeatsFare = $_POST['economyClassSeatsFare'];
    $businessClassSeatsCapacity = $_POST['businessClassSeatsCapacity'];
    $businessClassSeatsFare = $_POST['businessClassSeatsFare'];
    $routeID = $_POST['routeID'];

    $status = updateFlight($flightID, $flightType, $economyClassSeatsCapacity, $economyClassSeatsFare, $businessClassSeatsCapacity, $businessClassSeatsFare, $routeID);

    if($status) {
        header("location: ../View/advancedFlightManagement.php");
    } else {
        echo "Failed to update flight details";
    }
}
?>