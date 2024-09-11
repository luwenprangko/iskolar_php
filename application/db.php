<?php

// database config
$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "educ_assist";

if($locker = 1) {
    // table
    $table1 = "rep1";
    $table2 = "rep2";
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