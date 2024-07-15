<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>

<body>
    <?php
    if (isset($_POST["Login"])) { //user has clicked the login button
        //get user input
        $username = $_POST['username'];
        $password = $_POST['password'];
        //check if username and password are valid
        if ($password!= "password" || $username!= "username") { //**change this to whatever our DB username and password is**
            exit('Login failed. Incorrect username or password.');
        };
        //successful login, set session variable
        session_start();
        $_SESSION["user"] = $username;
        
        //database assets
        $host = '' //**CHANGE TO OUR SERVER NAME**
        $db = 'cp476'

        //establish SQL connection
        $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
        try {
            $conn = new PDO($dsn, $username, $password);
            //turn on error exceptions
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connection successful.";
        } catch (PDOException $e) {
            error_log($e->getMessage());
            echo $e->getMessage();
            exit('Failed to connect to the database. Please contact the administrator.');
        }
        //redirect user to dashboard
        header("location: ../pages/dashboard.php?status=loggedIn");
    }
    ?>
</body>

</html>
