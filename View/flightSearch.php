<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once("../Controller/loginProcess.php");

if (isset($_POST['searchFlight'])) {
    $boardingPoint = $_POST['boardingPoint'];
    $destinationPoint = $_POST['destinationPoint'];
    $tripType = $_POST['tripType'];
    $dSchedule = $_POST['dSchedule'];
    $rDSchedule = $_POST['rDSchedule'];

    require_once("../Model/flightSearchModel.php");

    $routeDetails = searchRoute($boardingPoint, $destinationPoint, $tripType, $dSchedule, $rDSchedule);
    $flightDetails = searchFlight($routeDetails);
}
?>
<html>

<head>
    <title>Flight Search</title>
    <link rel="stylesheet" href="../CSS/flightSearchStyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <form align="center" method="post" action="flightSearch.php" name="flightSearchForm">
        <img src="images/logo2.png" width=200 height=200>
        <fieldset>
            <legend>
                <h2>Search Flight</h2>
            </legend>
            <table width=70% align="center">
                <tr>
                    <td width=14%><input type="text" class="boardingPoint" name="boardingPoint" id="boardingPoint"
                            placeholder="From" size=20>
                    </td>
                    <td width=14%><input type="text" class="destinationPoint" name="destinationPoint"
                            id="destinationPoint" placeholder="To" size=20></td>
                    <td width=14%><select name="tripType">
                            <option align="center" disabled selected>Trip type</option>
                            <option>One way</option>
                            <option>Return</option>
                        </select></td>
                    <td width=14%>Departure: <input type="date" class="dSchedule" id="dSchedule" name="dSchedule"></td>
                    <td width=14%>Return: <input type="date" class="rDSchedule" id="rDSchedule" name="rDSchedule"></td>
                </tr>
                <tr>
                    <td align="center" colspan="5"><br><br><input type="submit" class="searchFlight" id="searchFlight"
                            name="searchFlight" value="Search Flight">
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
    <?php
        if (!isset($_SESSION["customerAuthenticated"]) || $_SESSION["customerAuthenticated"] !== true) { ?>
    <a href="landingPage.php"><button class="goBackButton"><i class="fa-solid fa-backward"></i>Go
            Back</button></a>
    <?php }  else {?>
    <a href="customerLanding.php"><button class="goBackButton"><i class="fa-solid fa-backward"></i>Go
            Back</button></a></td>
    <?php } ?>
    <br><br><br><br>
    <fieldset>
        <legend align="center">
            <h3>Route Details</h3>
        </legend>
        <?php
        if (isset($routeDetails) && !empty($routeDetails)) { ?>
        <table width="100%" border="1">
            <tr>
                <th>Route ID</th>
                <th>Boarding Point</th>
                <th>Boarding Airport</th>
                <th>Destination Point</th>
                <th>Destination Airport</th>
                <th>Trip Type</th>
                <th>Schedule</th>
                <th>Time Schedule</th>
                <th>Return Schedule</th>
                <th>Return Time Schedule</th>
            </tr>
            <?php
                //Already display hoile ar display korabena
                $displayedRoutes = array();
                foreach ($routeDetails as $route) {
                    if (!in_array($route['routeID'], $displayedRoutes)) {
                        $displayedRoutes[] = $route['routeID'];
                        ?>
            <tr>
                <td align="center"><?php echo $route['routeID']; ?></td>
                <td align="center"><?php echo $route['boardingPoint']; ?></td>
                <td align="center"><?php echo $route['boardingAirport']; ?></td>
                <td align="center"><?php echo $route['destinationPoint']; ?></td>
                <td align="center"><?php echo $route['destinationAirport']; ?></td>
                <td align="center"><?php echo $route['tripType']; ?></td>
                <td align="center"><?php echo $route['dSchedule']; ?></td>
                <td align="center"><?php echo $route['tSchedule']; ?></td>
                <td align="center"><?php echo $route['rDSchedule']; ?></td>
                <td align="center"><?php echo $route['rTSchedule']; ?></td>
            </tr>
            <?php
                    }
                }
            ?>
        </table>
        <?php } else { ?>
        <h3 align="center">No routes matched</h3>
        <?php } ?>
    </fieldset>

    <br><br><br><br>
    <?php
if (isset($flightDetails) && !empty($flightDetails)) {
?>
    <fieldset>
        <legend align="center">
            <h3>Flight Details</h3>
        </legend>
        <table width="100%" border="1">
            <tr>
                <th>Flight ID</th>
                <th>Fleet</th>
                <th>Economy Class Seats</th>
                <th>Economy Class Seats Fare</th>
                <th>Business Class Seats</th>
                <th>Business Class Seats Fare</th>
                <th>Action</th>
            </tr>
            <?php
            foreach ($flightDetails as $flight) {
            ?>
            <tr>
                <td align="center"><?php echo $flight['flightID']; ?></td>
                <td align="center"><?php echo $flight['fleet']; ?></td>
                <td align="center"><?php echo $flight['economyClassSeatsCapacity']; ?></td>
                <td align="center"><?php echo $flight['economyClassSeatsFare']; ?></td>
                <td align="center"><?php echo $flight['businessClassSeatsCapacity']; ?></td>
                <td align="center"><?php echo $flight['businessClassSeatsFare']; ?></td>
                <td align="center">
                    <?php
                        if (!isset($_SESSION["customerAuthenticated"]) || $_SESSION["customerAuthenticated"] !== true) {
                            echo '<a href="landingPage.php">Login to proceed</a>';
                        } else {
                            echo '<a href="flightBooking.php?flightID=' . $flight['flightID'] . '">Proceed to book</a>';
                        }
                        ?>
                </td>
            </tr>
            <?php
            }
            ?>
        </table>
    </fieldset>
    <?php
} else {
?>
    <h3 align="center">No flights found</h3>
    <?php
}
?>
</body>

</html>