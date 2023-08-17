<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (!isset($_SESSION["customerAuthenticated"]) || $_SESSION["customerAuthenticated"] !== true) {
    header("location: landingPage.php");
    exit(); 
}

require_once("../Model/feedbackModel.php");

$flag = 1;

if (isset($_POST['submitFeedback'])) {
    $name = $_POST['name'];
    $customerID = $_POST['customerID'];
    $subject = $_POST['subject'];
    $feedbackMessage = $_POST['feedbackMessage'];

    if (empty($name)) {
        echo "Please provide your name<br><br>";
        $flag = 0;
    }
    if (empty($customerID)) {
        echo "Please provide your customer ID<br><br>";
        $flag = 0;
    }
    if (empty($subject)) {
        echo "Please provide a subject<br><br>";
        $flag = 0;
    }
    if (empty($feedbackMessage)) {
        echo "Your message cannot be empty<br><br>";
        $flag = 0;
    }


    if($flag == 1)
    {
        $status = addFeedback($name, $customerID, $subject, $feedbackMessage);
        if ($status) {
            header("location: ../View/customerLanding.php");
        }
        else{
            echo "asas";
        }
    }
}
?>