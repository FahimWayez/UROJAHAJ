<?php

require_once("../Model/routeManagementModel.php");

if (isset($_POST['search'])) {
    $routeID = $_POST['search'];

    $results = advancedSearchRoute($routeID);

    $data = array();
    while ($row = mysqli_fetch_assoc($results)) {
        $data[] = $row;
    }

    header('Content-Type: application/json');
    echo json_encode($data);
}

    
?>