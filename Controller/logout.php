<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


// Updating the status to "Offline Now" in the database
if (isset($_SESSION["email"])) {
    require_once("../Model/logoutModel.php");
    $email = $_SESSION["email"];
    updateStatusToOffline($email);
}

session_destroy();
setcookie('flag', 'true', time() - 10, '/');


header("location: ../View/landingPage.php");
?>