<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard</title>
  <link rel="stylesheet" href="../styles/main.css" />
  <link rel="stylesheet" href="../styles/dashboard.css" />
</head>

<body>
  <div class="container">
    <div class="header">
      <?php
      // session_start();
      // echo "<p class='current-user'/>Current User: " . $_SESSION['db_user'] . "</p>"
      ?>
      <h2>InventoFlow</h2>
      <p>What would you like to do?</p>
    </div>
    <div class="options">
      <div class="search-option option">
        <a href="search.php">Search Inventory</a>
      </div>
      <div class="update-option option">
        <a href="update.php">Update Product</a>
      </div>
      <div class="delete-option option">
        <a href="delete.php">Delete Product</a>
      </div>
    </div>
  </div>

</body>

</html>