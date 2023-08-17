<?php

require_once("databaseConnection.php");

function addFeedback($name, $customerID, $subject, $feedbackMessage)
{
    $conn = dbConnection();

    $feedbackSubmissionTime = date("Y-m-d H:i:s");

    $sql = "INSERT INTO `urojahaj`.`feedback` (`name`, `customerID`, `subject`, `feedbackMessage`, `feedbackSubmissionTime`) VALUES ('$name', '$customerID', '$subject', '$feedbackMessage', '$feedbackSubmissionTime')";

    if (mysqli_query($conn, $sql)) {
    return true;
    } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    return false;
}
}

function viewFeedback()
{
    $conn = dbConnection();
    $sqlView = "SELECT * FROM `urojahaj`.`feedback`";
    $result = mysqli_query($conn, $sqlView);

    $feedbackDetails = array();

    while($row = mysqli_fetch_array($result))
    {
        $feedbackDetails[] = $row;
    }
    
    return $feedbackDetails;
}

function updateAction($feedbackID, $action) {
    $conn = dbConnection();

    $sql = "UPDATE `feedback` SET `action` = '$action' WHERE `feedbackID` = '$feedbackID'";

    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        echo "Error updating action: " . mysqli_error($conn);
        return false;
    }
}

?>