<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["adminAuthenticated"]) || $_SESSION["adminAuthenticated"] !== true) {
    header("location: landingPage.php");
    exit(); 
}
require_once("../Model/flightManagementModel.php");
$flightDetails = viewFlight();
$routeDetails = viewFRoute();

if(isset($_POST['flightID'])) {
    $flightID = $_POST['flightID'];
    $flightType = $_POST['flightType'];
    $economyClassSeatsCapacity = $_POST['economyClassSeatsCapacity'];
    $economyClassSeatsFare = $_POST['economyClassSeatsFare'];
    $businessClassSeatsCapacity = $_POST['businessClassSeatsCapacity'];
    $businessClassSeatsFare = $_POST['businessClassSeatsFare'];
    $routeID = $_POST['routeID'];
} else {

    exit("Invalid request");
}
?>


<html>
<!--Search flight add kora lagbe delete korar jonno-->

<head>
    <title>Flight Management</title>
    <link rel="stylesheet" href="../CSS/flightManagementStyle.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <form align="center" method="post" action="../Controller/flightUpdateProcess.php">
        <a href=adminLanding.php>
            <img src="images/logo2.png" width=200 height=200>
        </a>
        <fieldset>
            <legend align="center">
                <h3>Update Flights</h3>
            </legend>
            <table align="center" width=80% border=0>
                <tr>
                    <td width=25% align="center"><input type="text" class="flightID" name="flightID" id="flightID"
                            placeholder="Flight ID" size=20 value="<?php echo $flightID ?>"></td>
                    <td width=25% align="center"><select name="flightType">
                            <option disabled selected>Fleet</option>
                            <option <?php if($flightType == 'Airbus A350-1000') echo 'selected'; ?>>Airbus A350-1000
                            </option>
                            <option <?php if($flightType == 'Airbus A380-800') echo 'selected'; ?>>Airbus A380-800
                            </option>
                            <option <?php if($flightType == 'Boeing 777-200LR') echo 'selected'; ?>>Boeing 777-200LR
                            </option>
                            <option <?php if($flightType == 'Boeing 777-300ER') echo 'selected'; ?>>Boeing 777-300ER
                            </option>
                            <option <?php if($flightType == 'Boeing 787-8') echo 'selected'; ?>>Boeing 787-8</option>
                            <option <?php if($flightType == 'Boeing 787-9') echo 'selected'; ?>>Boeing 787-9</option>
                            <option <?php if($flightType == 'Boeing 787-10') echo 'selected'; ?>>Boeing 787-10</option>
                        </select></td>
                    <td width=25% align="center"><input type="text" class="economyClassSeatsCapacity"
                            id="economyClassSeatsCapacity" name="economyClassSeatsCapacity"
                            placeholder="Economy seat capacity" value="<?php echo $economyClassSeatsCapacity ?>"></td>
                    <td width=25% align="center"><input type="text" class="economyClassSeatsFare"
                            id="economyClassSeatsFare" name="economyClassSeatsFare" placeholder="Economy seat fare"
                            value="<?php echo $economyClassSeatsFare ?>"></td>
                </tr>
                <tr>
                    <td align="center">
                        <br>
                        <?php
                        if ($routeDetails) {
                            echo "<Select name='routeID'>";
                            echo "<option disabled selected>Route ID</option>";

                            while($row = mysqli_fetch_assoc($routeDetails)) {
                                $selected = ($row['routeID'] == $routeID) ? 'selected' : '';
                                echo "<option value='" . $row['routeID'] . "' $selected>" . $row['routeID'] . "</option>";
                            }
                            echo "</select>";
                        } else {
                            echo "DB Error";
                        }
                        ?>
                    </td>
                    <td></td>

                    <td width=25% align="center"><br><input type="text" class="businessClassSeatsCapacity"
                            id="businessClassSeatsCapacity" name="businessClassSeatsCapacity"
                            placeholder="Business seat capacity" value="<?php echo $businessClassSeatsCapacity ?>"></td>
                    <td width=25% align="center"><br><input type="text" class="businessClassSeatsFare"
                            id="businessClassSeatsFare" name="businessClassSeatsFare" placeholder="Business seat fare"
                            value="<?php echo $businessClassSeatsFare ?>"></td>
                </tr>
            </table>
            <table align="center" width=100% border=0>
                <tr>
                    <td width=100% align="center">
                        <br><br><br>
                        <input type="submit" class="updateFlight" id="updateFlight" name="updateFlight"
                            value="Update Flight">
                    </td>
                    <td align="center"><br><br><br><a href="advancedFlightManagement.php">Back to Flight Management</a>
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
</body>

</html>