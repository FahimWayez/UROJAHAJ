<?php
while ($profileDetails = mysqli_fetch_assoc($query)) {
    $sql2 = "SELECT * FROM `urojahaj`.`urochithi` 
            WHERE (receiverID = ? AND senderID = ?) OR (receiverID = ? AND senderID = ?) 
            ORDER BY messageID DESC LIMIT 1";
    $stmt2 = mysqli_prepare($conn, $sql2);
    mysqli_stmt_bind_param($stmt2, "ssss", $profileDetails['email'], $storedEmail, $storedEmail, $profileDetails['email']);
    mysqli_stmt_execute($stmt2);
    $query2 = mysqli_stmt_get_result($stmt2);

    if (mysqli_num_rows($query2) > 0) {
        $profileDetails2 = mysqli_fetch_assoc($query2);
        $messageContent = $profileDetails2['messageContent'];
        $you = ($profileDetails2['senderID'] === $storedEmail) ? "You: " : "";
    } else {
        $messageContent = "";
        $you = "";
    }

    $offline = ($profileDetails['status'] === "Active Now") ? "online" : "offline";
    ($storedEmail == $profileDetails['email']) ? $hid_me = "hide" : $hid_me = "";

    $output .= '<a href="../View/chat.php?adminID=' . $profileDetails['adminID'] . '">
                <div class="content">
                <img src="../profile_photos/' . $profileDetails['profilePhoto'] . '" alt="">
                <div class="details">
                    <span>' . $profileDetails['firstName'] . " " . $profileDetails['lastName'] . '</span>
                    <p>' . $you . $messageContent . '</p>
                </div>
                </div>
                <span class="status-dot ' . $offline . '"><i class="fa-solid fa-circle"></i></span>
            </a>';
}
?>