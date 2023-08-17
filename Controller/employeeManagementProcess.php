<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["adminAuthenticated"]) || $_SESSION["adminAuthenticated"] !== true) {
    header("location: landingPage.php");
    exit(); 
}

require_once("../Model/employeeManagementModel.php");

if (isset($_POST['addEmployee'])) {
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

    $flag = 1;
    
    if(empty($employeeID))
    {
        echo "<br><br>Employee ID is a mandatory Field.<br><br>";
        $flag = 0;
    }
    if(empty($title))
    {
        echo "<br><br>Title is a mandatory Field.<br><br>";
        $flag = 0;
    }
    if(empty($firstName))
    {
        echo "<br><br>First Name is a mandatory Field.<br><br>";
        $flag = 0;
    }
    if(empty($lastName))
    {
        echo "<br><br>Last Name is a mandatory Field.<br><br>";
        $flag = 0;
    }
    if(empty($gender))
    {
        echo "<br><br>Gender is a mandatory Field.<br><br>";
        $flag = 0;
    }
    if(empty($dateOfBirth))
    {
        echo "<br><br>Date of Birth is a mandatory Field.<br><br>";
        $flag = 0;
    }

    if(empty($contactNumber))
    {
        echo "<br><br>Contact Number is a mandatory Field.<br><br>";
        $flag = 0;
    }
    if(empty($emergencyContactNumber))
    {
        echo "<br><br>Emergency Contact Number is a mandatory Field.<br><br>";
        $flag = 0;
    }
    $atPos = strpos($email, '@');
    $dotPos = strpos($email, '.');

    if (empty($email)) 
    {
        echo "Your username field is empty";
        $flag = 0;
    } 
    else if ($atPos === false || $atPos === 0 || $dotPos === false || $dotPos <= $atPos + 1 || $dotPos === strlen($email) - 1) 
    {
        echo "Please enter a valid email address. <br><br>";
        $flag = 0;
    }
    if(empty($address))
    {
        echo "<br><br>Address is a mandatory Field.<br><br>";
        $flag = 0;
    }
    if(empty($position))
    {
        echo "<br><br>Position is a mandatory Field.<br><br>";
        $flag = 0;
    }

    if($flag == 1)
    {
        try
        {
             $status = addEmployee($employeeID, $title, $firstName, $lastName, $gender, $dateOfBirth, $contactNumber, $emergencyContactNumber, $email, $address, $position);
    
            if($status)
            {
                header("location: ../View/employeeManagement.php");
            }
            else
            {
                echo "DB Error";
            }
        }
        catch(mysqli_sql_exception $e)
        {
            echo "Error: Duplicate Employee ID";
        }
    }
}
?>