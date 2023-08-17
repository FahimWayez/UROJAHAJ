<?php 
require_once("databaseConnection.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['adminID']) && isset($_POST['receiverID']) && isset($_POST['message'])) {
    $conn = dbConnection();
    $outgoing_id = $_SESSION['adminID'];
    $incoming_id = $_POST['receiverID'];
    $messageContent = $_POST['message'];

    if (!empty($messageContent)) {
        $sql = "INSERT INTO urochithi (receiverID, senderID, messageContent) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $incoming_id, $outgoing_id, $messageContent);
        mysqli_stmt_execute($stmt);
    }
}
?>