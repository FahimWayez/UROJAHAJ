<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["adminAuthenticated"]) || $_SESSION["adminAuthenticated"] !== true) {
    header("location: landingPage.php");
    exit();
}

?>
<html>

<head>
    <title>Employee</title>
    <link rel="stylesheet" href="../CSS/advancedEmployeeManagementStyle.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
</head>



<body>
    <form align="center">
        <a href=adminLanding.php>
            <image src="images/logo2.png" width=200 height=200>
            </image>
        </a>
        <h5>Where dreams takes flight...</h5>
        <hr>
        <legend>Manage Employee</legend>
        <h4>Search with Employee ID</h4>
        <input type="text" class="employeeID" name="employeeID" id="employeeID" placeholder="Employee ID" size=20>
    </form>
    <div id="searchResults"></div>
    <br><br><br><br>
    <script src="../JS/employeeSearchScript.js"></script>
</body>

</html>