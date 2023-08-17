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
    <title>Flights</title>
    <link rel="stylesheet" href="../CSS/advancedFlightManagementStyle.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <form align="center">
        <a href=adminLanding.php>
            <img src="images/logo2.png" width=200 height=200>
        </a>
        <h5>Where dreams take flight...<br><br></h5>
        <hr>
        <legend>Manage Flight</legend>
        <h4>Search with flight ID</h4>
        <input type="text" class="flightID" name="flightID" id="flightID" placeholder="flight ID" size=20>
    </form>
    <div id="searchResults"></div>
    <br><br><br><br>
    <script src="../JS/searchFlightScript.js"></script>
</body>

</html>