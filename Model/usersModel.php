<?php

    if (session_status() === PHP_SESSION_NONE) {
    session_start();
    }

    require_once("databaseConnection.php");
    require_once("loginModel.php");

    // $_SESSION["email"] = $storedEmail;
    // $storedEmail = $_SESSION["email"];
    
    $storedEmail = $_SESSION["email"];

$conn = dbConnection();
$sql = "SELECT * FROM `urojahaj`.`admindetails` WHERE email <> ? ORDER BY adminID DESC";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $storedEmail);
mysqli_stmt_execute($stmt);
$query = mysqli_stmt_get_result($stmt);

$output = "";
if (mysqli_num_rows($query) == 0) {
    $output .= "No users are available to chat";
} elseif (mysqli_num_rows($query) > 0) {
    include_once "data.php";
}
echo $output;
?>