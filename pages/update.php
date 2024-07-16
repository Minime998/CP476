<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../styles/main.css" />
    <link rel="stylesheet" href="../styles/update.css" />
    <title>Update Product</title>
</head>

<body>
    <div class="container">
        <button class="home-btn"><a href="dashboard.php">Home</a></button>
        <div class="form-container">
            <h2>Update Product</h2>
            <form action="" method='post' class="form update-form">
                <input type="text" class="input-field" name="item_ID" placeholder="Item ID" required numeric />
                <input type="text" class="input-field" name="product_name" placeholder="Product Name" required />
                <input type="text" class="input-field" name="quantity" placeholder="Quantity" required />
                <input type="text" class="input-field" name="price" placeholder="Price" required />
                <input type="text" class="input-field" name="status" placeholder="Status" required />
                <input type="submit" class="submit-btn" name="submit" value="Update" required />
            </form>
        </div>
        <div class="query-results">
            <h3>Messages:</h3>
            <?php
            # put all the php logic here for updating a product
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
            if (isset($_POST["submit"])) { //executes if user hits update button
                $id = $_POST["item_ID"];
                $product_name = $_POST["product_name"];
                $quantity = $_POST["quantity"];
                $price = $_POST["price"];
                $status = $_POST["status"];
                $query = "UPDATE product SET ";

                //reused from delete, TO BE EDITED
                $statement = $conn->prepare($query);
                $statement->bindParam(':id', $id, PDO::PARAM_INT);
                $statement->execute();

                //returns the # of affected rows (i.e. if a row is deleted)
                $success = 0;
                try {
                    $statement = $conn->prepare($query);
                    $statement->execute($data);
                    if ($statement->rowCount() > 0) {
                        $results = 'successful';
                    }
                } catch (PDOException $e) {
                    echo "Something went wrong";
                    echo "Error:" . $e->getMessage();
                }

                if ($results == 'successful-query') {
                    echo " <div class='successful-delete>
                        <p> Successfully updated product </p>                 
                    </div>";
                } else {
                    echo "<div class='failed-query>
                        <p> Failed to update product. Product not found </p>                 
                    </div>";
                }
            }
            ?>
        </div>

    </div>
    <script src="../js/delete.js"></script>
</body>

</html>