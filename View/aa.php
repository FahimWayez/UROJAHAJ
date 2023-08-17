<?php
if(isset($_POST['searchEmployee']))
{
    $employeeID = $_POST['employeeID'];

    require_once("../Model/employeeManagementModel.php");

    $employeeDetails = searchEmployee($employeeID);    
}
?>
<html>

<head>
    <title>Employee Management</title>
</head>

<body>
    <form align="center" method="post" action="advancedEmployeeManagement.php">
        <a href=adminLanding.php>
            <image src="images/Logo.png" width=200 height=200></image>
        </a>
        <fieldset>
            <legend>Manage Employee</legend>
            <h3>Search with Employee ID</h3>
            <input type="text" class="employeeID" name="employeeID" id="employeeID" placeholder="Employee ID" size=20>
            <input type="submit" class="searchEmployee" id="searchEmployee" name="searchEmployee" value="Search">

        </fieldset>
    </form>
    <br><br><br><br>
    <fieldset>
        <legend align="center">
            <h3>Employee Details</h3>
        </legend>
        <?php 
            if(isset($employeeDetails) && !empty($employeeDetails))
            {?>
        <table width=100% border=1>
            <tr>
                <th>Employee ID</th>
                <th>Title</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Gender</th>
                <th>Date of Birth</th>
                <th>Contact Number</th>
                <th>Emergency Contact Number</th>
                <th>Email</th>
                <th>Address</th>
                <th>Position</th>
                <th colspan="2">Action</th>
            </tr>
            <tr>
                <td align="center"><?php echo $employeeDetails['employeeID']?></td>
                <td align="center"><?php echo $employeeDetails['title']?></td>
                <td align="center"><?php echo $employeeDetails['firstName']?></td>
                <td align="center"><?php echo $employeeDetails['lastName']?></td>
                <td align="center"><?php echo $employeeDetails['gender']?></td>
                <td align="center"><?php echo $employeeDetails['dateOfBirth']?></td>
                <td align="center"><?php echo $employeeDetails['contactNumber']?></td>
                <td align="center"><?php echo $employeeDetails['emergencyContactNumber']?></td>
                <td align="center"><?php echo $employeeDetails['email']?></td>
                <td align="center"><?php echo $employeeDetails['address']?></td>
                <td align="center"><?php echo $employeeDetails['position']?></td>

                <td align="center">
                    <form method="post" action="editEmployeeDetails.php">
                        <br><input type="hidden" class="employeeID" name="employeeID" id="employeeID"
                            value="<?php echo $employeeDetails['employeeID'] ?>">
                        <input type="hidden" name="title" value="<?php echo $employeeDetails['title'] ?>">
                        <input type="hidden" name="firstName" value="<?php echo $employeeDetails['firstName'] ?>">
                        <input type="hidden" name="lastName" value="<?php echo $employeeDetails['lastName'] ?>">
                        <input type="hidden" name="gender" value="<?php echo $employeeDetails['gender'] ?>">
                        <input type="hidden" name="dateOfBirth" value="<?php echo $employeeDetails['dateOfBirth'] ?>">
                        <input type="hidden" name="contactNumber"
                            value="<?php echo $employeeDetails['contactNumber'] ?>">
                        <input type="hidden" name="emergencyContactNumber"
                            value="<?php echo $employeeDetails['emergencyContactNumber'] ?>">
                        <input type="hidden" name="email" value="<?php echo $employeeDetails['email'] ?>">
                        <input type="hidden" name="address" value="<?php echo $employeeDetails['address'] ?>">
                        <input type="hidden" name="position" value="<?php echo $employeeDetails['position'] ?>">
                        <input type="submit" class="editEmployee" id="editEmployee" name="editEmployee"
                            value="Edit Employee">
                    </form>

                </td>
                <td align="center">
                    <form method="post" action="../Controller/employeeDeleteProcess.php">
                        <br><input type="hidden" name="employeeID" value="<?php echo $employeeDetails['employeeID']?>">
                        <input type="submit" name="deleteEmployee" value="Delete Employee">
                    </form>
                </td>
            </tr>
        </table>
        <?php } else {
        ?>
        <h3 align="center">No Employees matched</h3>
        <?php } ?>
    </fieldset>

</body>

</html>