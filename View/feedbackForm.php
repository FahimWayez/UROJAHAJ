<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (!isset($_SESSION["customerAuthenticated"]) || $_SESSION["customerAuthenticated"] !== true) {
    header("location: landingPage.php");
    exit(); 
}
require_once("../Model/customerProfileModel.php");
require_once("../Controller/loginProcess.php");

$storedEmail = $_SESSION["email"];

$profileDetails = getProfile($storedEmail);
$customerID = $profileDetails["customerID"];

?>

<html>

<head>
    <title>Feedback Form</title>
    <link rel="stylesheet" href="../CSS/feedbackFormStyle.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="feedbackForm">
        <h3>Feedback Form</h3>
        <a href="customerLanding.php"><img class="logo" src="images/logo2.png" width="200" height="200" alt="Logo"></a>
        <form method="post" action="../Controller/feedbackProcess.php" name="feedbackForm">
            <input type="text" id="name" name="name" placeholder="Please enter your name"><br><br>
            <!-- <input type="text" id="customerID" name="customerID"
                placeholder="Please enter your customer ID"><br><br><br><br> -->
            <input type="hidden" id="customerID" name="customerID" , value="<?php echo $customerID ?> ">
            <input type="text" id="subject" name="subject" placeholder="Subject" size="50"><br><br>
            <textarea id="feedbackMessage" name="feedbackMessage" rows="10" cols="100"
                placeholder="Please submit here any of your recommendations, messages, or complaints about us"></textarea><br><br>
            <input type="submit" name="submitFeedback" id="submitFeedback" value="Submit">
        </form>
        <div class="buttonContainer">
            <a href="#"><button class="previousFeedbackButton"><i class="fa-solid fa-history"></i>See Previous
                    Feedbacks</button></a>
            <a href="customerLanding.php"><button class="goBackButton"><i class="fa-solid fa-backward"></i>Go
                    Back</button></a>
        </div>
    </div>

    <script src="../JS/feedbackFormScripts.js"></script>
</body>

</html>