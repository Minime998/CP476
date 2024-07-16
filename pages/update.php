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
                <input type="submit" name="submit" value="Update" />
            </form>
        </div>
        <div class="update-results">
            <h3>Message</h3>
            <?php
            # put all the php logic here for updating a product
            if (isset($_POST["submit"])) { //executes if user hits update button
                $id = $_POST["item_ID"];
                $product_name = $_POST["product_name"];
                $quantity = $_POST["quantity"];
                $price = $_POST["price"];
                $status = $_POST["status"];
                $query = "UPDATE product SET ";

                //reused from delete, TO BE EDITED
                $statement = conn->prepare($query);
                $statement->bindParam(':id',$id, PDO::PARAM_INT);
                $statement->execute();  
    
                //returns the # of affected rows (i.e. if a row is deleted)
                $success = 0;
                try{
                    $statement = conn->prepare($query);
                    $statement->execute($data);
                    if ($statement->rowCount() > 0) {
                        $results = 'successful';
                    }
                } catch (PDOException $e){
                    echo "Error:". $e->getMessage();
                }
             
                if ($results == 'successful') {
                    echo " <div class='successful-delete>
                        <p> Successfully updated product </p>                 
                    </div>";
                } else {
                    echo "<div class='failed-delete>
                        <p> Failed to update product. Product not found </p>                 
                    </div>";
                }
            }
            ?>
        </div>

    </div>
</body>

</html>
