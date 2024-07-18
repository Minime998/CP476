<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../styles/main.css" />
  <link rel="stylesheet" href="../styles/search.css" />
  <title>Search Inventory</title>
</head>

<body>
  <div class="container">
    <button class="home-btn"><a href="dashboard.php">Home</a></button>
    <div class="form-container">
      <h2>Search Inventory</h2>
      <form action="" method="post" class="form">
        <input type="text" class="input-field" name="product-name" placeholder="Product Name" required />
        <input type="submit" class="submit-btn" name="submit" value="Search" />
      </form>
    </div>
    <div class="search-results">
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
          exit;
      }

      if (isset($_POST["submit"])) {
        $productName = $_POST["product-name"];
        $query = "SELECT * FROM inventory WHERE product_name LIKE :productName";
        $statement = $conn->prepare($query);
        $productName = "%$productName%";
        $statement->bindParam(':productName', $productName, PDO::PARAM_STR);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        if (count($results) > 0) {
            echo "<h3>Search Results</h3>";
            echo "<table>
                    <tr>
                      <th>Product ID</th>
                      <th>Product Name</th>
                      <th>Quantity</th>
                      <th>Price</th>
                      <th>Status</th>
                      <th>Supplier Name</th>
                    </tr>";
            foreach ($results as $row) {
                echo "<tr>
                        <td>{$row['product_id']}</td>
                        <td>{$row['product_name']}</td>
                        <td>{$row['quantity']}</td>
                        <td>{$row['price']}</td>
                        <td>{$row['status']}</td>
                        <td>{$row['supplier_name']}</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<h3 class='no-results'>No Product Found</h3>";
        }
      }
      ?>
    </div>
  </div>
</body>

</html>
