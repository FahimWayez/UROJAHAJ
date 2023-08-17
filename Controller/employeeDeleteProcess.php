<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["adminAuthenticated"]) || $_SESSION["adminAuthenticated"] !== true) {
    header("location: landingPage.php");
    exit(); 
}

require_once("../Model/employeeManagementModel.php");

if(isset($_POST["deleteEmployee"]))
{
    $employeeID = $_POST["employeeID"];

    $status = deleteEmployee($employeeID);

    if($status)
    {
        header("location: ../View/advancedEmployeeManagement.php");
    }
    else
    {
        echo "Failed to delete employee details";
    }
}
?>