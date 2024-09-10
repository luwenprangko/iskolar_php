<?php

// database config
$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "educ_assist";

if($locker = 1) {
    // table
    $tableUser = "users";
}

if($locker = 2) {
    // table
    $tableUser = "users";
}

// domain
$domain = "http://localhost/iskolar/";

// pages
$loginPage = "login.php";
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