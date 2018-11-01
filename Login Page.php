<?php
/**
 * Created by PhpStorm.
 * User: fuchunchai
 * Date: 2018-11-01
 * Time: 2:36 PM
 */
session_start();
$dbHost="localhost";
$dbUsername="root";
$dbPassword="root";
$dbName="xyzcompany";
//connection with database
if (!empty($_POST["username"])){
    if (!empty($_POST["password"])){
        if (!empty($_POST["type"])){
            //check all fileds are filled
            $type=htmlspecialchars($_POST["type"]);

            //if login is guest
            if ($type=="guest"){
                $con = mysqli_connect($dbHost,$dbUsername,$dbPassword,$dbName)
                        or die("Failed to connect.");
                $userin = mysqli_real_escape_string($con, $_POST["username"]);
                $passwordin = mysqli_real_escape_string($con, $_POST["password"]);

                $query = "SELECT * FROM emp_accounts WHERE username= '$userin' AND password = '$passwordin'";
                $result = mysqli_query($con,$query);
                if (mysqli_num_rows($result) > 0) {
                    echo "Sucessful Login";
                    $_SESSION["Ticket"]=1;
                    header('');
                }
                else
                    echo "Failed to Login";

            }
            //if login is employee
            else{
                $con = mysqli_connect($dbHost,$dbUsername,$dbPassword,$dbName)
                or die("Failed to connect.");
                $userin = mysqli_real_escape_string($con, $_POST["username"]);
                $passwordin = mysqli_real_escape_string($con, $_POST["password"]);

                $query = "SELECT * FROM guest_account WHERE username= '$userin' AND password = '$passwordin'";
                $result = mysqli_query($con,$query);
                if (mysqli_num_rows($result) > 0) {
                    echo "Sucessful Login";
                    $_SESSION["Ticket"]=1;
                    header('');
                }
                else
                    echo "Failed to Login";
            }














        }
    }
    else{
        echo "Please enter your password.";
    }
}
else{
    echo "Please enter your username.";
}