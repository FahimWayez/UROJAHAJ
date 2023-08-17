<?php
    require_once("databaseConnection.php");
    function searchCustomer($customerID)
    {
    $conn = dbConnection();
    $sql4 = "SELECT * from `urojahaj`.`customerdetails` where customerID = '{$customerID}'";
    $result4 = mysqli_query($conn, $sql4);
    
    return $result4;
    }




function getProfile($email)
{
$conn = dbConnection();
$sql = "SELECT * from `urojahaj`.`customerdetails` where email = '{$email}'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

return $row;
}

function getPaymentDetails($customerID) {
$conn = dbConnection();
$sql = "SELECT * FROM `urojahaj`.`payment` WHERE customerID = '{$customerID}'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
$row = mysqli_fetch_assoc($result);
return $row;
} else {
return null; // Return null if no payment details found
}
}

function getName($email)
{
$conn = dbConnection();
$sql2 = "SELECT `firstName`, `lastName` from `urojahaj`.`customerdetails` where email = '{$email}'";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_array($result2);

return $row2;
}
function getMiles($email)
{
$conn = dbConnection();
$sql3 = "SELECT `miles`, `lastName` from `urojahaj`.`customerdetails` where email = '{$email}'";
$result3 = mysqli_query($conn, $sql3);
$row3 = mysqli_fetch_array($result3);

return $row3;
}


function updateCustomerDetails($customerID, $paymentID, $title, $firstName, $lastName, $dob, $address, $contactNumber,
$nationality, $passportNumber, $passportExpiryDate, $nationalIDNumber, $favoriteHolidayPreference, $favoriteDestination,
$favoriteAirport, $preferredSeat) {
$conn = dbConnection();
$sql5 = "UPDATE `urojahaj`.`customerdetails` SET `paymentID` = '{$paymentID}', `title` = '{$title}', `firstName` =
'{$firstName}', `lastName` = '{$lastName}', `dateOfBirth` = '{$dob}', `countryOfResidence` = '{$address}',
`contactNumber` = '{$contactNumber}', `nationality` = '{$nationality}', `passportNumber` = '{$passportNumber}',
`passportExpiryDate` = '{$passportExpiryDate}', `nationalIDNumber` = '{$nationalIDNumber}', `favoriteHolidayPreference`
= '{$favoriteHolidayPreference}', `favoriteDestination` = '{$favoriteDestination}', `favoriteAirport` =
'{$favoriteAirport}', `preferredSeat` = '{$preferredSeat}' WHERE `customerID` = '{$customerID}'";
mysqli_query($conn, $sql5);
}

function addPaymentDetails($customerID)
{
$conn = dbConnection();
$sql7 = "INSERT INTO `urojahaj`.`payment`(`customerID`) VALUES ('$customerID')";
return mysqli_query($conn, $sql7) ? true : false;
}

function updatePaymentDetails($paymentID, $paymentType, $cardNumber, $cardExpiryDate, $cvc, $cardHolderName,
$bkashNumber, $bkashPin, $nagadNumber, $nagadPin, $rocketNumber, $rocketPin)
{
$conn = dbConnection();
$sql6 = "UPDATE `urojahaj`.`payment` SET `paymentType` = '{$paymentType}', `cardNumber` = '{$cardNumber}',
`cardExpiryDate` = '{$cardExpiryDate}', `cvc` = '{$cvc}', `cardHolderName` = '{$cardHolderName}', `bkashNumber` =
'{$bkashNumber}', `bkashPin` = '{$bkashPin}', `nagadNumber` = '{$nagadNumber}', `nagadPin` = '{$nagadPin}',
`rocketNumber` = '{$rocketNumber}', `rocketPin` = '{$rocketPin}' WHERE `paymentID` = '{$paymentID}'";
mysqli_query($conn, $sql6);
}

function updateProfilePhoto($email, $profilePhoto)
{
$conn = dbConnection();
$sql8 = "UPDATE `urojahaj`.`customerdetails` SET `profilePhoto` = '$profilePhoto' WHERE `email` = '$email'";
return mysqli_query($conn, $sql8);
}


?>