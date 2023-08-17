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
require_once("../Model/adminLandingModel.php");

$storedEmail = $_SESSION["email"];

$flightCount = flightCount();
$routeCount = routeCount();
$customerCount = customerCount();
$employeeCount = employeeCount();

$profileDetails = getProfile($storedEmail);
$profilePhoto = $profileDetails["profilePhoto"];
?>


<html>

<head>
    <title>Admin</title>
    <link rel="stylesheet" href="../CSS/adminLandingStyles.css">
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
                <li><a href="flightManagement.php"><span class="fa-solid fa-plane-departure"></span>
                        <span>Flights</span></a>
                </li>
                <li><a href="routeManagement.php"><span class="fa-solid fa-route"></span>
                        <span>Routes</span></a>
                </li>
                <li><a href="employeeManagement.php"><span class="fa-solid fa-clipboard-user"></span>
                        <span>Employees</span></a>
                </li>
                <li><a href="customerManagement.php"><span class="fa-solid fa-users"></span>
                        <span>Customers</span></a>
                </li>
                <li><a href="users.php"><span class="fa-solid fa-envelope"></span>
                        <span>UroChithi</span></a>
                </li>
                <li><a href="feedbackManagement.php"><span class="fa-solid fa-comment-dots"></span>
                        <span>Feedback</span></a>
                </li>
                <li><a href="adminProfile.php"><span class="fa-solid fa-user-circle"></span>
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

            <div class="searchWrapper">
                <span class="fa-solid fa-search"></span>
                <input type="search" placeholder="Search Here" />
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
                    <small>Admin</small>
                </div>
            </div>
        </header>
        <main>
            <div class="cards">
                <div class="cardSingle">
                    <div>
                        <h1><?php echo $flightCount ?></h1>
                        <span>Fleets</span>
                    </div>
                    <div>
                        <span class="fa-solid fa-plane"></span>
                    </div>
                </div>
                <div class="cardSingle">
                    <div>
                        <h1><?php echo $routeCount ?></h1>
                        <span>Routes</span>
                    </div>
                    <div>
                        <span class="fa-solid fa-route"></span>
                    </div>
                </div>
                <div class="cardSingle">
                    <div>
                        <h1><?php echo $employeeCount ?></h1>
                        <span>Employee</span>
                    </div>
                    <div>
                        <span class="fa-solid fa-clipboard-user"></span>
                    </div>
                </div>
                <div class="cardSingle">
                    <div>
                        <h1><?php echo $customerCount ?></h1>
                        <span>Customers</span>
                    </div>
                    <div>
                        <span class="fa-solid fa-users"></span>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="../JS/time.js"></script>
</body>

</html>