<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once("../Model/signupModel.php");


if(isset($_POST["signupButton"]))
{
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $lowerCaseLetter = range("a", "z");
    $upperCaseLetter = range("A", "Z");;
    $numericDigits = range("0", "9");
    $specialCharacters = ["!", "#", "$", "%", "&", "(", ")", "*", "+", ",", "-", ".", "/", ":", ";", "<", "=", ">", "?", "@", "[", "]", "^", "_", "`", "{", "|", "}", "~"];

    $flag = 1;

    if(empty($_POST["fName"]))
    {
        echo "Please enter your first name as it appears in your passport. <br><br>";
        $flag = 0;
        // header("location: signup.php");
    }
    $atPos = strpos($email, '@');
    $dotPos = strpos($email, '.');
    if(empty($_POST["email"]))
    {
        echo "Please enter a valid email address. <br><br>";
        $flag = 0;
        // header("location: signup.php");
    }
    else if ($atPos === false || $atPos === 0 || $dotPos === false || $dotPos <= $atPos + 1 || $dotPos === strlen($email) - 1) 
    {
        echo "Please enter a valid email address. <br><br>";
        $flag = 0;
    }

    //--------------------------------------------------Validation of password starts here

    //----------empty or not
    if(empty($password))
    {
        echo "Please choose a password. <br><br>";
        $flag = 0;
        // header("location: signup.php");
    }

    //----------8 characters long or not
    if(strlen($password) < 8)
    {
        echo "Your password must be 8 characters long.  <br><br>";
        $flag = 0;
    }

    //----------if contains lowercase letters or not
    $hasLowerCase = false;
    foreach($lowerCaseLetter as $letter)
    {
        if(strpos($password, $letter) !== false)
        {
            $hasLowerCase = true;
            break;
        }
    }
    if(!$hasLowerCase)
    {
        echo "Your password must contain at least one lowercase letter.  <br><br>";
        $flag = 0;
    }

    //----------if contains uppercase letters or not
    $hasUpperCase = false;
    foreach($upperCaseLetter as $letter)
    {
        if(strpos($password, $letter) !== false)
        {
            $hasUpperCase = true;
            break;
        }
    }
    if(!$hasUpperCase)
    {
        echo "Your password must contain at least one uppercase letter.  <br><br>";
        $flag = 0;
    }

    //----------if contains numeric digit or not
    $hasNumericDigits = false;
    foreach($numericDigits as $digit)
    {
        if(strpos($password,$digit)!== false)
        {
            $hasNumericDigits = true;
            break;
        }
    }
    if(!$hasNumericDigits)
    {
        echo "Your password must contain at least one numeric digit.  <br><br>";
        $flag = 0;
    }

    //----------if contains special character or not
    $hasSpecialCharacters = false;
    foreach($specialCharacters as $character)
    {
        if(strpos($password,$character)!== false)
        {
            $hasSpecialCharacters = true;
            break;
        }
    }
    if(!$hasSpecialCharacters)
    {
        echo "Your password must contain at least one special character.  <br><br>";
        $flag = 0;
    }


    //--------------------------------------------------Validation of confirm password

    //----------empty or not
    if(empty($_POST["cPassword"]))
    {
        echo "Please retype your password. <br><br>";
        $flag = 0;
        // header("location: signup.php");
    }

    //----------matches or not
    if($_POST["cPassword"] !== $password)
    {
        echo "Your password does not match.  <br><br>";
        $flag = 0;
    }


    //--------------------------------------------------HashingPassword
    function passwordHash($password)
    {
        $hashedPassword = "";
        for ($i = 0; $i <strlen($password); $i++)
        {
            $char = $password[$i];
            $ascii = ord($char);
            $hashedAscii = $ascii + 3;
            $hashedChar = chr($hashedAscii);
            $hashedPassword .= $hashedChar;
        }
        return $hashedPassword;
    }

    $hashedPassword = passwordHash($password);

    if(empty($_POST["policy"]))
    {
        echo "Sorry! We cannot accept if you do not agree to our policies! <br><br>";
        $flag = 0;
        // header("location: signup.php");
    }

    if($flag == 1)
    {
        $status = addUser($fName, $lName, $email);
        $status2 = addLoginCredentials($fName, $lName, $email, $hashedPassword);
        if($status && $status2)
        {
            header("location: ../View/landingPage.php");
        }
        else
        {
            echo "DB error";
        }
    }
}

?>