<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/main.css" />
    <link rel="stylesheet" href="../styles/login.css" />
    <title>Login</title>
</head>

<body>

    <div class="container">
        <div class="header">
            <h2>InventoFlow</h2>
            <p>Please login to continue</p>
        </div>
        <form action="" method="post" class="form">
            <input type="text" name="username" placeholder="Username" required />
            <input type="password" name="password" placeholder="Password" required />
            <input type="submit" class="submit-btn" name="Login" value="Login" />
        </form>
    </div>


    <?php
    if (isset($_POST["Login"])) { //user has clicked the login button
        //get user input
        $username = $_POST['username'];
        $password = $_POST['password'];
        //check if username and password are valid
        if ($password != "K7~wuT}E" || $username != "root") { //**change this to whatever our DB username and password is**
            exit("<p class='login-error'>Login failed. Incorrect username or password.</p>");
        };
        //successful login, set session variable
        session_start();
        $_SESSION["user"] = $username;

        //database assets
        $host = ''; //**CHANGE TO OUR SERVER NAME**
        $db = 'cp476';

        //establish SQL connection
        $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
        try {
            $conn = new PDO($dsn, $username, $password);
            //turn on error exceptions
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // save database connection parametes in a session
            $_SESSION['db_host'] = 'localhost';
            $_SESSION['db_user'] = $username;
            $_SESSION['db_pass'] = $password;
            $_SESSION['db_name'] = 'cp476';
            echo "Connection successful.";
        } catch (PDOException $e) {
            error_log($e->getMessage());
            $error_msg = $e->getMessage();
            echo "<br><p class='connection-error'>$error_msg</p>";
            exit("<p class='connection-error'>Failed to connect to the database. Please contact the administrator.</p>");
        }
        //redirect user to dashboard
        header("location: ../pages/dashboard.php?status=loggedIn");
    }
    ?>
</body>

</html>