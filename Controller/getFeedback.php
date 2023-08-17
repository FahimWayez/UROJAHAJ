<?php

require_once('../Model/feedbackModel.php'); // Include the feedback model

// Call the function to fetch feedback data
$feedbackData = viewFeedback();

// Check if the data retrieval was successful
if ($feedbackData !== false) {
    header('Content-Type: application/json');
    echo json_encode($feedbackData);
} else {
    // Handle error, maybe return an error response or log the issue
    echo "Failed to retrieve feedback data.";
}

?>