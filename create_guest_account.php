<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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

<h1>Create a new Guest Account</h1>


<p><?php checkForm() ?></p>

    <form method="post" action="">
        <fieldset>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username">
            <br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
            <br>
            <label for="retype-password">Re-type Password:</label>
            <input type="password" name="retype-password" id="retype-password">
            <br>
        </fieldset>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
        <br>
        <label for="firstname">First Name:</label>
        <input type="text" name="firstname" id="firstname">
        <br>
        <label for="lastname">Last Name:</label>
        <input type="text" name="lastname" id="lastname">
        <br>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone">
        <br>
        <label for="address">Address:</label>
        <input type="text" name="address" id="address">
        <br>

        <button type="submit" value="submited" name="submit">Create Account</button>
        <button type="reset" value="reset">Clear</button>


    </form>

</body>
</html>


