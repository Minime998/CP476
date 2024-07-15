<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>

<body>
    <?php
    //get user input
    $username = $_POST['username'];
    $password = $_POST['password'];
    //check if username and password are valid
    if ($password!= "password" || $username!= "username") { //change this to whatever we want to username and password to be
        echo "Invalid username/password. Please try again.";
        exit();
    };
    //successful login, set session variable
    session_start();
    $_SESSION["user"] = $username;
    ?>
</body>

</html>
