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

if (isset($_GET['flightID'])) {
    $flightID = $_GET['flightID'];
} else {
    //error handling
}


$flightDetails = searchFlight($flightID);


if (isset($_GET['seatType'])) {
    $seatType = $_GET['seatType'];
} else {
    //error handling
}

if (isset($_GET['customerID'])) {
    $customerID = $_GET['customerID'];
} else {
    //error handling
}


if ($seatType == "Economy Class") {
    $fare = $flightDetails['economyClassSeatsFare'];
} else {
    $fare = $flightDetails['businessClassSeatsFare'];
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $paymentMethod = $_GET['paymentMethod'];

    
    if ($paymentMethod === "bank" || $paymentMethod === "bkash") {
        $customerID = $_GET['customerID'];

        if ($paymentMethod === "bank") {
            
            $cardNumber = $_POST['cardNumber'];
            $cardExpiryDate = $_POST['cardExpiryDate'];
            $cvc = $_POST['cvc'];
            $cardHolderName = $_POST['cardHolderName'];

            
            if (validateBankPaymentData($customerID, $cardNumber, $cardExpiryDate, $cvc, $cardHolderName)) {
                header("location: ../View/viewTicket.php?flightID={$flightID}&seatType=" . urlencode($seatType) . "&customerID=" . urlencode($customerID));
            } else {
                
                echo "Invalid bank payment data!";
            }
        } elseif ($paymentMethod === "bkash") {
            
            $bKashNumber = $_POST['bKashNumber'];
            $bKashPin = $_POST['bKashPin'];

            
            if (validateBkashPaymentData($customerID, $bKashNumber, $bKashPin)) {
                header("location: ../View/viewTicket.php?flightID={$flightID}&seatType=" . urlencode($seatType) . "&customerID=" . urlencode($customerID));
            } else {
                
                echo "Invalid bKash payment data!";
            }
        }
    } else {
    
        echo "Invalid payment method!";
    }
} else {
    
    header("Location: payment.php");
    exit();
}
?>