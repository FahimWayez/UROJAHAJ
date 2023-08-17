<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["adminAuthenticated"]) || $_SESSION["adminAuthenticated"] !== true) {
    header("location: landingPage.php");
    exit(); 
}
require_once("../Model/routeManagementModel.php");

if(isset($_POST['addRoute']))
{
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
    
    $flag = 1;
    
    // $_SESSION['routeID'] = $routeID;

    if(empty($routeID))
    {
        echo "<br><br>Route ID is a mandatory Field.<br><br>";
        $flag = 0;
    }
    if(empty($boardingPoint))
    {
        echo "<br><br>Boarding Point is a mandatory Field.<br><br>";
        $flag = 0;
    }
    if(empty($boardingAirport))
    {
        echo "<br><br>Boarding Airport is a mandatory Field.<br><br>";
        $flag = 0;
    }
    if(empty($destinationPoint))
    {
        echo "<br><br>Destination Point is a mandatory Field.<br><br>";
        $flag = 0;
    }
    if(empty($destinationAirport))
    {
        echo "<br><br>Destination Airport is a mandatory Field.<br><br>";
        $flag = 0;
    }
    
    if(empty($tripType))
    {
        echo "<br><br>Trip Type is a mandatory Field.<br><br>";
        $flag = 0;
    }
    if(empty($dSchedule))
    {
        echo "<br><br>Scheduling date is a mandatory Field.<br><br>";
        $flag = 0;
    }
    if(empty($tSchedule))
    {
        echo "<br><br>Scheduling time is a mandatory Field.<br><br>";
        $flag = 0;
    }

    if($boardingAirport == $destinationAirport)
    {
        echo "<br><br>Boarding and Destination cannot be the same!";
        $flag = 0;
    }

    if($dSchedule>= $rDSchedule && $rDSchedule != null)
    {
        echo "Scheduling date cannot be before the returning date";
        $flag = 0;
    }

    if($tripType == "Return" && (empty($rDSchedule)||empty($rTSchedule)))
    {
        echo "The trip is return type. You must enter the return date and time schedules";
        $flag = 0;
    }


    if($flag == 1)
    {
        try
        {
            $status = addRoute($routeID, $boardingPoint, $boardingAirport, $destinationPoint, $destinationAirport, $tripType, $dSchedule, $tSchedule, $rDSchedule, $rTSchedule);
            if($status)
            {
                header("location: ../View/routeManagement.php");
            }
            else
            {
                echo "DB Error";
            }
        }
        catch(mysqli_sql_exception $e)
        {
            echo "Error: Duplicate route ID.";
        }
    }
}
?>