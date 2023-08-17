<?php
if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
if (!isset($_SESSION["adminAuthenticated"]) || $_SESSION["adminAuthenticated"] !== true) {
    header("location: landingPage.php");
    exit(); 
}
    
require_once("../Model/employeeManagementModel.php");
$employeeDetails = viewEmployee();

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
    <form align="center" method="post" action="../Controller/employeeManagementProcess.php"
        name="employeeManagementForm" onsubmit="return validateEmployeeManagementForm();">
        <a href=adminLanding.php>
            <img src="images/logo2.png" width=200 height=200>
        </a>
        <h5>Where dreams take flight...<br><br></h5>
        <hr>
        <h3>Manage Employee</h3>
        <table align="center" width=80%>
            <tr>
                <td colspan="5">
                    <h4>Personal Details
                    </h4>
                </td>
            </tr>
            <tr>
                <td><input type="text" class="employeeID" name="employeeID" id="employeeID" placeholder="Employee ID"
                        size=20></td>
                <td align="center"><select name="title">
                        <option disabled selected>Title</option>
                        <option>Mr</option>
                        <option>Mrs</option>
                        <option>Miss</option>
                        <option>He</option>
                    </select></td>
                <td><input type="text" class="firstName" id="firstName" name="firstName" placeholder="First Name"
                        size=20></td>
                <td><input type="text" class="lastName" id="lastName" name="lastName" placeholder="Last Name" size=20>
                </td>
                <td align="center"><select name="gender">
                        <option disabled selected>Gender</option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Other</option>
                    </select></td>
            </tr>
            <tr>
                <td><br>Date of Birth: <input type="date" class="dateOfBirth" id="dateOfBirth" name="dateOfBirth">
                </td>
            </tr>

            <tr>
                <td colspan="5"><br>
                    <h4>Contact Details

                    </h4>
                </td>
            </tr>
            <tr>
                <td><input type="tel" class="contactNumber" id="contactNumber" name="contactNumber"
                        placeholder="Contact Number"></td>
                <td align="center"><input type="tel" class="emergencyContactNumber" id="emergencyContactNumber"
                        name="emergencyContactNumber" placeholder="Emergency Contact"></td>
                <td align="center"><input type="text" class="email" id="email" name="email" placeholder="E-Mail">
                </td>
                <td align="center" colspan="2"><input type="text" class="address" id="address" name="address"
                        placeholder="Address" size=40></td>
            </tr>

            <tr>
                <td colspan="5"><br>
                    <h4>Other Details</h4>

                </td>
            </tr>
            <tr>
                <td><input type="text" class="position" id="position" name="position" placeholder="Position"></td>
            </tr>
        </table>
        <table align="center" width=100% border=0>
            <tr>
                <td width=100% align="center"><br><br><input type="submit" class="addEmployee" id="addEmployee"
                        name="addEmployee" value="Add Employee"></td>
                <td align="center"><br><br><br><a href="advancedEmployeeManagement.php">Advanced Option</a></td>
            </tr>
        </table>
    </form>

    <br>
    <fieldset>
        <legend align="center">
            <h3>Employee Details</h3>
        </legend>
        <?php if (count($employeeDetails) > 0) { ?>
        <table width="100%" border="2">
            <tr>
                <th>Employee ID</th>
                <th>Title</th>
                <th>Last name, First Name</th>
                <th>Gender</th>
                <th>Date of Birth</th>
                <th>Contact Number</th>
                <th>Emergency contact number</th>
                <th>E-mail</th>
                <th>Address</th>
                <th>Position</th>
            </tr>
            <?php foreach ($employeeDetails as $employee) { ?>
            <tr>
                <td align="center"><?php echo $employee['employeeID']; ?></td>
                <td align="center"><?php echo $employee['title']; ?></td>
                <td align="center"><?php echo $employee['firstName'] . ' ' . $employee['lastName']; ?></td>
                <td align="center"><?php echo $employee['gender']; ?></td>
                <td align="center"><?php echo $employee['dateOfBirth']; ?></td>
                <td align="center"><?php echo $employee['contactNumber']; ?></td>
                <td align="center"><?php echo $employee['emergencyContactNumber']; ?></td>
                <td align="center"><?php echo $employee['email']; ?></td>
                <td align="center"><?php echo $employee['address']; ?></td>
                <td align="center"><?php echo $employee['position']; ?></td>
            </tr>
            <?php } ?>
        </table>
        <?php } else { ?>
        <h3 align="center">No employee records found</h3>
        <?php } ?>
    </fieldset>
    <script src="../JS/employeeManagementScript.js"></script>
</body>

</html>