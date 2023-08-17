<html>

<head>
    <title>Starting Page</title>
    <link rel="stylesheet" href="../CSS/landingPageStyles.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <header>
        <input type="image" class="logo" src="images/logo2.png" width=200 height=200>
        <h2 class="motto">Where dreams take flight...</h2>
        <nav class="navigationHeader">
            <a href="explore.html">Explore</a>
            <a href="book.html">Book</a>
            <a href="faqs.php">FAQs</a>
            <button class="loginButtonPopup">Log In</button>
            <button class="signupButtonPopup">Sign Up</button>
        </nav>
        <!-- <div class="time" id="currentDateTime"></div> -->
    </header>

    <div class="wrapper">
        <span class="iconClose"><img src="images/loginClose.png" width=40 height=40></span>
        <div class="formBox Login">
            <h2>Login</h2>
            <form method="post" action="../Controller/loginProcess.php" name="loginForm"
                onsubmit="return validateLoginForm();">

                <div class="textBox">
                    <span class="icon">
                        <i class="fa-solid fa-user" style="color: #ffffff;"></i>
                    </span>
                    <input type="text" name="email">
                    <label>Username</label>
                </div>
                <div class="textBox">
                    <span class="icon">
                        <i class="fa-solid fa-lock" style="color: #ffffff"></i></a>
                    </span>
                    <span class="passwordHide">
                        <i class="fa-solid fa-eye-slash" style="color: #ffffff;"></i>
                    </span>
                    <input type="password" name="password">
                    <label>Password</label>
                </div>
                <div class="rememberForgot">
                    <label><input type="checkbox" name="rememberMe">Remember Me</label>
                    <a href="forgotPassword.php">Forgot your password?</a>
                </div>
                <button type="submit" class="loginButton" name="twoFACode">Login</button>
                <div class="loginRegister">
                    <p>Not a member? <a href="#" class="signupLink">Join UROJAHAJ</a> and earn miles to pay for
                        your flights!<br><br>You are going to get a free bonus of 500 miles just signing up.<br> Grab it
                        today!
                    </p>
                </div>
            </form>
        </div>


        <div class="formBox Signup">
            <h2>Sign Up</h2>
            <form method="post" action="../Controller/signupProcess.php" name="signupForm"
                onsubmit="return validateSignupForm();">
                <div class="textBox">
                    <input type="text" name="fName">
                    <label>First Name</label>
                </div>
                <div class="textBox">
                    <input type="text" name="lName">
                    <label>Last Name</label>
                </div>
                <div class="textBox">
                    <span class="icon">
                        <i class="fa-solid fa-user" style="color: #ffffff;"></i>
                    </span>
                    <input type="text" name="email">
                    <label>Username</label>
                </div>
                <div class="textBox">
                    <span class="icon">
                        <i class="fa-solid fa-lock" style="color: #ffffff"></i></a>
                    </span>
                    <span class="passwordHide">
                        <i class="fa-solid fa-eye-slash" style="color: #ffffff;"></i>
                    </span>
                    <input type="password" name="password">
                    <label>Password</label>
                </div>
                <div class="textBox">
                    <span class="icon">
                        <i class="fa-solid fa-lock" style="color: #ffffff"></i></a>
                    </span>
                    <span class="passwordHide">
                        <i class="fa-solid fa-eye-slash" style="color: #ffffff;"></i>
                    </span>
                    <input type="password" name="cPassword">
                    <label>Confirm Password</label>
                </div>
                <div class="termsAndPrivacy">
                    <label><input type="checkbox" name="policy">By joining, I accept the <a href="policy.php">Privacy
                            Policy</a><br> and Terms and Condition</label>
                </div>
                <button type="submit" class="loginButton" name="signupButton">Sign Up</button>
                <div class="loginRegister">
                    <p><a href="#" class="loginLink">Already have an account?</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
    </div>
    <script src="../JS/landingPageScript.js"></script>
    <!-- <script src="time.js"></script> -->
</body>

</html>