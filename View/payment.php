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
    // Handle the case when flightID is not provided
    // For example, redirect to an error page or display an error message
}

// Fetch flight details
$flightDetails = searchFlight($flightID);

// Retrieve the seat type from the query parameters
if (isset($_GET['seatType'])) {
    $seatType = $_GET['seatType'];
} else {
    // Handle the case when seatType is not available
    // For example, redirect to an error page or display an error message
}

if (isset($_GET['customerID'])) {
    $customerID = $_GET['customerID'];
} else {
    // Handle the case when seatType is not available
    // For example, redirect to an error page or display an error message
}

// Determine the fare based on the selected seat type
if ($seatType == "Economy Class") {
    $fare = $flightDetails['economyClassSeatsFare'];
} else {
    $fare = $flightDetails['businessClassSeatsFare'];
}

?>

<html>

<head>
    <title>Payment</title>
    <link rel="stylesheet" href="../CSS/paymentStyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="details">
        <input type="image" class="logo" src="images/logo2.png" width=200 height=200>
        <h2>Payment Portal</h2>
        <p>You are going to pay BDT
            <?php echo $fare ?> to UROJAHAJ.<br><br><br> Please select the payment method
        </p>
        <button class="goBack"><i class="fa-solid fa-backward"><a href="#" onclick="history.back();"> Go back
                </a></i></button>
        <button class="bankPopup">Bank</button>
        <button class="bKashPopup">bKash</button>
        </header>
    </div>
    <div class="wrapper">
        <div class="formBox bank">
            <h2>Bank Transfer</h2>
            <form method="post"
                action="../Controller/paymentProcess.php?flightID=<?php echo $flightID; ?>&seatType=<?php echo urlencode($seatType); ?>&customerID=<?php echo urlencode($customerID); ?>&paymentMethod=bank"
                name="bankForm" onsubmit="return validateBankForm();">
                <div class="textBox">
                    <span class="icon">
                        <i class="fa-solid fa-credit-card"></i>
                    </span>
                    <input type="tel" name="cardNumber">
                    <label>Card Number</label>
                </div>
                <div class="textBox">
                    <span class="icon">
                        <i class="fa-solid fa-calendar-days"></i>
                    </span>
                    <input type="date" name="cardExpiryDate">
                    <label>Card Expiry Date</label>
                </div>
                <div class="textBox">
                    <span class="icon">
                        <i class="fa-solid fa-lock"></i>
                    </span>
                    <input type="password" name="cvc">
                    <label>CVC</label>
                </div>
                <div class="textBox">
                    <span class="icon">
                        <i class="fa-solid fa-address-card"></i>
                    </span>
                    <input type="text" name="cardHolderName">
                    <label>Card Holder Name</label>
                </div>
                <button type="submit" class="bankbKashButton" name="bankButton">Submit</button>
            </form>
        </div>

        <div class="formBox bKash">
            <h2>bKash Transfer</h2>
            <form method="post"
                action="../Controller/paymentProcess.php?flightID=<?php echo $flightID; ?>&seatType=<?php echo urlencode($seatType); ?>&customerID=<?php echo urlencode($customerID); ?>&paymentMethod=bkash"
                name="bKashForm" onsubmit="return validatebKashForm();">

                <div class="textBox">
                    <span class="icon">
                        <i class="fa-solid fa-phone"></i>
                    </span>
                    <input type="tel" name="bKashNumber">
                    <label>bKash Number</label>
                </div>
                <div class="textBox">
                    <span class="icon">
                        <i class="fa-solid fa-lock"></i>
                    </span>
                    <input type="password" name="bKashPin">
                    <label>bKash PIN</label>
                </div>
                <button type="submit" class="bankbKashButton" name="bKashButton">Submit</button>
            </form>
        </div>
    </div>
    <script src="../JS/paymentScript.js"></script>
</body>

</html>