<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["adminAuthenticated"]) || $_SESSION["adminAuthenticated"] !== true) {
    header("location: landingPage.php");
    exit(); 
}

require_once("../Model/adminProfileModel.php");
require_once("../Controller/loginProcess.php");

$storedEmail = $_SESSION["email"];

$profileDetails = getProfile($storedEmail);
$profilePhoto = $profileDetails["profilePhoto"];

if (isset($_POST["downloadCard"])) {
    require_once 'vendor/autoload.php';     
    $html = '<html><head>';
    $html .= '<style>';
    $html .= '</style>';
    $html .= '</head><body>';
    $html .= '<fieldset>';
    $html .= '<div class="header">';
    $html .= '<img class="companyLogo" src="../View/images/logo2.png" alt="Company Logo" align = "center">';
    $html .= '</div>';
    $html .= '<h1 align = "center">UROJAHAJ</h1>';
    $html .= '<div class="motto">';
    $html .= '<p align = "center"><strong>Where Dreams Take Flight</p>';
    $html .= '</div>';
    $html .= '<h3 align = "center">Admin Card</h3>';
    $html .= '<p align = "center"><strong>Admin ID:</strong> ' . $profileDetails["adminID"] . '</p>';
    $html .= '<div class="profileDetails">';
    $html .= '<p align = "center"><strong>Name:</strong> ' . $profileDetails["firstName"] . ' ' . $profileDetails["lastName"] . '</p>';
    $html .= '<p align = "center"><strong>Contact:</strong> ' . $profileDetails["contactNumber"] . '</p>';
    $html .= '<p align = "center"><strong>Home Address:</strong> ' . $profileDetails["countryOfResidence"] . '</p>';
    $html .= '<p align = "center"><strong>Date of Birth:</strong> ' . $profileDetails["dateOfBirth"] . '</p>';
    $html .= '<p align = "center">If you ever find this card, please contact with the phone number above, or mail us at urojahaj465@gmail.com.</p>';
    $html .= '</div>';
    $html .= '</fieldset>';
    $html .= '</body></html>';

    $dompdf = new Dompdf\Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    $file_name = $profileDetails["firstName"] . '_' . $profileDetails["lastName"] . "_Admin_" . $profileDetails["adminID"] . "_". date('YmdHis') . '.pdf';
    $dompdf->stream($file_name, array('Attachment' => 0));
    exit();
}

?>