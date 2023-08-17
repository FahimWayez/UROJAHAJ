<?php

require_once("../Model/customerProfileModel.php");

if (isset($_POST['search'])) {
    $customerID = $_POST['search'];

    $results = searchCustomer($customerID);

    $data = array();
    while ($row = mysqli_fetch_assoc($results)) {
        $data[] = $row;
    }

    header('Content-Type: application/json');
    echo json_encode($data);
}

    
?>