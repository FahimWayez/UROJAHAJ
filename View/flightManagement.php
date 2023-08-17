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
// require_once("../Controller/flightManagementProcess.php");

// $storedFlightID = $_SESSION['flightID'];
?>

<html>

<head>
    <title>Flight Management</title>
    <link rel="stylesheet" href="../CSS/flightManagementStyle.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>

    <form align="center" method="post" action="../Controller/flightManagementProcess.php">
        <a href=adminLanding.php>
            <img src="images/logo2.png" width=200 height=200>
        </a>
        <legend align="center">
            <h3>Manage Flights</h3>
        </legend>
        <table align="center" width=80% border=0>
            <tr>
                <td width=25% align="center"><input type="text" class="flightID" name="flightID" id="flightID"
                        placeholder="Flight ID" size=20></td>
                <td width=25% align="center"><select name="flightType">
                        <option disabled selected>Fleet</option>
                        <option>Airbus A350-1000</option>
                        <option>Airbus A380-800</option>
                        <option>Boeing 777-200LR</option>
                        <option>Boeing 777-300ER</option>
                        <option>Boeing 787-8</option>
                        <option>Boeing 787-9</option>
                        <option>Boeing 787-10</option>
                    </select></td>
                <td width=25% align="center"><input type="text" class="economyClassSeatsCapacity"
                        id="economyClassSeatsCapacity" name="economyClassSeatsCapacity"
                        placeholder="Economy seat capacity"></td>
                <td width=25% align="center"><input type="text" class="economyClassSeatsFare" id="economyClassSeatsFare"
                        name="economyClassSeatsFare" placeholder="Economy seat fare">
                </td>
            </tr>
            <tr>
                <td align="center"><br><?php
                    if ($routeDetails) {
                        echo "<Select name = 'routeID'>";
                        echo "<option disabled selected>Route ID</option>";

                        while($row = mysqli_fetch_assoc($routeDetails))
                        {
                            echo "<option value = '" . $row['routeID'] . "'>" . $row['routeID'] . "</option>";
                        }
                        echo "</select>";

                    }
                    else
                    {
                        echo "DB Error";
                    }
                    ?></td>
                <td></td>

                <td width=25% align="center"><br><input type="text" class="businessClassSeatsCapacity"
                        id="businessClassSeatsCapacity" name="businessClassSeatsCapacity"
                        placeholder="Business seat capacity"></td>
                <td width=25% align="center"><br><input type="text" class="businessClassSeatsFare"
                        id="businessClassSeatsFare" name="businessClassSeatsFare" placeholder="Business seat fare">
                </td>
            </tr>
        </table>
        <table align="center" width=100% border=0>
            <tr>
                <td width=100% align="center"><br><br><br><input type="submit" class="addFlight" id="addFlight"
                        name="addFlight" value="Add Flight"></td>
                <td align="center"><br><br><br><a href="advancedFlightManagement.php">Advanced Option</a></td>

            </tr>
        </table>
    </form>


    <fieldset align="center">
        <legend align="center">
            <h3>Flight Details</h3>
        </legend>
        <table width=100% border=1>
            <tr>
                <th>Flight ID</th>
                <th>Fleet</th>
                <th>Economy Class Seats</th>
                <th>Economy Class Seats Fare</th>
                <th>Business Class Seats</th>
                <th>Business Class Seats Fare</th>
                <th>Route ID</th>
            </tr>
            <?php foreach ($flightDetails as $flight): ?>
            <tr>
                <td align="center"><?php echo $flight['flightID']?></td>
                <td align="center"><?php echo $flight['fleet']?></td>
                <td align="center"><?php echo $flight['economyClassSeatsCapacity']?></td>
                <td align="center"><?php echo $flight['economyClassSeatsFare']?></td>
                <td align="center"><?php echo $flight['businessClassSeatsCapacity']?></td>
                <td align="center"><?php echo $flight['businessClassSeatsFare']?></td>
                <td align="center">
                    <?php echo $flight['routeID']."<br><a href = 'advancedRouteManagement.php'>See route details";?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </fieldset>
</body>

</html>