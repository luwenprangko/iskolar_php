<?php

// database config
$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "form";

if($locker = 2) {
    // table
    $table1 = "table1";
    $table2 = "table2";
}

// domain
$domain = "http://localhost/iskolar/";

// pages
$formPage = "form.php";

// database connection
$con = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
// check connection
if ($con->connect_error){
    die("Connection Failed" . $con->connect_error);
};

?>