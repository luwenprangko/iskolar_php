# db.php
- This is for connection of the system to database &#8595;
```php
$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "educ_assist";
```

- You need this to fetch the table &#8595;
```php
$tableUser = "users";
```

- This is for the domain &#8595;
```php
$domain = "http://localhost/iskolar/";
```

- You need this for Directories &#8595;
```php
$loginPage = "login.php";
$registerPage = "register.php";
$logoutPage = "logout.php";
$dashboardPage = "dashboard.php";
```

  - Connection of the database server &#8595;
```php
$con = new mysqli($dbHost, $dbUsername, $dbPassword,$dbName);
```

- Check the connection if work &#8595;
```php
if ($con->connect_error){
    die("Connection Failed" . $con->connect_error);
};
```

# Complete db.php
```php
<?php

if($locker =1) {

    // database config
    $dbHost = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "educ_assist";

    // table
    $tableUser = "users";

    // domain
    $domain = "http://localhost/iskolar/";

    // pages
    $loginPage = "login.php";
    $registerPage = "register.php";
    $logoutPage = "logout.php";
    $dashboardPage = "dashboard.php";

    // database connection
    $con = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    // check connection
    if ($con->connect_error){
        die("Connection Failed" . $con->connect_error);
    };

}

?>
```

