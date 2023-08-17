<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["customerAuthenticated"]) || $_SESSION["customerAuthenticated"] !== true) {
    header("location: landingPage.php");
    exit(); 
}
require_once("loginProcess.php");


if (isset($_POST["login"])) 
{
    if(!isset($_SESSION["flag"]))
    {
        header("location: ../View/landingPage.php");
    }
    else
    {
        $twoFACodeReader = $_POST["twoFACodeReader"];
        
        // $flag = 1;
        $storedCode = $_SESSION["code"];
        
        if (empty($twoFACodeReader)) {
            echo "You did not put a code. Please try again";
            $flag = 0;
        }
        else if($storedCode == $twoFACodeReader)
        {
            header("location: ../View/customerLanding.php");
        }
        else
        {
            echo "Code does not match. Please reenter your code.";
        }
    }
}
?>