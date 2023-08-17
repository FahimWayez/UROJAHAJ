<?php

require_once("databaseConnection.php");

function updateStatusToOffline($email)
{
    $conn = dbConnection();
    $status = "Offline Now";

    $sql = "UPDATE `urojahaj`.`admindetails` SET status = ? WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $status, $email);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

?>