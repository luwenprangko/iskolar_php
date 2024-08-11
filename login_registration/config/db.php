<?php

if($locker =1) {

    // database config
    $dbHost = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "educ_assist";

    // table
    $tableUser = "users";

    // domain
    $domain = "http://localhost/iskolar/";

    // pages
    $loginPage = "login.php";
    $registerPage = "register.php";
    $logoutPage = "logout.php";
    $dashboardPage = "dashboard.php";

    // database connection
    $con = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    // check connection
    if ($con->connect_error){
        die("Connection Failed" . $con->connect_error);
    };

}

?>