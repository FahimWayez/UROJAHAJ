<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["adminAuthenticated"]) || $_SESSION["adminAuthenticated"] !== true) {
    header("location: landingPage.php");
    exit(); 
}
require_once("../Model/adminProfileModel.php");
require_once("../Controller/loginProcess.php");

$storedEmail = $_SESSION["email"];

$profileDetails = getProfile($storedEmail);
$profilePhoto = $profileDetails["profilePhoto"];
?>

<html>

<head>
    <title>Starting Page</title>
    <link rel="stylesheet" href="../CSS/usersStyle.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <section class="users">
            <header>
                <div class="content">
                    <?php if ($profilePhoto) { ?>
                    <img src="../profile_photos/<?php echo $profilePhoto; ?>" width="50" height="50"
                        alt="Profile Photo">
                    <?php } else { ?>
                    <img src="../profile_photos/default.jpeg" width="50" height="50" alt="Choose your Profile Photo">
                    <?php } ?>
                    <div class="details">
                        <span><?php echo $profileDetails['firstName']. " " .$profileDetails['lastName']; ?></span>
                        <p><?php echo $profileDetails['status']; ?></p>
                    </div>
                </div>
                <a href="adminLanding.php?>" class="backToHome">Back To Home</a>
            </header>
            <div class="search">
                <span class="text">Select an user to start chat</span>
                <input type="text" placeholder="Enter name to search...">
                <button><i class="fa-solid fa-search"></i></button>
            </div>
            <div class="usersList">
                <a href="../View/chat.php?adminID=<?php echo $profileDetails['adminID']; ?>">
            </div>
        </section>
    </div>
    <script src="../JS/usersScript.js"></script>

</body>

</html>