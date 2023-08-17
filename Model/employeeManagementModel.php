<?php
require_once("databaseConnection.php");

function viewEmployee()
{
    $conn = dbConnection();
    $sqlView = "SELECT * FROM `urojahaj`.`employeedetails`";
    $result = mysqli_query($conn, $sqlView);

    $employeeDetails = array();

    while($row = mysqli_fetch_array($result))
    {
        $employeeDetails[] = $row;
    }
    
    return $employeeDetails;
}
function searchEmployee($employeeID)
{
    $conn = dbConnection();
    $sqlSearch = "SELECT * FROM `urojahaj`.`employeedetails` WHERE employeeID = '{$employeeID}'";
    $result2 = mysqli_query($conn, $sqlSearch);
    return $result2;
}

function addEmployee($employeeID, $title, $firstName, $lastName, $gender, $dateOfBirth, $contactNumber, $emergencyContactNumber, $email, $address, $position)
{
    $conn = dbConnection();
    $sqlInsert = "INSERT INTO `urojahaj`.`employeedetails`(`employeeID`, `title`, `firstName`, `lastName`, `gender`, `dateOfBirth`, `contactNumber`, `emergencyContactNumber`, `email`, `address`, `position`) VALUES ('$employeeID', '$title', '$firstName', '$lastName', '$gender', '$dateOfBirth','$contactNumber', '$emergencyContactNumber', '$email', '$address', '$position')";
    return mysqli_query($conn, $sqlInsert) ? true : false;
}

function updateEmployee($employeeID, $title, $firstName, $lastName, $gender, $dateOfBirth, $contactNumber, $emergencyContactNumber, $email, $address, $position)
{
    $conn = dbConnection();
    $employeeID = mysqli_real_escape_string($conn, $employeeID);
    $sqlUpdate = "UPDATE `urojahaj`.`employeedetails` SET `employeeID`='$employeeID',`title`='$title',`firstName`='$firstName',`lastName`='$lastName',`gender`='$gender',`dateOfBirth`='$dateOfBirth', `contactNumber` = '$contactNumber', `emergencyContactNumber` = '$emergencyContactNumber', `email` = '$email', `address` = '$address',`position`= '$position' WHERE `employeeID` = '$employeeID'";
    return mysqli_query($conn, $sqlUpdate) ? true : false;
}

function deleteEmployee($employeeID)
{
    $conn = dbConnection();
    $sqlDelete = "DELETE FROM `urojahaj`.`employeedetails` WHERE `employeeID` = '$employeeID'";
    return mysqli_query($conn,$sqlDelete) ? true : false;
}
?>