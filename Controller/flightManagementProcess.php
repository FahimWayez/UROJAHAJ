<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["adminAuthenticated"]) || $_SESSION["adminAuthenticated"] !== true) {
    header("location: landingPage.php");
    exit(); 
}
require_once("../Model/flightManagementModel.php");


if(isset($_POST['addFlight']))
{
    $flightID = $_POST['flightID'];
    $flightType = $_POST['flightType'];
    $economyClassSeatsCapacity = $_POST['economyClassSeatsCapacity'];
    $economyClassSeatsFare = $_POST['economyClassSeatsFare'];
    $businessClassSeatsCapacity = $_POST['businessClassSeatsCapacity'];
    $businessClassSeatsFare = $_POST['businessClassSeatsFare'];
    $routeID = $_POST['routeID'];

    
    $flag = 1;
        

    if(empty($flightID))
    {
        echo "<br><br>Flight ID is a mandatory Field.<br><br>";
        $flag = 0;
    }
    if(empty($flightType))
    {
        echo "<br><br>Fleet is a mandatory Field.<br><br>";
        $flag = 0;
    }
    if(empty($economyClassSeatsCapacity))
    {
        echo "<br><br>Economy class seats capacity is a mandatory Field.<br><br>";
        $flag = 0;
    }
    if(empty($economyClassSeatsFare))
    {
        echo "<br><br>Economy class seats fare is a mandatory Field.<br><br>";
        $flag = 0;
    }
    if(empty($businessClassSeatsCapacity))
    {
        echo "<br><br>Business class seats capacity is a mandatory Field.<br><br>";
        $flag = 0;
    }
    if(empty($businessClassSeatsFare))
    {
        echo "<br><br>Business class seats fare is a mandatory Field.<br><br>";
        $flag = 0;
    }


    if($flag == 1)
    {
        try
        {
            $status = addFlight($flightID, $flightType, $economyClassSeatsCapacity, $economyClassSeatsFare, $businessClassSeatsCapacity, $businessClassSeatsFare, $routeID);
            if($status)
            {
                header("location: ../View/flightManagement.php");
            }
            else
            {
                echo "DB Error";
            }
        }
        catch(mysqli_sql_exception $e)
        {
            echo "Error: Duplicate flight ID";
        }
    }
}
?>