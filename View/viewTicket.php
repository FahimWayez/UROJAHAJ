<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["customerAuthenticated"]) || $_SESSION["customerAuthenticated"] !== true) {
    header("location: landingPage.php");
    exit(); 
}

require_once("../Model/flightManagementModel.php");
require_once("../Model/paymentModel.php");
require_once("../Model/viewTicketModel.php");


if (isset($_GET['flightID'])) {
    $flightID = $_GET['flightID'];
} else {
   //excpetion handling
}


if (isset($_GET['seatType'])) {
    $seatType = $_GET['seatType'];
} else {
    //excpetion handling
}

if (isset($_GET['customerID'])) {
    $customerID = $_GET['customerID'];
} else {
    //excpetion handling
}
$flightDetails = searchFlight($flightID);

if ($seatType == "Economy Class") {
    $fare = $flightDetails['economyClassSeatsFare'];
} else {
    $fare = $flightDetails['businessClassSeatsFare'];
}
$routeID = $flightDetails['routeID'];
$customerDetails = getCustomerDetails($customerID);
$routeDetails = getRouteDetails($routeID);
$bookingID = chr(rand(65, 90)) .    random_int(100, 999) . chr(rand(65, 90)) . random_int(0,9);
?>

<html>

<head>
    <title>Flight Search</title>
    <link rel="stylesheet" href="../CSS/viewTicketStyles.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <table align="center" width=75>
        <tr>
            <td>
                <input type="image" class="logo" src="images/logo2.png" width=100 height=100>
            </td>
            <td colspan="2">
                <h1>Lounge Pass</h1>
            </td>
            <td>
                <h3>UROJAHAJ<br>Where Dreams Take Flight...</h3>
            </td>
        </tr>
        <tr>
            <td width=25%>
                <strong>Name of Passenger<br></strong>
                <?php echo $customerDetails['firstName']." ".$customerDetails['lastName'];?>
            </td>
            <td width=25%></td>
            <td width=25%></td>
            <td width=25%></td>
        </tr>
        <tr>
            <td width=25%>
                <strong>From<br></strong>
                <?php echo $routeDetails['boardingPoint'];?>
            </td>
            <td width=25%>
                <strong>Flight ID<br></strong>
                <?php echo $flightDetails['flightID'];?>
            </td>
            <td width=25%>
                <strong>Flight Schedule<br></strong>
                <?php echo $routeDetails['dSchedule'];?>
            </td>
            <td width=25%>
                <strong>Flight Time<br></strong>
                <?php echo $routeDetails['tSchedule'];?>
            </td>
        </tr>
        <tr>
            <td width=25%>
                <strong>Boarding Airport<br></strong>
                <?php echo $routeDetails['boardingAirport'];?>
            </td>
            <td width=25%></td>
            <td width=25%>
                <strong>Return Flight Schedule<br></strong>
                <?php echo $routeDetails['rDSchedule'];?>
            </td>
            <td width=25%>
                <strong>Return Flight Time<br></strong>
                <?php echo $routeDetails['rTSchedule'];?>
            </td>
        </tr>

        <tr>
            <td width=25%>
                <strong>Destination<br></strong>
                <?php echo $routeDetails['destinationPoint'];?>
            </td>
            <td width=25%>
                <strong>Gate<br></strong>
                <?php $gate = random_int(1,10);
                echo $gate;?>
            </td>
            <td width=25%></td>
            <td width=25%></td>

        </tr>

        <tr>
            <td width=25%>
                <strong>Destination Airport<br></strong>
                <?php echo $routeDetails['destinationAirport'];?>
            </td>
            <td width=25%>
                <strong>Boarding Till<br></strong>
                <?php $boardingTill = $routeDetails['tSchedule'];
                $boardingTill = date('H:i:s', strtotime($boardingTill)-1800);
                echo $boardingTill;?>
            </td>
            <td width=25%>
                <strong>Seat Type<br></strong>
                <?php echo $seatType?>
            </td>
            <td width=25%>
                <strong>Seat Number<br></strong>
                <?php $seatNumber =  chr(rand(65, 90)) . random_int(0, 100);
                echo $seatNumber;?>
            </td>
        </tr>
    </table>

    <div class="buttons">
        <form method="post"
            action="../Controller/downloadTicketProcess.php?flightID=<?php echo $flightID; ?>&seatType=<?php echo urlencode($seatType); ?>&customerID=<?php echo urlencode($customerID);?>&gate=<?php echo urlencode($gate);?>&seatNumber=<?php echo urldecode($seatNumber)?>&boardingTill=<?php echo urldecode($boardingTill)?>&bookingID=<?php echo urlencode($bookingID)?>">
            <button class="downloadButton" type="submit" name="downloadTicket">
                <i class="fa-solid fa-download"></i>
                Download Ticket
            </button>
        </form>
        <button class="goBack"><i class="fa-solid fa-backward"><a href="#" onclick="history.back();"> Go back
                </a></i></button>
    </div>
</body>

</html>