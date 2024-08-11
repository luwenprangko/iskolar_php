<?php

// include database cinnection 1

$locker = 1;
include_once('config/db.php');


// check if ready
session_start();
if(isset($_SESSION ['id'])) {
    header("Location: $dashboardPage");
}


?>