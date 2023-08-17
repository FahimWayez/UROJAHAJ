<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once("../Model/loginModel.php");

use PHPMailer\PHPMailer\PHPMailer;
// require_once("twoFACodeSend.php  ");

if (isset($_POST["twoFACode"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $rememberMe = $_POST["rememberMe"];
    $_SESSION["email"] = $email;
    
    $storedEmail = $_SESSION["email"];
    $type = get_Type($storedEmail);
    //--------------------------------------------------HashingPassword
    function passwordHash($password)
    {
        $hashedPassword = "";
        for ($i = 0; $i < strlen($password); $i++) {
            $char = $password[$i];
            $ascii = ord($char);
            $hashedAscii = $ascii + 3;
            $hashedChar = chr($hashedAscii);
            $hashedPassword .= $hashedChar;
        }
        return $hashedPassword;
    }
    $hashedPassword = passwordHash($password);


    $atPos = strpos($email, '@');
    $dotPos = strpos($email, '.');

    $status = login($email, $hashedPassword);

    if ($email == "" || $password == "") 
    {
        echo "Your username/password field is empty";
        // $flag = 0;
    } 
    else if ($atPos === false || $atPos === 0 || $dotPos === false || $dotPos <= $atPos + 1 || $dotPos === strlen($email) - 1) 
    {
        echo "Please enter a valid email address. <br><br>";
    }
    
    else if ($status) 
    {
        if ($type['type'] == "Admin")
            {
                $_SESSION["flag"] = true;
                if ($rememberMe) 
                {
                    setcookie('flag', 'true', time() + 3000, '/');
                    header("location: ../View/adminLanding.php");
                    $_SESSION["adminAuthenticated"] = true;
                } 
                else 
                {
                    header("location: ../View/adminLanding.php");
                    $_SESSION["adminAuthenticated"] = true;
                }
            } 
        else 
        {
            $_SESSION["flag"] = true;
            if ($rememberMe) 
            {
                setcookie('flag', 'true', time() + 30600, '/');
                require "vendor2/autoload.php";
                function code()
                {
                    $min = 100000;
                    $max = 999999;
                    return rand($min, $max);
                }
                $code = code();
                $_SESSION["code"] = $code;
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = "smtp.gmail.com";
                $mail->SMTPAuth = true;
                $mail->Username = "urojahaj465@gmail.com";
                $mail->Password = "emkvnjimfjmqfmdi";
                $mail->SMTPSecure = "ssl";
                $mail->Port = 465;
                $mail->setFrom("urojahaj465@gmail.com");
                $mail->addAddress($email);
                $mail->Subject = "Verification Code";
                $mail->Body = "Your verification code is: ".$code;
                $mail->send();
                header("location: ../View/twoFACodeVerify.php");
                $_SESSION["customerAuthenticated"] = true;
            } 
            else 
            {
                require "vendor2/autoload.php";
                function code()
                {
                    $min = 100000;
                    $max = 999999;
                    return rand($min, $max);
                }
                $code = code();
                $_SESSION["code"] = $code;
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = "smtp.gmail.com";
                $mail->SMTPAuth = true;
                $mail->Username = "urojahaj465@gmail.com";
                $mail->Password = "emkvnjimfjmqfmdi";
                $mail->SMTPSecure = "ssl";
                $mail->Port = 465;
                $mail->setFrom("urojahaj465@gmail.com");
                $mail->addAddress($email);
                $mail->Body = $code;
                $mail->send();
                header("location: ../View/twoFACodeVerify.php");
                $_SESSION["customerAuthenticated"] = true;
            }
        }
    } 
    else 
    {
        echo "Invalid username/password";
    }
}
?>