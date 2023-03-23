<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="../CSS/wishlist-basket.css" />
</head>

<body>
    <?php 
    include('header.php');
    include('connect.php');
    ?>

    <div class="content">
        <main>

            <div class="basket">
                <hr>
                <h1>Basket</h1>
                <hr>
                <h1>Basket</h1>
                <table>
                    <tr>
                        <th>Item ID</th>
                        <th>Item Name</th>
                        <th>Item Price</th>
                        <th>Item Image</th>
                        <th>Remove</th>
                    </tr>

                    <?php
                    $cart = "SELECT * FROM cart";
                    $result = $conn->query($cart);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row_cart = mysqli_fetch_assoc($result)){
                            $sql = "SELECT * FROM products WHERE id =".$row_cart["product_id"];
                            $all_products = $conn->query($sql);
                            while($row = mysqli_fetch_assoc($all_products)){
                            echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td>" . $row["price"]. "</td><td>" . $row["image"]. "</td><td> <form method='post' action='removeitem.php'><input type='hidden' name='id' value='" . $row["id"]. "'><button type='submit'>Remove</button></form></td></tr>";
                        }
                    }
                    } else {
                        echo "Nothing in basket";
                    }
                    
                    ?>
                </table>
                
            </div>

            <section id="shopnow">
                <div class="shopnow">
                    <img src="../Images/shopwomens.jpg" alt="womens" />
                    <div class="centered"><a href="../HTML/productPage.php"><button class="btn">Shop Now</button></a></div>
                </div>
                <div class="shopnow">
                    <img src="../Images/shopmens.jpg" alt="mens" />
                    <div class="centered"><a href="../HTML/productPageMen.php"><button class="btn">Shop Now</button></a></div>
                </div>
            </section>


        </main>
    </div>


</body>

</html>

<?php
include('footer.php');
?>