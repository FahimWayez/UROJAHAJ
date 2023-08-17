<?php

include('../Model/feedbackModel.php'); // Include the feedback model

$feedbackID = $_GET['feedbackID'];
$action = $_GET['action'];

// Update action in the database
$status = updateAction($feedbackID, $action);

if ($status) {
    echo "Action updated successfully.";
} else {
    echo "Failed to update action.";
}

?>