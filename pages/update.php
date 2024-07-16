<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../styles/main.css" />
    <link rel="stylesheet" href="../styles/update.css" />
    <title>Search Inventory</title>
</head>

<body>
    <div class="container">
        <a href="dashboard.php">Home</a>
        <div class="update-form">
            <h2>Update Product</h2>
            <form action="" method='post'>
                <input type="text" name="item_ID" placeholder="Item ID" />
                <input type="text" name="product_name" placeholder="Product" />
                <input type="text" name="quantity" placeholder="Quantity" />
                <input type="text" name="price" placeholder="Price" />
                <input type="text" name="status" placeholder="Status" />
                <input type="submit" value="Update" />
            </form>
        </div>
        <div class="update-results">
            <h3>Message</h3>
            <?php
            # put all the php logic here for updating a product

            # variable $result will be whatever PDO return on update query
            $results = 'successful';

            if ($results == 'successful') {
                echo " <div class='successful-update>
                    <p> Successfully updated product </p>                 
                </div>";
            } else {
                echo "<div class='failed-update>
                    <p> Failed to update product. Product not found </p>                 
                </div>";
            }
            ?>
        </div>

    </div>
</body>

</html>