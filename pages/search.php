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
        <input type="submit" class="submit-btn" value="Search" />
      </form>
    </div>
    <div class="search-results">
      <h3>Sample Search Results</h3>
      <?php
      # put all the php logic here for searching
      session_start();

      $results = 5;
      #this is the table that will show all the search results
      if ($results != 0) {
        echo " <table>
                  <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Supplier Name</th>
                  </tr>
                  <tr>
                    <td>1234</td>
                    <td>Tv</td>
                    <td>200</td>
                    <td>$1222</td>
                    <td>A</td>
                    <td>Samsung</td>
                  <tr>
                  <tr>
                    <td>1234</td>
                    <td>Tv</td>
                    <td>200</td>
                    <td>$1222</td>
                    <td>A</td>
                    <td>Samsung</td>
                  <tr>
                  <tr>
                    <td>1234</td>
                    <td>Tv</td>
                    <td>200</td>
                    <td>$1222</td>
                    <td>A</td>
                    <td>Samsung</td>
                  <tr>
                  <tr>
                    <td>1234</td>
                    <td>Tv</td>
                    <td>200</td>
                    <td>$1222</td>
                    <td>A</td>
                    <td>Samsung</td>
                  <tr>
                  </table>";
      } else {
        echo "<h3 class='no-results'>No Product Found</h3>";
      }
      ?>

    </div>

  </div>
</body>

</html>