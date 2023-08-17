<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["adminAuthenticated"]) || $_SESSION["adminAuthenticated"] !== true) {
    header("location: landingPage.php");
    exit(); 
}
require_once("../Model/employeeManagementModel.php");

if (isset($_POST['search'])) {
    $employeeID = $_POST['search'];

    $results = searchEmployee($employeeID);

    echo "<table>";
    echo "<tr>";
    echo "<th>employee ID</th>";
    echo "<th>Title</th>";
    echo "<th>Name</th>";
    echo "<th>Date of Birth</th>";
    echo "<th>Gender</th>";
    echo "<th>Email</th>";
    echo "<th>Contact Number</th>";
    echo "<th>Emergency Contact Number</th>";
    echo "<th>Address</th>";
    echo "<th>Position</th>";
    echo "<th colspan ='2' width = 20%>Action</th>";
    echo "</tr>";

    while ($row = mysqli_fetch_assoc($results)) {
        echo "<tr>";
        echo "<td>{$row['employeeID']}</td>";
        echo "<td>{$row['title']}</td>";
        echo "<td>{$row['firstName']} {$row['lastName']}</td>";
        echo "<td>{$row['dateOfBirth']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['email']}</td>";
        echo "<td>{$row['contactNumber']}</td>";
        echo "<td>{$row['emergencyContactNumber']}</td>";
        echo "<td>{$row['address']}</td>";
        echo "<td>{$row['position']}</td>";
        echo "<td>";
        echo "<form method='post' action='../Controller/employeeDeleteProcess.php'>";
        echo "<input type='hidden' name='employeeID' value='{$row['employeeID']}'>";
        echo "<input class = 'deleteButton' type='submit' name='deleteEmployee' value='Delete Employee'>";
        echo "</form>";
        echo "</td>";
        echo "<td>";
        echo "<form method='post' action='../View/editEmployeeDetails.php'>";
        echo "<input type='hidden' name='employeeID' value='{$row['employeeID']}'>";
        echo "<input type='hidden' name='title' value='{$row['title']}'>";
        echo "<input type='hidden' name='firstName' value='{$row['firstName']}'>";
        echo "<input type='hidden' name='lastName' value='{$row['lastName']}'>";
        echo "<input type='hidden' name='dateOfBirth' value='{$row['dateOfBirth']}'>";
        echo "<input type='hidden' name='gender' value='{$row['gender']}'>";
        echo "<input type='hidden' name='email' value='{$row['email']}'>";
        echo "<input type='hidden' name='contactNumber' value='{$row['contactNumber']}'>";
        echo "<input type='hidden' name='emergencyContactNumber' value='{$row['emergencyContactNumber']}'>";
        echo "<input type='hidden' name='address' value='{$row['address']}'>";
        echo "<input type='hidden' name='position' value='{$row['position']}'>";
        echo "<input  class = 'editButton' type='submit' name='updateEmployee' value='Edit Employee'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
}
    
?>