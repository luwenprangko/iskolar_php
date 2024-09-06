<?php

// include database cinnection 1

$locker = 1;
include_once('../config/db.php');


// check if ready
session_start();
if(isset($_SESSION ['id'])) {
    header("Location: $user_dashboard");
}

if (isset($_POST['register'])) {
    $errorMsg = "";

    // $lastName = $_POST['$lastName'] < DONT HAVE GOOD SECURITY
    // BELOW IS THE BEST SECURITY
    $lastName = mysqli_real_escape_string($con, $_POST['lastName']);
    $firstName = mysqli_real_escape_string($con, $_POST['firstName']);
    $middleName = mysqli_real_escape_string($con, $_POST['middleName']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $uid = rand();
    $role = '';
    if ($email == 'admin@admin.com') {
        $role = 'Admin';
    } else {
        $role = 'Applicant';
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $sql = " SELECT * FROM $tableUser WHERE email = '$email' ";
    $execute = mysqli_query($con, $sql);

    // check if the user is exist
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMsg = 'Email is not valid try again';
    } else if (strlen($password) <= 6) {
        $errorMsg = 'Password must have atleast 6 digits or more';
    } else if ($execute->num_rows == 1) {
        $errorMsg = 'Email is Already Exists';
    } else {
        $query = " INSERT INTO $tableUser (uid, lastName, firstName, middlename, email, password, role) VALUES
        ('$uid', '$lastName', '$firstName', '$middleName', '$email', '$password', '$role') ";

        $result = mysqli_query($con, $query);

        if ($result == true) {
            header("Location: $loginPage");
        } else {
            $errorMsg = "You are valid bro";
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <?php
                if (isset($errorMsg)) {
                    echo
                    "
                    <div class='alert alert-warning alert-dismissible fade show'>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    $errorMsg
                    </div>
                    ";
                }
                ?>
                <h1 class="text-center mb-5">Register</h1>
                <form action="" method="post" class="row g-3 needs-validation" novalidate>
                    <div class="col-md-4">
                        <label for="validationCustom01" class="form-label">Last Name :</label>
                        <input type="text" name="lastName" class="form-control" id="validationCustom01" placeholder="Dela Cruz" required>
                    </div>

                    <div class="col-md-4">
                        <label for="validationCustom01" class="form-label">First Name :</label>
                        <input type="text" name="firstName" class="form-control" id="validationCustom01" placeholder="Juan" required>
                    </div>

                    <div class="col-md-4">
                        <label for="validationCustom01" class="form-label">Middle Name :</label>
                        <input type="text" name="middleName" class="form-control" id="validationCustom01" placeholder="A.">
                    </div>

                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label">Email :</label>
                        <input type="email" name="email" class="form-control" id="validationCustom01" placeholder="name@example.com" required>
                    </div>

                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label">Password :</label>
                        <input type="password" name="password" class="form-control" id="validationCustom01" placeholder="******" minlength="6" required>
                    </div>

                    <p>Already have account? <a href="<?php echo $loginPage ?>">Login</a></p>
                    <div class="col-12 text-center">
                        <input class="btn btn-primary" type="submit" name="register" value="Register">
                    </div>
                </form>
            </div>
        </div>
    </div>



<script>
(() => {
'use strict'
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

        form.classList.add('was-validated')
        }, false)
    })
})()
</script>
</body>
</html>