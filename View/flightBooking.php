<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (!isset($_SESSION["customerAuthenticated"]) || $_SESSION["customerAuthenticated"] !== true) {
    header("location: landingPage.php");
    exit(); 
}

if (isset($_GET['flightID'])) {
    $flightID = $_GET['flightID'];
} else {//exception handle kore dibo
}

require_once("../Model/flightManagementModel.php");
require_once("../Model/routeManagementModel.php");
require_once("../Model/customerProfileModel.php");
require_once("../Controller/loginProcess.php");

$storedEmail = $_SESSION["email"];

$profileDetails = getProfile($storedEmail);
$customerID = $profileDetails["customerID"];

$flightDetails = searchFlight($flightID);

$routeDetails = searchRoute($flightDetails['routeID']);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if (isset($_POST['seatType']) && !empty($_POST['customerID'])){
        $seatType = $_POST['seatType'];
        $customerID = $_POST['customerID'];
    } else 
    {
        $currentUrl = $_SERVER['REQUEST_URI'];
        $msg = "Please select seat type";
        header("Location: $currentUrl&msg=$msg");
        exit();
    }

    header("Location: payment.php?flightID=$flightID&seatType=" . urlencode($seatType). "&customerID=" . urlencode($customerID));
    exit();
}
?>
<html>

<head>
    <title>Flight Booking</title>
    <link rel="stylesheet" href="../CSS/flightBookingStyle.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <button class="goBack"><i class="fa-solid fa-backward"><a href="#" onclick="history.back();"> Go
                back</a></i></button>
    <fieldset align="center">
        <a href="startingPage.php">
            <img src="images/logo2.png" width="150" height="150"><br>
        </a>
        <table width="80%" align="center" border=0>
            <tr>
                <td align="center" colspan="3">
                    <?php echo $routeDetails['boardingPoint'] . ' To ' . $routeDetails['destinationPoint'] ?><br><br>
                </td>
            </tr>
            <tr>
                <td align="right" width=33%><?php echo "Departure: " . $routeDetails['dSchedule'] ?><br><br>
                </td>
                <td align="center" width=33%></td>
                <td align="left" width=33%>
                    <?php echo "Time: " . $routeDetails['tSchedule'] ?><br><br>
                </td>
            </tr>
            <tr>
                <td align="center" width=33%>
                    <?php echo $routeDetails['boardingAirport'] ?><br><br>
                </td>
                <td align="center" width=33%><?php echo $flightDetails['fleet'] ?><br><br></td>
                <td align="center" width=33%>
                    <?php echo $routeDetails['destinationAirport'] ?><br><br>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="3">
                    <form method="post" name="flightBookingForm">
                        <select name="seatType">
                            <option disabled selected>Seat Type</option>
                            <option value="Economy Class">Economy Class</option>
                            <option value="Business Class">Business Class</option>
                        </select><br><br>
                        <input type="hidden" class="customerID" id="customerID" name="customerID"
                            value="<?php echo $customerID ?>" size=20>
                        <br><br><br><br><br><br>

                        <input type="submit" value="Proceed to Payment">
                    </form>
                </td>
            </tr>
        </table>
    </fieldset>

    <script src="../JS/flightBookingScript.js"></script>
</body>

</html>