<?php

$locker = 1;
include_once("./config/db.php");

// check if ready
session_start();
if(isset($_SESSION ['id'])) {
    header("Location: $user_dashboard");
}

if (isset($_POST['login'])) {

    $errorMsg = "";

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    if (!empty('$email') || !empty('$password')){

        // check ang email kung peron na at kapag meron na...
        $query = " SELECT * FROM $tableUser WHERE email = '$email' ";
        $result = mysqli_query($con, $query);

        // kapag meron ng email, kelangan na lang ay password ang itatype na sunod
        if (mysqli_num_rows($result) == 1 ) {
            while ($row = mysqli_fetch_assoc($result)) {
                if (password_verify($password, $row['password'])) {
                    $_SESSION['id'] = $row['id'];
                    header("Location: $user_dashboard");
                } else {
                    $errorMsg = " Eamil or Password is invalid";
                }
            }
        } else {
            $errorMsg = "No user found";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
                <h1 class="text-center mb-5">Login</h1>
                <form action="" method="post" class="row g-3 needs-validation" novalidate>
                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label">Email :</label>
                        <input type="email" name="email" class="form-control" id="validationCustom01" placeholder="name@example.com" required>
                    </div>

                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label">Password :</label>
                        <input type="password" name="password" class="form-control" id="validationCustom01" placeholder="******" minlength="6" required>
                    </div>

                    <p>Don't have account? <a href="<?php echo $registerPage ?>">Register</a></p>
                    <div class="col-12 text-center">
                        <input class="btn btn-primary" type="submit" name="login" value="Login">
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