<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["adminAuthenticated"]) || $_SESSION["adminAuthenticated"] !== true) {
    header("location: landingPage.php");
    exit(); 
}

require_once("../Model/routeManagementModel.php");
$routeDetails = viewRoute();
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

    <form align="center" method="post" action="../Controller/routeManagementProcess.php">
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
                        <input type="text" class="routeID" id="routeID" name="routeID" placeholder="Route ID" size=20>
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
                            <option>Manchester (MAN)</option>
                            <option>Shanghai (SHA)</option>
                            <option>Sylhet (ZYL)</option>
                        </select></td>
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
                        </select></td>
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
                        </select></td>
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
                        </select></td>
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
                            name="dSchedule"></td>
                    <td width=25% align="center"><br>Schedule time: <input type="time" class="tSchedule" id="tSchedule"
                            name="tSchedule"></td>
                    <td width=25% align="center"><br>Return schedule date: <input type="date" class="rDSchedule"
                            id="rDSchedule" name="rDSchedule"></td>
                    <td width=25% align="center"><br>Return schedule time: <input type="time" class="rTSchedule"
                            id="rTSchedule" name="rTSchedule"></td>
                </tr>
            </table>
            <table align="center" width=100% border=0>
                <tr>
                    <td width=100% align="center"><br><br><br><input type="submit" class="addRoute" id="addRoute"
                            name="addRoute" value="Add Route"></td>
                    <td align="center"><br><br><br><a href="advancedRouteManagement.php">Advanced Option</a></td>

                </tr>
            </table>
        </fieldset>
    </form>


    <fieldset align="center">
        <legend align="center">
            <h3>Route Details</h3>
        </legend>
        <table width=100% border=1>
            <tr>
                <th>Route ID</th>
                <th>Boarding Point</th>
                <th>Boardin Airport</th>
                <th>Destination Point</th>
                <th>Destination Airport</th>
                <th>Trip Type</th>
                <th>Schedule Date</th>
                <th>Schedule Time</th>
                <th>Return Schedule Date</th>
                <th>Return Schedule Time</th>
            </tr>
            <?php foreach ($routeDetails as $route): ?>
            <tr>
                <td align="center"><?php echo $route['routeID']?></td>
                <td align="center"><?php echo $route['boardingPoint']?></td>
                <td align="center"><?php echo $route['boardingAirport']?></td>
                <td align="center"><?php echo $route['destinationPoint']?></td>
                <td align="center"><?php echo $route['destinationAirport']?></td>
                <td align="center"><?php echo $route['tripType']?></td>
                <td align="center"><?php echo $route['dSchedule']?></td>
                <td align="center"><?php echo $route['tSchedule']?></td>
                <td align="center"><?php echo $route['rDSchedule']?></td>
                <td align="center"><?php echo $route['rTSchedule']?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </fieldset>
</body>

</html>