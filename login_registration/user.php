<?php

$locker = 1;
include_once('../config/db.php');

// Check if user is already logged in
session_start();
if (!isset($_SESSION['uid'])) {
    header("Location: $loginPage");
}

$uid = $_SESSION['uid'];

// Query the user data using uid
$query = "SELECT * FROM $tableUser WHERE uid = '$uid'";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) == 1) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Fetch and assign the user data
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

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" ><?php echo $firstName_database .' '. $middleName_database .' '. $lastName_database ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page"><?php echo $role_database ?></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Settings
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link">Status: <span class="status" style="color: red;">Input Needed to Proceed.</span></a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="<?php echo "$logoutPage" ?>">Logout</a></li>
                        
                    </ul>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>

</body>
</html>