<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["adminAuthenticated"]) || $_SESSION["adminAuthenticated"] !== true) {
    header("location: landingPage.php");
    exit(); 
}

require_once("../Model/adminProfileModel.php");
require("loginProcess.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["fName"];
    $lastName = $_POST["lName"];
    $dateOfBirth = $_POST["dob"];
    $countryOfResidence = $_POST["address"];
    $contactNumber = $_POST["contact"];

    $storedEmail = $_SESSION["email"];
    $updateResult = updateProfile($storedEmail, $firstName, $lastName, $dateOfBirth, $countryOfResidence, $contactNumber);

    if ($updateResult) {
    
        if (isset($_FILES["adminProfilePicture"]) && $_FILES["adminProfilePicture"]["error"] === UPLOAD_ERR_OK) {
            $photoTmpName = $_FILES["adminProfilePicture"]["tmp_name"];
            $photoName = $_FILES["adminProfilePicture"]["name"];
            $fileExtension = strtolower(getFileExtension($photoName));
            $allowedExtensions = array("png", "jpeg", "jpg");

            $isValidExtension = false;
            foreach ($allowedExtensions as $extension) {
                if ($extension === $fileExtension) {
                    $isValidExtension = true;
                    break;
                }
            }

            if (!$isValidExtension) {
                $errorMessage = "Invalid file type. Only PNG, JPEG, and JPG files are allowed.";
            } else {
                $photoPath = "../profile_photos/" . $photoName;

                
                if (move_uploaded_file($photoTmpName, $photoPath)) {
                
                    $updatePhotoResult = updateProfilePhoto($storedEmail, $photoName);

                    if (!$updatePhotoResult) {
                        $errorMessage = "Failed to update profile photo. Please try again.";
                    }
                } else {
                    $errorMessage = "Failed to upload profile photo. Please try again.";
                }
            }
        }

        header("location: ../View/adminProfile.php");
        exit();
    } else {
        $errorMessage = "Failed to update profile. Please try again.";
    }
}


$profileDetails = getProfile($storedEmail);
$storedEmail = $_SESSION["email"];
$firstName = $profileDetails["firstName"];
$lastName = $profileDetails["lastName"];
$dateOfBirth = $profileDetails["dateOfBirth"];
$contactNumber = $profileDetails["contactNumber"];
$address = $profileDetails["countryOfResidence"];

function getFileExtension($fileName)
{
    $dotPosition = strrpos($fileName, ".");
    if ($dotPosition === false) {
        return "";
    }
    return substr($fileName, $dotPosition + 1);
}
?>