<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["customerAuthenticated"]) || $_SESSION["customerAuthenticated"] !== true) {
    header("location: landingPage.php");
    exit(); 
}

require_once "../Model/flightManagementModel.php";
require_once "../Model/paymentModel.php";
require_once "../Model/viewTicketModel.php";

if (isset($_GET['flightID'])) {
    $flightID = $_GET['flightID'];
} else {

}

if(isset($_GET['seatNumber'])){
    $seatNumber = $_GET['seatNumber'];
}
else{
    
}

if(isset($_GET['gate'])){
    $gate = $_GET['gate'];
}
else{

}

if(isset($_GET['bookingID'])){
    $bookingID = $_GET['bookingID'];
}
else{
    
}

if(isset($_GET['boardingTill'])){
    $boardingTill = $_GET['boardingTill'];
}
else{
    
}
// Fetch flight details

// Retrieve the seat type from the query parameters
if (isset($_GET['seatType'])) {
    $seatType = $_GET['seatType'];
} else {
    //errorHandling
}

if (isset($_GET['customerID'])) {
    $customerID = $_GET['customerID'];
} else {
   //errorHandling
}
$flightDetails = searchFlight($flightID);

// Determine the fare based on the selected seat type
if ($seatType == "Economy Class") {
    $fare = $flightDetails['economyClassSeatsFare'];
} else {
    $fare = $flightDetails['businessClassSeatsFare'];
}
$routeID = $flightDetails['routeID'];
$customerDetails = getCustomerDetails($customerID);
$routeDetails = getRouteDetails($routeID);


if(isset($_POST["downloadTicket"])){
// PDF Generation
require_once 'vendor/autoload.php'; 
// $html = '<html><body><h1auhskdjalksjd!</h1></body></html>';

$html = '<html><head>';
$html = '<title>Ticket Download</title>';
$html .= '</head><body>';
$html .= '<table align="center" width=100%>';
$html .= '<tr>';
$html .= '<td colspan="4" align = "center">';
$html .= '<img class="logo" src="images/logo2.png" width="100" height="100">';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td colspan="4" align = "center">';
$html .= '<h1>Lounge Pass</h1>';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td colspan="4" align = "center">';
$html .= '<h3>UROJAHAJ<br>Where Dreams Take Flight...</h3><br><br>';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td colspan="4" align = "center">';
$html .= '<h2>Booking ID: '. $bookingID;
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td width="25%"><strong>Name of Passenger<br></strong>' . $customerDetails['firstName'] . ' ' . $customerDetails['lastName'] . '</td>';
$html .= '<td width="25%"></td>';
$html .= '<td width="25%"></td>';
$html .= '<td width="25%"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td width="25%"><strong>From<br></strong>' . $routeDetails['boardingPoint'] . '</td>';
$html .= '<td width="25%"><strong>Flight ID<br></strong>' . $flightDetails['flightID'] . '</td>';
$html .= '<td width="25%"><strong>Flight Schedule<br></strong>' . $routeDetails['dSchedule'] . '</td>';
$html .= '<td width="25%"><strong>Flight Time<br></strong>' . $routeDetails['tSchedule'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td width="25%"><strong>Boarding Airport<br></strong>' . $routeDetails['boardingAirport'] . '</td>';
$html .= '<td width="25%"></td>';
$html .= '<td width="25%"><strong>Return Flight Schedule<br></strong>' . $routeDetails['rDSchedule'] . '</td>';
$html .= '<td width="25%"><strong>Return Flight Time<br></strong>' . $routeDetails['rTSchedule'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td width="25%"><strong>Destination<br></strong>' . $routeDetails['destinationPoint'] . '</td>';
$html .= '<td width="25%"><strong>Gate<br></strong>' . $gate . '</td>';
$html .= '<td width="25%"></td>';
$html .= '<td width="25%"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td width="25%"><strong>Destination Airport<br></strong>' . $routeDetails['destinationAirport'] . '</td>';
$html .= '<td width="25%"><strong>Boarding Till<br></strong>' . $boardingTill . '</td>';
$html .= '<td width="25%"><strong>Seat Type<br></strong>' . $seatType . '</td>';
$html .= '<td width="25%"><strong>Seat Number<br></strong>' . $seatNumber . '</td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '</body></html>';

$dompdf = new Dompdf\Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();


$file_name = $customerDetails['customerID'] . '_' . $bookingID . '_' . $flightDetails['flightID'] . '_' . date('YmdHis') . '.pdf';
$dompdf->stream($file_name, array('Attachment' => 0));
exit();
}
?>