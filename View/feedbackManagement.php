<!DOCTYPE html>
<html lang="en">

<head>
    <title>Feedback Management</title>
    <link rel="stylesheet" href="../CSS/feedbackManagementStyles.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <button class="goBack"><i class="fa-solid fa-backward"><a href="#" onclick="history.back();"> Go
                back</a></i></button>
    <a href="startingPage.php">
        <img src="images/logo2.png" width="150" height="150"><br>
    </a>
    <h1 align="center">Manage Feedbacks</h1>
    <table id="feedbackTable">
        <thead>
            <tr>
                <th>Flight ID</th>
                <th>Schedule Time</th>
                <th>Destination Time</th>
                <th>Gate</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <!-- result -->
        </tbody>
    </table>
    <script src="../JS/feedbackManagementScript.js"></script>
</body>

</html>