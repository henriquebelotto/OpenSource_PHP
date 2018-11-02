<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge"> <!-- edge compatible -->
    <link rel="stylesheet" class="card-link" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <script src="script/jquery-3.2.1.js"></script>
    <script src="script/tether.js"></script>
    <script src="script/bootstrap.js"></script>
    <script type="text/javascript" src="script/javascript.js"></script>
    <title>XYZ Company - Create Guest Account</title>
    <?php

    function checkForm() {
        if (isset($_POST['submit'])) {
            if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['retype-password'])
                && !empty($_POST['email']) && !empty($_POST['firstname']) && !empty($_POST['lastname'])
                && !empty($_POST['phone']) && !empty($_POST['address'])) {

                // Declaring Server Variables
                $host = "localhost";
                $user = "root";
                $password = "";
                $dbname = "xyzcompany";
                $con = mysqli_connect($host, $user, $password, $dbname)
                or die("Connection failed");

                $username = mysqli_real_escape_string($con, $_POST['username']);
                $password = mysqli_real_escape_string($con, $_POST['password']);
                $retypepassword = $_POST['retype-password'];
                $email = $_POST['email'];
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];

                if ($password == $retypepassword) {

                    $query = "SELECT username FROM guest_accounts WHERE username = '$username'";

                    $result = mysqli_query($con, $query) or die("Sorry, we couldn't retrieve your information" . mysqli_error($con));

                    if ((mysqli_num_rows($result) > 0)) {
                        // username already being used.
                        // Cannot create a new account
                        echo "Sorry, this username is already being used!";

                    } else {
                        // Username NOT being used
                        // Create a new account
                        $query = "INSERT INTO `guest_accounts`(`username`, `password`, `phone`, `email`, `FirstName`, `Lastname`, `Address`) 
                            VALUES ('$username','$password','$email','$firstname','$lastname','$phone','$address')";
                        $result = mysqli_query($con, $query) or die("Sorry, we couldn't store your information" . mysqli_error($con));

                        if ($result) {
                            header("location: login page.html");
                        } else {
                            echo "Sorry, we could NOT create an account at this time";
                        }
                    }
                } else {
                    echo "Sorry, your passwords do not match!";
                }

            } else {

                echo "Sorry, you must fill all the information before proceeding!";
            }
        }
    }

    ?>
</head>
<body>

<div>

    <div>
    <h1 class="jumbotron text-center bg-info">Create a new Guest Account</h1>
    </div>

    <div class="jumbotron bg-secondary">

        <div>
            <h5 class="text-center"><b><?php checkForm() ?></b></h5>
        </div>

        <form method="post" action="">
            <div class="form-inline justify-content-start form-row form-group">
                <div class="col-1">

                </div>
                <div class="form-group col-5">
                    <label class="col-form-label col-4" for="username"><b>Username:</b></label>
                    <input class="form-control col-8" type="text" name="username" id="username"
                           placeholder="Enter username">
                </div>
            </div>
            <div class="form-inline form-row justify-content-center form-group">
                <div class="form-group col-5">
                    <label class="col-form-label col-4" for="password"><b>Password:</b></label>
                    <input class="form-control col-8" type="password" name="password" id="password" placeholder="Enter password">
                </div>
                <div class="form-group col-5">
                    <label class="col-form-label col-4" for="retype-password"><b>Re-type Password:</b></label>
                    <input class="form-control col-8" type="password" name="retype-password" id="retype-password" placeholder="Re-type password">
                </div>
            </div>


            <div class="form-inline form-row justify-content-start form-group">
                <div class="col-1">

                </div>
                <div class="form-group col-5">
                    <label class="col-form-label col-4" for="email"><b>Email:</b></label>
                    <input class="form-control col-8" type="email" name="email" id="email" placeholder="Enter email">
                </div>
            </div>
            <div class="form-inline form-row justify-content-center form-group">
                <div  class="form-group col-5">
                    <label class="col-form-label col-4" for="firstname"><b>First Name:</b></label>
                    <input class="form-control col-8" type="text" name="firstname" id="firstname" placeholder="Enter First Name">
                </div>
                <div  class="form-group col-5">
                    <label class="col-form-label col-4"  for="lastname"><b>Last Name:</b></label>
                    <input class="form-control col-8" type="text" name="lastname" id="lastname" placeholder="Enter First Name">
                </div>
            </div>
            <div class="form-inline form-row justify-content-center form-group">
                <div class="form-group col-5">
                    <label class="col-form-label col-4" for="phone"><b>Phone:</b></label>
                    <input class="form-control col-8" type="text" name="phone" id="phone">
                </div>
                <div class="form-group col-5">
                    <label class="col-form-label col-4" for="address"><b>Address:</b></label>
                    <input class="form-control col-8" type="text" name="address" id="address">
                </div>
            </div>

            <div class="form-group form-inline justify-content-center">
                <button class="btn btn-success mr-3" type="submit" value="submited" name="submit">Create Account</button>
                <button class="btn btn-danger" type="reset" value="reset">Clear</button>
            </div>

        </form>
    </div>



</div>



</body>
</html>


