<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["adminAuthenticated"]) || $_SESSION["adminAuthenticated"] !== true) {
    header("location: landingPage.php");
    exit(); 
}

require_once("../Model/routeManagementModel.php");

if(isset($_POST['routeID'])) {
    $routeID = $_POST['routeID'];
    $boardingPoint = $_POST['boardingPoint'];
    $boardingAirport = $_POST['boardingAirport'];
    $destinationPoint = $_POST['destinationPoint'];
    $destinationAirport = $_POST['destinationAirport'];
    $tripType = $_POST['tripType'];
    $dSchedule = $_POST['dSchedule'];
    $tSchedule = $_POST['tSchedule'];
    $rDSchedule = $_POST['rDSchedule'];
    $rTSchedule = $_POST['rTSchedule'];
} else {
    exit("Invalid request");
}
?>

<html>

<head>
    <title>Route Management</title>
    <link rel="stylesheet" href="../CSS/routeManagementStyle.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <form align="center" method="post" action="../Controller/routeUpdateProcess.php">
        <a href=adminLanding.php>
            <img src="images/logo2.png" width=200 height=200>
        </a>
        <fieldset>
            <legend align="center">
                <h3>Manage Routes</h3>
            </legend>
            <table align="center" width=90% border=0>
                <tr>
                    <td align="center" colspan="4">
                        <input type="text" class="routeID" id="routeID" name="routeID" placeholder="Route ID" size=20
                            value="<?php echo $routeID ?>">
                    </td>
                </tr>
                <tr>
                    <td width=25% align="center"><br><select name="boardingPoint">
                            <option align="center" disabled selected>Boarding Point</option>
                            <option>Abu Dhabi (AUH)</option>
                            <option>Barcelona (BCN)</option>
                            <option>Beijing (PEK)</option>
                            <option>Buenos Aires (BUE)</option>
                            <option>Cambridge (CBG)</option>
                            <option>Chattogram (CGP)</option>
                            <option>Chicago (CHI)</option>
                            <option>Dhaka (DAC)</option>
                            <option>Doha (DOH)</option>
                            <option>London (LON)</option>
                            <option>Rosario (ROS)</option>
                            <option>Madrid (MAD)</option>
                            <option>Manchester (MAN)< /option>
                            <option>Shanghai (SHA)</option>
                            <option>Sylhet (ZYL)</option>
                        </select>
                    </td>
                    <td width=25% align="center"><br><select name="boardingAirport">
                            <option align="center" disabled selected>Boarding Airport</option>
                            <option>Abu Dhabi International Airport (AUH)</option>
                            <option>Barcelona Airport (BCN)</option>
                            <option>Beijing Airport (PEK)</option>
                            <option>Buenos Aires Airport (BUE)</option>
                            <option>Cambridge Airport (CBG)</option>
                            <option>Shah Amanat International Airport, Chattogram (CGP)</option>
                            <option>Chicago International Airport (CHI)</option>
                            <option>Hazrat Shahjalal International Airport, Dhaka (DAC)</option>
                            <option>Doha International Airport (DOH)</option>
                            <option>London Airport (LON)</option>
                            <option>Rosario Airport (ROS)</option>
                            <option>Madrid Airport (MAD)</option>
                            <option>Manchester Airport (MAN)</option>
                            <option>Shanghai International Airport (SHA)</option>
                            <option>Osmani International Airport, Sylhet (ZYL)</option>
                        </select>
                    </td>
                    <td width=25% align="center"><br><select name="destinationPoint">
                            <option align="center" disabled selected>Destination Point</option>
                            <option>Abu Dhabi (AUH)</option>
                            <option>Barcelona (BCN)</option>
                            <option>Beijing (PEK)</option>
                            <option>Buenos Aires (BUE)</option>
                            <option>Cambridge (CBG)</option>
                            <option>Chattogram (CGP)</option>
                            <option>Chicago (CHI)</option>
                            <option>Dhaka (DAC)</option>
                            <option>Doha (DOH)</option>
                            <option>London (LON)</option>
                            <option>Rosario (ROS)</option>
                            <option>Madrid (MAD)</option>
                            <option>Manchester (MAN)</option>
                            <option>Shanghai (SHA)</option>
                            <option>Sylhet (ZYL)</option>
                        </select>
                    </td>
                    <td width=25% align="center"><br><select name="destinationAirport">
                            <option align="center" disabled selected>Destination Airport</option>
                            <option>Abu Dhabi International Airport (AUH)</option>
                            <option>Barcelona Airport (BCN)</option>
                            <option>Beijing Airport (PEK)</option>
                            <option>Buenos Aires Airport (BUE)</option>
                            <option>Cambridge Airport (CBG)</option>
                            <option>Shah Amanat International Airport, Chattogram (CGP)</option>
                            <option>Chicago International Airport (CHI)</option>
                            <option>Hazrat Shahjalal International Airport, Dhaka (DAC)</option>
                            <option>Doha International Airport (DOH)</option>
                            <option>London Airport (LON)</option>
                            <option>Rosario Airport (ROS)</option>
                            <option>Madrid Airport (MAD)</option>
                            <option>Manchester Airport (MAN)</option>
                            <option>Shanghai International Airport (SHA)</option>
                            <option>Osmani International Airport, Sylhet (ZYL)</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="center" colspan="4">
                        <br><select name="tripType">
                            <option align="center" disabled selected>Trip type</option>
                            <option>One way</option>
                            <option>Return</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td width=25% align="center"><br>Schedule date: <input type="date" class="dSchedule" id="dSchedule"
                            name="dSchedule" value="<?php echo $dSchedule ?>"></td>
                    <td width=25% align="center"><br>Schedule time: <input type="time" class="tSchedule" id="tSchedule"
                            name="tSchedule" value="<?php echo $tSchedule ?>"></td>
                    <td width=25% align="center"><br>Return schedule date: <input type="date" class="rDSchedule"
                            id="rDSchedule" name="rDSchedule" value="<?php echo $rDSchedule ?>"></td>
                    <td width=25% align="center"><br>Return schedule time: <input type="time" class="rTSchedule"
                            id="rTSchedule" name="rTSchedule" value="<?php echo $rTSchedule ?>"></td>
                </tr>
            </table>
            <table align="center" width=100% border=0>
                <tr>
                    <td width=100% align="center"><br><br><br><input type="submit" class="updateRoute" id="updateRoute"
                            name="updateRoute" value="Update Route"></td>
                </tr>
            </table>
        </fieldset>
    </form>
</body>

</html>