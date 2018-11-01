<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>XYZ Company - Create Guest Account</title>
    <?php

    function checkForm() {
        if (isset($_POST['submit'])) {
            if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['retype-password'])
                && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['phone'])
                && isset($_POST['address'])) {

                echo "ok";


            } else {
                echo "Please, complete the form before creating an account";
            }
        }
    }

    ?>
</head>
<body>

<h1>Create a new Guest Account</h1>


<p><? checkForm() ?></p>

    <form method="post" action="create_guest_account.php">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <br>
        <label for="retype-password">Re-type Password:</label>
        <input type="password" name="retype-password" id="retype-password">
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


