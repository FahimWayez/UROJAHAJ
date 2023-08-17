<?php

require_once("../Model/flightManagementModel.php");

if (isset($_POST['search'])) {
    $flightID = $_POST['search'];

    $results = advancedSearchFlight($flightID);

    $data = array();
    while ($row = mysqli_fetch_assoc($results)) {
        $data[] = $row;
    }

    header('Content-Type: application/json');
    echo json_encode($data);
}

    
?>