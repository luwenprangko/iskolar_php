<?php

// database config
$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "educ_assist";

if($lockerRegDB = 1) {
    // table
    $tableUser = "users";
}

// domain
$domain = "http://localhost/iskolar/";

// pages
$loginPage = "index.php";
$registerPage = "register.php";
$logoutPage = "logout.php";
$user_dashboard = "user.php";

// database connection
$con = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// check connection
if ($con->connect_error){
    die("Connection Failed" . $con->connect_error);
};

?>