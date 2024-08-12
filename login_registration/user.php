<?php

$locker = 1;
include_once('./config/db.php');


// already login
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: $loginPage");
}

$id = $_SESSION['id'];
$query = " SELECT * FROM $tableUser WHERE id = '$id' ";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) == 1) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id_database = $row['id'];
        $uid_database = $row['uid'];
        $firstName_database = $row['firstName'];
        $middleName_database = $row['middleName'];
        $lastName_database = $row['lastName'];
        $role_database = $row['role'];
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>

<div class="container p-5">
    <h4><?php echo $firstName_database .' '. $middleName_database .' '. $lastName_database ?></h4>
    <h5><?php echo $role_database ?></h5>
    <p>Status: <span class="status" style="color: red;">Processing..</span></p>
    <a href="<?php echo "$logoutPage" ?>">Logout</a>
</div>

</body>
</html>