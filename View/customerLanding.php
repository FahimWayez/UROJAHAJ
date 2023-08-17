<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["customerAuthenticated"]) || $_SESSION["customerAuthenticated"] !== true) {
    header("location: landingPage.php");
    exit(); 
}

require_once("../Model/customerProfileModel.php");
require_once("../Controller/loginProcess.php");

$storedEmail = $_SESSION["email"];

$name = getName($storedEmail);
$milesCount = getMiles($storedEmail);

?>

<!-- <html>

<head>
    <title>Customer Landing</title>
    <link rel="stylesheet" href="../CSS/customerLandingStyle.css">
</head>


<body>
    <fieldset>
        
        <table width=100%>
            <tr>
                <td width=25%><a href="customerLanding.php">
                        <img src="images/logo2.png" width=200 height=200>
                    </a></td>
                <td align="center" width=50%>

                    <h1>Welcome to UROJAHAJ!</h1>
                </td>
                <td align="right">
                    <p>Hi, <?php //print_r($name);
                    echo $name['firstName']. " " .$name['lastName']."<br><br>";?></p>
                    <br><br>
                    <a href="../Controller/logout.php">
                        <img src="images/signout.png" height=30 width=30><br>Sign Out
                    </a>
                    <br><br><br>
                    <a href="notification.php">
                        <img src="images/noNotification.png" width=40 height=40>
                    </a>
                </td>
            </tr>
        </table>
    </fieldset>
    <fieldset>
        <table width=100% border=1>
            <tr>
                <td width=33% align="center"><br><br><a href="customerLanding.php">
                        <img src="images/adminDashboard.png" width=100 height=75>
                        <br>My Dashboard
                    </a></td>
                <td width=33% align="center"><br><br><a href="customerProfile.php">
                        <img src="images/adminProfile.png" width=100 height=75>
                        <br>My Profile
                    </a></td>
                <td width=33% align="center"><br><br>
                    <h2>Total Miles: <?php echo $milesCount["miles"];?> </h2>
                </td>
            </tr>
            <tr>
                <td width=33% align="center"><br><br><a href="flightBooking.php">
                        <img src="images/flightManagement.png" width=100 height=75>
                        <br>My Bookings
                    </a></td>
                <td width=33% align="center"><br><br><a href="feedbackForm.php">
                        <img src="images/feedbackManagement.png" width=100 height=75>
                        <br>Manage Feedbacks
                    </a></td>
                <td width=33% align="center"><br><br><a href="checkIn.php">
                        <img src="images/webCheckIn.png" width=100 height=75>
                        <br>Web Check In
                    </a></td>

            </tr>
            <tr>
                <td colspan="3" align="center"><br><br><a href="flightSearch.php">
                        <img src="images/searchFlight.png" width=100 height=75>
                        <br>Search Flight
                    </a></td>
            </tr>
        </table>
    </fieldset>
</body>

</html> -->


<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["customerAuthenticated"]) || $_SESSION["customerAuthenticated"] !== true) {
    header("location: landingPage.php");
    exit(); 
}
require_once("../Model/customerProfileModel.php");
require_once("../Controller/loginProcess.php");

$storedEmail = $_SESSION["email"];

$profileDetails = getProfile($storedEmail);
$profilePhoto = $profileDetails["profilePhoto"];
// $name = getName($storedEmail);
$name = $profileDetails["firstName"] . $profileDetails["lastName"];
$milesCount = getMiles($storedEmail);
?>

<html>

<head>
    <title>Customer</title>
    <link rel="stylesheet" href="../CSS/customerLandingStyles.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <input type="checkbox" id="navToggle">
    <div class="sidebar">
        <div class="sidebarBrand">
            <h1><span class="fa-solid fa-paper-plane"></span><span>UROJAHAJ</span></h1>
        </div>
        <div class="sidebarMenu">
            <ul>
                <li><a href="" class="active"><span class="fa-solid fa-gauge"></span>
                        <span>Dashboard</span></a>
                </li>
                <li><a href=""><span class="fa-solid fa-plane-departure"></span>
                        <span>My Bookings</span></a>
                </li>
                <li><a href=""><span class="fa-solid fa-square-check"></span>
                        <span>Web Check-In</span></a>
                </li>
                <li><a href="feedbackForm.php"><span class="fa-solid fa-comment-dots"></span>
                        <span>Feedback</span></a>
                </li>
                <li><a href="customerProfile.php"><span class="fa-solid fa-user-circle"></span>
                        <span>Profile</span></a>
                </li>
                <li class="logout"><a href="../Controller/logout.php"><span
                            class="fa-solid fa-right-from-bracket"></span>
                        <span>Logout</span></a>
                </li>

                <div class="time" id="currentDateTime"></div>
            </ul>
        </div>
    </div>

    <div class="mainContent">
        <header>
            <h2>
                <label for="navToggle">
                    <span class="fa-solid fa-bars"></span>
                </label>
                Dashboard
            </h2>

            <div class="miles">
                <span class="fa-solid fa-coins" style="color: #000000;"></span>
                <strong>Total available miles:</strong> <?php echo $profileDetails["miles"]; ?>
            </div>

            <div class="userWrapper">
                <?php if ($profilePhoto) { ?>
                <img src="../profile_photos/<?php echo $profilePhoto; ?>" width="50" height="50" alt="Profile Photo">
                <?php } else { ?>
                <img src="../profile_photos/default.jpeg" width="50" height="50" alt="Choose your Profile Photo">
                <?php } ?>
                <div>
                    <h4><?php 
                    echo $profileDetails['firstName']. " " .$profileDetails['lastName'];?></h4>
                    <small>Customer</small>
                </div>
            </div>
        </header>

        <main>
            <div class="searchFlight">
                <a href="flightSearch.php">Search Flight</a>

            </div>
            <footer class="footer">
                <div class="container">
                    <div class="row">
                        <div class="footerColumn">
                            <h4>UROJAHAJ</h4>
                            <ul>
                                <li><a href="aboutUs.html">About Us</a></li>
                                <li><a href="#">Press Release</a></li>
                                <li><a href="#">Environmental Sustainability</a></li>
                            </ul>
                        </div>
                        <div class="footerColumn">
                            <h4>Business Partners</h4>
                            <ul>
                                <li><a href="#">Trade Partners</a></li>
                            </ul>
                        </div>
                        <div class="footerColumn">
                            <h4>Help</h4>
                            <ul>
                                <li><a href="contactUs.php">Contact Us</a></li>
                                <li><a href="travelAlerts.php">Travel Alerts</a></li>
                                <li><a href="#">Legal</a></li>
                                <li><a href="policy.php">Privacy Policy</a></li>
                                <li><a href="terms.php">Terms and Condition</a></li>
                            </ul>
                        </div>
                        <div class="footerColumn">
                            <h4>Let's Stay Connected!</h4>
                            <div class="socialLinks">
                                <a href="https://www.facebook.com"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://www.twitter.com"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a>
                                <a href="https://www.linkedin.com"><i class="fab fa-linkedin-in"></i></a>
                                <a href="https://www.github.com"><i class="fab fa-github"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </main>
    </div>
    </div>


    <script src="../JS/time.js"></script>
</body>

</html>