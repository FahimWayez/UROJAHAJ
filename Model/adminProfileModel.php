    <?php
    require_once("databaseConnection.php");
    function getProfile($email)
    {
        $conn = dbConnection();
        $sql = "SELECT * from `urojahaj`.`admindetails` where email = '{$email}'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        
        return $row;
    }
    function updateProfile($email, $firstName, $lastName, $dateOfBirth, $countryOfResidence, $contactNumber)
    {
        $conn = dbConnection();
        $sql3 = "UPDATE `urojahaj`.`admindetails` SET `firstName`='$firstName',`lastName`='$lastName',`dateOfBirth`='$dateOfBirth',`countryOfResidence`='$countryOfResidence',`contactNumber`='$contactNumber' WHERE `email` = '$email'";
        $result3 = mysqli_query($conn, $sql3);
        return $result3;
    }
    function updateProfilePhoto($email, $profilePhoto)
    {
        $conn = dbConnection();
        $sql = "UPDATE `urojahaj`.`admindetails` SET `profilePhoto` = '$profilePhoto' WHERE `email` = '$email'";
        return mysqli_query($conn, $sql);
    }
    
?>