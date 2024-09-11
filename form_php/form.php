<?php
$lockerAppForm = 1;
include_once("db.php");

if ($lockerAppForm == $locker) {

    if (isset($_POST['register'])) {
        $errorMsg = "";
    
        // Secure form data using mysqli_real_escape_string
        $lastName = mysqli_real_escape_string($con, $_POST['lastName']);
        $firstName = mysqli_real_escape_string($con, $_POST['firstName']);

        $sql1 = "INSERT INTO $table1 (first_name) VALUES ('$firstName')";

        if (mysqli_query($con, $sql1)) {
            echo "Registration successful.";
        } else {
            echo "Error: " . mysqli_error($con);
        }

        $sql2 = "INSERT INTO $table2 (last_name) VALUES ('$lastName')";

        if (mysqli_query($con, $sql2)) {
            echo "Registration successful.";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }

} else {
    echo "The Application is not Open";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Representative</title>
</head>
<body>

<?php if (!empty($errorMsg)): ?>
    <p style="color:red;"><?php echo $errorMsg; ?></p>
<?php endif; ?>

<form action="" method="post">
    <input type="text" name="lastName" placeholder="Last Name" required>
    <input type="text" name="firstName" placeholder="First Name" required>
    <button type="submit" name="register">Register</button>
</form>

</body>
</html>