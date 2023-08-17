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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <link rel="stylesheet" href="../CSS/adminProfileStyle.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="header">
            <img class="profilePhoto"
                src="../profile_photos/<?php echo $profilePhoto ? $profilePhoto : 'default.jpeg'; ?>"
                alt="Profile Photo">
            <h2><?php echo $profileDetails["firstName"] . " " . $profileDetails["lastName"]; ?>
            </h2>
        </div>
        <div class="profileDetails">
            <p><strong>Born:</strong> <?php echo $profileDetails["dateOfBirth"]; ?></p>
            <p><strong>Email:</strong> <?php echo $profileDetails["email"]; ?></p>
            <p><strong>Contact:</strong> <?php echo $profileDetails["contactNumber"]; ?></p>
        </div>
        <div class="editProfile">
            <form action="adminEditProfile.php" method="post">
                <input type="hidden" name="fName" value="<?php echo $profileDetails['firstName']; ?>">
                <input type="hidden" name="lName" value="<?php echo $profileDetails['lastName']; ?>">
                <input type="hidden" name="dob" value="<?php echo $profileDetails['dateOfBirth']; ?>">
                <input type="hidden" name="address" value="<?php echo $profileDetails['countryOfResidence']; ?>">
                <input type="hidden" name="contact" value="<?php echo $profileDetails['contactNumber']; ?>">
                <button type="submit">
                    <i class="fa-solid fa-pen-to-square"></i>
                    Edit Profile
                </button>
            </form>
        </div>
        <div class="separator"></div>
        <h4 class="sectionTitle">Contact Details</h4>
        <p><strong>Home Address:</strong> <?php echo $profileDetails["countryOfResidence"]; ?></p>
        <div class="separator"></div>
        <h4 class="sectionTitle">Official Details</h4>
        <p><strong>Admin ID:</strong> <?php echo $profileDetails["adminID"]; ?></p>
        <div class="separator"></div>
        <div class="downloadCard">
            <form method="post" action="../Controller/downloadAdminCardProcess.php">
                <button type="submit" name="downloadCard">
                    <i class="fa-solid fa-download"></i>
                    Download Card
                </button>
            </form>
        </div>
        <div class="goBackButton">
            <a href="adminLanding.php">
                <i class="fa-solid fa-backward"></i>
                Go Back
            </a>
        </div>
    </div>

</body>

</html>