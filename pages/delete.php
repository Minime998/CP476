<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../styles/main.css" />
    <link rel="stylesheet" href="../styles/delete.css" />
    <title>Search Inventory</title>
</head>

<body>
    <div class="container">
        <button class="home-btn"><a href="dashboard.php">Home</a></button>
        <div class="form-container">
            <h2>Delete Product</h2>
            <form action="" method='post' class="form">
                <input type="number" class="input-field" name="item_ID" placeholder="Item ID" required min="1" />
                <input type="submit" class="submit-btn" name="submit" value="Delete" />
            </form>
        </div>
        <div class="query-results">
            <h3>Message:</h3>

            <?php
            // Open database connection
            session_start();
            $conn = null;
            if (isset($_SESSION['db_host'], $_SESSION['db_user'], $_SESSION['db_pass'], $_SESSION['db_name'])) {
                $dsn = "mysql:host=" . $_SESSION['db_host'] . ";dbname=" . $_SESSION['db_name'] . ";charset=utf8mb4";
                $username = $_SESSION['db_user'];
                $password = $_SESSION['db_pass'];
                try {
                    $conn = new PDO($dsn, $username, $password);
                    //turn on error exceptions
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    // echo "Connection successful.";
                } catch (PDOException $e) {
                    error_log($e->getMessage());
                    $error_msg = $e->getMessage();
                    echo "<br><p class='connection-error'>$error_msg</p>";
                    exit("<p class='connection-error'>Failed to connect to the database. Please contact the administrator.</p>");
                }
            } else {
                // in case the database connection parameter were not store in a session redirect user back to login page
                echo "Database connection parameter are not set in the session";
                header("location: ../pages/login.php?error=sessin_error");
            }

            # put all the php logic here for deleting a product
            if (isset($_POST["submit"])) { //executes if user hits delete button
                $id = $_POST["item_ID"];
                $query = "DELETE FROM inventory where Item_ID= :id";

                try {
                    $statement = $conn->prepare($query);
                    $statement->bindParam(':id', $id, PDO::PARAM_INT);
                    $statement->execute();

                    //returns the # of affected rows (i.e. if a row is deleted)
                    $results = 'failed';
                    if ($statement->rowCount() >= 1) {
                        $results = 'successful';
                    }

                    if ($results == 'successful') {
                        echo " <div class='successful-query'>
                            <p> Successfully deleted product </p>                 
                        </div>";
                    } else {
                        echo "<div class='failed-query'>
                            <p> Failed to delete product. Product not found </p>                 
                            </div>";
                    }
                } catch (PDOException $e) {
                    echo "<div class='failed-update'><p>Something went wrong. Error: " . $e->getMessage() . "</p></div>";
                }
            }
            ?>
        </div>

    </div>
    <script src="../js/delete.js"></script>
</body>

</html>