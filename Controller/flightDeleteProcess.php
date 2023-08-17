<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["adminAuthenticated"]) || $_SESSION["adminAuthenticated"] !== true) {
    header("location: landingPage.php");
    exit(); 
}

require_once("../Model/flightManagementModel.php");

if(isset($_POST["deleteFlight"]))
{
    $flightID = $_POST["flightID"];

    $status = deleteFlight($flightID);

    if($status)
    {
        header("location: ../View/advancedFlightManagement.php");
    }
    else
    {
        echo "Failed to delete Flight details";
    }
}
?>