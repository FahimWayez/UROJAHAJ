<?php

function viewStatus()
{
    $conn = dbConnection();
    $sqlView = "SELECT * FROM `urojahaj`.`flightstatus`";
    $result = mysqli_query($conn, $sqlView);

    $statusDetails = array();

    while($row = mysqli_fetch_array($result))
    {
        $statusDetails[] = $row;
    }
    
    return $statusDetails;
}

?>