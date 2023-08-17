<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["customerAuthenticated"]) || $_SESSION["customerAuthenticated"] !== true) {
    header("location: landingPage.php");
    exit();
}
?>

<html>

<head>
    <title>Two factor authentication</title>
    <link rel="stylesheet" href="../CSS/twoFACodeVerifyStyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <form align="center" method="post" action="../Controller/twoFACodeVerifyProcess.php">
        <h2>Verification<h2>
                <a href="landingPage.php"><input type="image" class="logo" src="images/logo2.png" width=150
                        height=150></a>
                <p>Please enter the code sent to your registered email</p>
                <input type="text" class="twoFACodeReader" name="twoFACodeReader" id="twoFACodeReader" size=30
                    placeholder="Write your code"><br><br><br><br>
                <input type="submit" class="login" id="login" name="login" value="Submit and Login">

    </form>
</body>

</html>