<?php

require_once("databaseConnection.php");

function validateBankPaymentData($customerID, $cardNumber, $cardExpiryDate, $cvc, $cardHolderName)
{
    $conn = dbConnection();
    $sql = "SELECT * FROM `urojahaj`.`payment` WHERE `customerID` = '{$customerID}' AND `cardNumber` = '{$cardNumber}' AND `cardExpiryDate` = '{$cardExpiryDate}' AND `cvc` = '{$cvc}' AND `cardHolderName` = '{$cardHolderName}'";    
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        if (empty($cardNumber) || empty($cardExpiryDate) || empty($cvc) || empty($cardHolderName)) {
            echo "One or more bank payment fields are empty!";
            return false;
        } else if (!validateCustomerID($customerID)) {
            echo "Invalid customerID for bank payment!";
            return false;
        } else {
            return true;
        }
    }
}

function validateBkashPaymentData($customerID, $bKashNumber, $bKashPin)
{

    $conn = dbConnection();
    $sql = "SELECT * FROM `urojahaj`.`payment` WHERE `customerID` = '{$customerID}' AND `bKashNumber` = '{$bKashNumber}' AND `bKashPin` = '{$bKashPin}'";    
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if($count == 1){

    if (empty($bKashNumber) || empty($bKashPin)) {
    echo "One or more bKash payment fields are empty!";
    return false;
    }
    else if (!validateCustomerID($customerID)) {
        echo "Invalid customerID for bKash payment!";
        return false;
    }
    else{  
        return true;
    }
    }
}

function validateCustomerID($customerID)
{
    $conn = dbConnection();
    $sql = "SELECT customerID FROM payment WHERE customerID = '{$customerID}'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    
    return ($count == 1);
}

?>