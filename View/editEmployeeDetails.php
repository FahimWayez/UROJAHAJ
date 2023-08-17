<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["adminAuthenticated"]) || $_SESSION["adminAuthenticated"] !== true) {
    header("location: landingPage.php");
    exit(); 
}
require_once("../Model/employeeManagementModel.php");

if(isset($_POST['employeeID'])) {
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
} else {

    exit("Invalid request");
}
?>


<html>

<head>
    <title>Employee</title>
    <link rel="stylesheet" href="../CSS/employeeManagementStyle.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <form align="center" method="post" action="../Controller/employeeUpdateProcess.php">
        <a href=adminLanding.php>
            <img src="images/logo2.png" width=200 height=200>
        </a>
        <legend>
            <h3>Manage Employee</h3>
        </legend>
        <table align="center" width=80%>
            <tr>
                <td colspan="5">
                    <h4>Personal Details
                        <hr>
                    </h4>
                </td>
            </tr>
            <tr>
                <td><input type="text" class="employeeID" name="employeeID" id="employeeID" placeholder="Employee ID"
                        size=20 value="<?php echo $employeeID; ?>"></td>
                <td align="center">
                    <select name="title">
                        <option disabled selected>Title</option>
                        <option <?php if($title === "Mr") echo "selected"; ?>>Mr</option>
                        <option <?php if($title === "Mrs") echo "selected"; ?>>Mrs</option>
                        <option <?php if($title === "Miss") echo "selected"; ?>>Miss</option>
                        <option <?php if($title === "He") echo "selected"; ?>>He</option>
                    </select>
                </td>
                <td><input type="text" class="firstName" id="firstName" name="firstName" placeholder="First Name"
                        size=20 value="<?php echo $firstName; ?>"></td>
                <td><input type="text" class="lastName" id="lastName" name="lastName" placeholder="Last Name" size=20
                        value="<?php echo $lastName; ?>"></td>
                <td align="center">
                    <select name="gender">
                        <option disabled selected>Gender</option>
                        <option <?php if($gender === "Male") echo "selected"; ?>>Male</option>
                        <option <?php if($gender === "Female") echo "selected"; ?>>Female</option>
                        <option <?php if($gender === "Other") echo "selected"; ?>>Other</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><br>Date of Birth: <input type="date" class="dateOfBirth" id="dateOfBirth" name="dateOfBirth"
                        value="<?php echo $dateOfBirth; ?>"></td>
            </tr>

            <tr>
                <td colspan="5"><br>
                    <h4>Contact Details
                        <hr>
                    </h4>
                </td>
            </tr>
            <tr>
                <td><input type="tel" class="contactNumber" id="contactNumber" name="contactNumber"
                        placeholder="Contact Number" value="<?php echo $contactNumber; ?>"></td>
                <td align="center"><input type="tel" class="emergencyContactNumber" id="emergencyContactNumber"
                        name="emergencyContactNumber" placeholder="Emergency Contact"
                        value="<?php echo $emergencyContactNumber; ?>"></td>
                <td align="center"><input type="email" class="email" id="email" name="email" placeholder="E-Mail"
                        value="<?php echo $email; ?>"></td>
                <td align="center" colspan="2"><input type="text" class="address" id="address" name="address"
                        placeholder="Address" size=40 value="<?php echo $address; ?>"></td>
            </tr>

            <tr>
                <td colspan="5"><br>
                    <h4>Other Details</h4>
                    <hr>
                </td>
            </tr>
            <tr>
                <td><input type="text" class="position" id="position" name="position" placeholder="Position"
                        value="<?php echo $position; ?>"></td>
            </tr>
        </table>
        <table align="center" width=100% border=0>
            <tr>
                <td width=100% align="center"><br><br><input type="submit" class="updateEmployee" id="updateEmployee"
                        name="updateEmployee" value="Update Employee"></td>
            </tr>
        </table>
    </form>

</body>

</html>