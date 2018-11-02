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

</head>
<body>

<?php

session_start();
if (isset($_SESSION['admin'])) {
    $_SESSION["admin"] = 1;

echo '
<div class="container">
    <h1 class="text-center jumbotron bg-success">Administrator Account Options</h1>

    
    <div class="jumbotron bg-secondary row">
        <!-- Search for user -->
        <div class="col-3 text-center img-thumbnail">
            <a href="search_user.php"><img alt="Search for user" class="img-fluid img-thumbnail" src="img/SearchUser.png" style="height: 25vh;"></a>
            <a href="search_user.php"><p><b>Search User Account</b></p></a>
        </div>
        
        <!-- Search for report -->
        <div class="col-3 text-center img-thumbnail">
            <a href="search_report.php"><img alt="search for report" class="img-fluid img-thumbnail" src="img/databaseSearch.jpg" style="height: 25vh;"></a>
            <a href="search_report.php"><p><b>Search User Account</b></p></a>
        </div>
        
        <!-- Create Emp Account -->
        <div class="col-3 text-center img-thumbnail">
            <a href="create_emp_account.php"><img alt="new user account" class="img-fluid" src="img/newUser.jpg" style="height: 25vh;"></a>
            <a href="create_emp_account.php"><p cl><b>Create New Employee Account</b></p></a>
        </div>

        <!-- Update Incident List -->
        <div class="col-3 text-center img-thumbnail">
            <a href="update_incident_list.php"><img alt="new user account" class="img-fluid img-thumbnail" src="img/updateList.png" style="height: 25vh;"></a>
            <a href="update_incident_list.php"><p><b>Update Incident Categories</b></p></a>
        </div>
    </div>
</div>

';
} else {
    // User not authorized to access this web page. Redirect to login page

    header("location:index.php");
}
 ?>
</body>
</html>
