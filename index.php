<?php
/**
 * Created by PhpStorm.
 * User: fuchunchai
 * Date: 2018-11-01
 * Time: 2:36 PM
 */
session_start();
$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
// APPLE HAVE A PASSWORD!
// $dbPassword = "root";
$dbName = "xyzcompany";
//connection with database
if (isset($_POST["login"])) {
    if (!empty($_POST["username"])) {
        if (!empty($_POST["password"])) {

            //check all fileds are filled
            $con = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName)
            or die("Failed to connect.");

            //if login is guest
            $userin = mysqli_real_escape_string($con, $_POST["username"]);
            $passwordin = mysqli_real_escape_string($con, $_POST["password"]);


            $query = "SELECT * FROM `useraccounts` WHERE username= '$userin' AND password = '$passwordin'";
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_row($result);
            if (mysqli_num_rows($result) > 0) {
                if ($row[8] == "regular" || $row[0] == "guest" || $row[8] == "Regular" || $row[0] == "Guest") {
                    $_SESSION["ticket"] = 1;
                    $_SESSION["email"] = $row[4];
                    header('location: test.php');
                } else if ($row[8] == "admin" || $row[8] == "Admin") {
                    $_SESSION["admin"] = 1;
                    header('location: admin_account.php');
                }
            } else
                echo "Failed to Login";
        } else
            echo "Please enter your password.";
    } else
        echo "Please enter your username.";
}

if (isset($_POST["register"])) {
    $_SESSION["Create"] = 1;
    header('location: create_guest_account.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>XYZ Login</title>
</head>
<body>
<h1 style="text-align: center">Please Login:</h1>
<form method="post">
    <p>
        User name:
        <input type="text" name="username">
    </p>
    <p>
        Password:
        <input type="password" name="password">
    </p>
    <p>
        <input type="submit" value="Login" name="login">
    </p>
    <p>
        Don't have a account? Register now!<br>
        <input type="submit" value="Register" name="register">
    </p>
</form>
</body>
</html>


