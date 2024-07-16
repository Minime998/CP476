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
        <a href="dashboard.php">Home</a>
        <div class="delete-form">
            <h2>Delete Product</h2>
            <form action="" method='post'>
                <input type="text" name="item_ID" placeholder="Item ID" />
                <input type="submit" name="submit" value="Delete" />
            </form>
        </div>
        <div class="delete-results">
            <h3>Message</h3>

            <?php
            # put all the php logic here for deleting a product
            if (isset($_POST["submit"])) { //executes if user hits delete button
                $id = $_POST["item_ID"];
                $query = "DELETE FROM product where product_ID= :id";
                $statement = conn->prepare($query);
                $statement->bindParam(':id',$id, PDO::PARAM_INT);
                $statement->execute();  
    
                //returns the # of affected rows (i.e. if a row is deleted)
                if ($statement->rowCount()>=1){
                    $results = 'successful';
                }
    
                if ($results == 'successful') {
                    echo " <div class='successful-delete>
                        <p> Successfully deleted product </p>                 
                    </div>";
                } else {
                    echo "<div class='failed-delete>
                        <p> Failed to delete product. Product not found </p>                 
                    </div>";
                }
            }
            ?>
        </div>

    </div>
</body>

</html>
