<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["adminAuthenticated"]) || $_SESSION["adminAuthenticated"] !== true) {
    header("location: landingPage.php");
    exit(); 
}

require_once("../Model/employeeManagementModel.php");

if(isset($_POST['updateEmployee'])) {
    $employeeID = $_POST['employeeID'];
    $title = $_POST['title'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $contactNumber = $_POST['contactNumber'];
    $emergencyContactNumber = $_POST['emergencyContactNumber'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $position = $_POST['position'];

    $status = updateEmployee($employeeID, $title, $firstName, $lastName, $gender, $dateOfBirth, $contactNumber, $emergencyContactNumber, $email, $address, $position);

    if($status) {
        header("location: ../View/advancedEmployeeManagement.php");
    } else {
        echo "Failed to update employee details";
    }
}
?>