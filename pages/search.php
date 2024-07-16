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
    <a href="dashboard.php">Home</a>
    <div class="search-form">
      <h2>Search Inventory</h2>
      <form action="" method="post">
        <input type="text" name="product-name" placeholder="Product Name" />
        <input type="submit" value="Search" />
      </form>
    </div>
    <div class="search-results">
      <h3>Search Results</h3>
      <?php
      # put all the php logic here for searching

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