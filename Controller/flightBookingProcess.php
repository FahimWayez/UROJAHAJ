<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (!isset($_SESSION["customerAuthenticated"]) || $_SESSION["customerAuthenticated"] !== true) {
    header("location: landingPage.php");
    exit(); 
}

if (isset($_GET['flightID'])) {
    $flightID = $_GET['flightID'];
} else {
//exception handling baki
}

require_once("../Model/flightManagementModel.php");
require_once("../Model/routeManagementModel.php");

$flightDetails = searchFlight($flightID);


$routeDetails = searchRoute($flightDetails['routeID']);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the selected seat type
    if (isset($_POST['seatType'])) {
        $seatType = $_POST['seatType'];
    } else {
        //exception handling baki
    }


    header("Location: ../View/payment.php?flightID=$flightID&seatType=" . urlencode($seatType));
    exit();
}
?>