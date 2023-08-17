<?php
if(!session_start()) {
    session_start();
}


require_once("../Model/routeManagementModel.php");

if(isset($_POST['updateRoute'])) {
    $routeID = $_POST['routeID'];
    $boardingPoint = $_POST['boardingPoint'];
    $boardingAirport = $_POST['boardingAirport'];
    $destinationPoint = $_POST['destinationPoint'];
    $destinationAirport = $_POST['destinationAirport'];
    $tripType = $_POST['tripType'];
    $dSchedule = $_POST['dSchedule'];
    $tSchedule = $_POST['tSchedule'];
    $rDSchedule = $_POST['rDSchedule'];
    $rTSchedule = $_POST['rTSchedule'];

    $status = updateRoute($routeID, $boardingPoint, $boardingAirport, $destinationPoint, $destinationAirport, $tripType, $dSchedule, $tSchedule, $rDSchedule, $rTSchedule);

    if($status) {
        header("location: ../View/advancedRouteManagement.php");
    } else {
        echo "Failed to update route details";
    }
}

?>