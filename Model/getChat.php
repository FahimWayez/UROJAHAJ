<?php
require_once("databaseConnection.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['adminID']) && isset($_POST['receiverID'])) {
    $conn = dbConnection();
    $outgoing_id = $_SESSION['adminID'];
    $incoming_id = $_POST['receiverID'];

    $output = "";
    $sql = "SELECT urochithi.*, admindetails.profilePhoto FROM urochithi 
        LEFT JOIN admindetails ON admindetails.adminID = urochithi.senderID
        WHERE (senderID = ? AND receiverID = ?) OR (senderID = ? AND receiverID = ?) 
        ORDER BY messageID";

    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt) {
        echo "Error executing SQL query: " . mysqli_error($conn);
        exit;
    }
    mysqli_stmt_bind_param($stmt, "ssss", $outgoing_id, $incoming_id, $incoming_id, $outgoing_id);
    mysqli_stmt_execute($stmt);
    $query = mysqli_stmt_get_result($stmt);

   
if (mysqli_num_rows($query) > 0) {
    while ($profileDetails = mysqli_fetch_assoc($query)) {
        if ($profileDetails['senderID'] == $outgoing_id) { 
            $output .= '<div class="chat outgoingMessage">
                            <div class="details">
                                <p>' . $profileDetails['messageContent'] . '</p>
                            </div>
                        </div>';
        } else {
            $output .= '<div class="chat incomingMessage">
                            <img src="../profile_photos/' . $profileDetails['profilePhoto'] . '" alt="">
                            <div class="details">
                                <p>' . $profileDetails['messageContent'] . '</p>
                            </div>
                        </div>';
        }
    }
} else {
    $output .= '<div class="text">No messages are available. Once you send a message, it will appear here.</div>';
} 

echo $output;
} else {
    
}
?>