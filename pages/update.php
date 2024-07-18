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
                <input type="number" class="input-field" name="item_ID" placeholder="Item ID" required />
                <input type="text" class="input-field" name="product_name" placeholder="Product Name" required />
                <input type="number" class="input-field" name="quantity" placeholder="Quantity" required />
                <input type="number" class="input-field" name="price" placeholder="Price" required step="0.01" />
                <input type="text" class="input-field" name="status" placeholder="Status" required />
                <input type="submit" class="submit-btn" name="submit" value="Update" />
            </form>
        </div>
        <div class="query-results">
            <h3>Messages:</h3>
            <?php
            session_start();
            $conn = null;
            if (isset($_SESSION['db_host'], $_SESSION['db_user'], $_SESSION['db_pass'], $_SESSION['db_name'])) {
                $dsn = "mysql:host=" . $_SESSION['db_host'] . ";dbname=" . $_SESSION['db_name'] . ";charset=utf8mb4";
                $username = $_SESSION['db_user'];
                $password = $_SESSION['db_pass'];
                try {
                    $conn = new PDO($dsn, $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $e) {
                    error_log($e->getMessage());
                    $error_msg = $e->getMessage();
                    echo "<br><p class='connection-error'>$error_msg</p>";
                    exit("<p class='connection-error'>Failed to connect to the database. Please contact the administrator.</p>");
                }
            } else {
                echo "Database connection parameters are not set in the session";
                header("location: ../pages/login.php?error=session_error");
            }
            if (isset($_POST["submit"])) {
                $id = $_POST["item_ID"];
                $product_name = $_POST["product_name"];
                $quantity = $_POST["quantity"];
                $price = $_POST["price"];
                $status = $_POST["status"];
                
                $query = "UPDATE product SET product_name = :product_name, quantity = :quantity, price = :price, status = :status WHERE item_ID = :id";
                
                try {
                    $statement = $conn->prepare($query);
                    $statement->bindParam(':id', $id, PDO::PARAM_INT);
                    $statement->bindParam(':product_name', $product_name, PDO::PARAM_STR);
                    $statement->bindParam(':quantity', $quantity, PDO::PARAM_INT);
                    $statement->bindParam(':price', $price, PDO::PARAM_STR);
                    $statement->bindParam(':status', $status, PDO::PARAM_STR);
                    $statement->execute();

                    if ($statement->rowCount() > 0) {
                        echo "<div class='successful-update'><p>Successfully updated product</p></div>";
                    } else {
                        echo "<div class='failed-update'><p>Failed to update product. Product not found</p></div>";
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
