<?php

$locker = 1;
include_once('../config/db.php');

if (!isset($_SESSION['uid'])) { session_start(); }

//para mag logout kelangan iterminate
session_unset();
session_destroy();

header("Location: $loginPage")

?>