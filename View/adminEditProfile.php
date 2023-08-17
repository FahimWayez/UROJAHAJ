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
$firstName = $profileDetails["firstName"];
$lastName = $profileDetails["lastName"];
$dateOfBirth = $profileDetails["dateOfBirth"];
$address = $profileDetails["countryOfResidence"];
$contactNumber = $profileDetails["contactNumber"];

?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Edit Profile</title>
    <link rel="stylesheet" href="../CSS/adminEditProfileStyle.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <form align="center" method="post" enctype="multipart/form-data" action="../Controller/adminEditProfileProcess.php">
        <div class="header">
            <img class="profilePhoto"
                src="../profile_photos/<?php echo $profilePhoto ? $profilePhoto : 'default.jpeg'; ?>"
                alt="Profile Photo">
            <h2><?php echo $profileDetails["firstName"] . " " . $profileDetails["lastName"]; ?>
            </h2>
        </div>
        <div class="formGroup">
            <label for="adminProfilePicture">Profile Photo</label>
            <input type="file" class="adminProfilePicture" name="adminProfilePicture" id="adminProfilePicture">
            <?php if (!$profilePhoto) { ?>
            <span class="defaultProfilePhoto">No profile photo uploaded</span>
            <?php } ?>
        </div>
        <div class="formGroup">
            <input required="required" type="text" class="firstName" name="fName" id="fName"
                value="<?php echo $profileDetails["firstName"]?>" />
            <span>First Name</span>
        </div>
        <div class="formGroup">
            <input required="required" type="text" class="lastName" name="lName" id="lName"
                value="<?php echo $profileDetails["lastName"] ?>" />
            <span>Last Name</span>
        </div>
        <div class="formGroup">
            <input required="required" type="date" class="dob" name="dob" id="dob" title="Date of Birth"
                value="<?php echo $profileDetails["dateOfBirth"] ?>">
            <span>Date Of Birth</span>
        </div>
        <div class="formGroup">
            <input required="required" type="text" class="address" name="address" id="address"
                value="<?php echo $profileDetails["countryOfResidence"]  ?>" />
            <span>Home Address</span>
        </div>
        <div class="formGroup">
            <input required="required" type="tel" class="contact" name="contact" id="contact"
                value="<?php echo $profileDetails["contactNumber"]  ?>" pattern="+880[0-9]{10}">
            <span>Contact Number</span>
        </div>
        <div class="separator"></div>
        <div class="formButton">
            <button type="submit" class="adminEditProfileButton" id="adminEditProfileButton"
                name="adminEditProfileButton">Update Profile</button>
            <a href="adminProfile.php">
                <i class="fa-solid fa-backward"></i>
                Go Back
            </a>
        </div>
    </form>
</body>

</html>