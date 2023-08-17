<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once("databaseConnection.php");
require_once("loginModel.php");

if (isset($_SESSION['email'])) {
    $storedEmail = $_SESSION['email'];
} else {
    // Handle the case when the email is not set in the session
    echo "Session email not set.";
    exit();
}

$conn = dbConnection();
$searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
$sql = "SELECT * FROM `urojahaj`.`admindetails` WHERE email <> ? AND (firstName LIKE ? OR lastName LIKE ?)";
$stmt = mysqli_prepare($conn, $sql);
$likeParam = "%{$searchTerm}%";
mysqli_stmt_bind_param($stmt, "sss", $storedEmail, $likeParam, $likeParam);
mysqli_stmt_execute($stmt);
$query = mysqli_stmt_get_result($stmt);

$output = "";
if (mysqli_num_rows($query) > 0) {
    include_once "data.php";
} else {
    $output .= 'No user found related to your search term';
}
echo $output;
?>