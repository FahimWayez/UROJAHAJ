<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["adminAuthenticated"]) || $_SESSION["adminAuthenticated"] !== true) {
    header("location: landingPage.php");
    exit(); 
}

require_once("../Model/routeManagementModel.php");

if(isset($_POST["deleteRoute"]))
{
    $routeID = $_POST["routeID"];

    $status = deleteRoute($routeID);

    if($status)
    {
        header("location: ../View/advancedRouteManagement.php");
    }
    else
    {
        echo "Failed to delete route details";
    }
}
?>