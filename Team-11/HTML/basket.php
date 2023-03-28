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

                <?php
                
                $cart = "SELECT * FROM cart";
                $result = $conn->query($cart);
                // $sizecart = "SELECT * FROM cart";
                // $result1 = $conn->query($sizecart);
                // $rowsize = mysqli_fetch_assoc($result1);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row_cart = mysqli_fetch_assoc($result)) {
                        $sql = "SELECT * FROM products WHERE id =" . $row_cart["product_id"];
                        $all_products = $conn->query($sql);
                        // $sql1 = "SELECT size FROM cart";
                        // $all_size = $conn->query($sql1);
                        while ($row = mysqli_fetch_assoc($all_products)) {
                            
                            $name = $row['name'];
                            $price = $row['price'];
                            $image = $row['image'];
                            $id = $row['id'];
                            $size = $row_cart['size'];
                            echo " <div class='gallery'>
                            <div class='products'>
                                <img src='../Images/$image' alt='$name'>
                                <h3>$name</h3>
                                <h3>$size</h3>
                                <h6>£$price</h6>
                                <form method='post' action='removeitem.php'><input type='hidden' name='id' value='" . $id . "'><button class= 'remove' type='submit'>Remove</button></form>
                                </div>
                        </div>";
                        }
                    
                    }
                } else {
                    echo "Nothing in basket";
                ?>

                <h4>Explore Now...</h4>

                <section id="shopnow">
                    <div class="shopnow">
                        <img src="../Images/shopwomens.jpg" alt="womens" />
                        <div class="centered"><a href="../HTML/productPage.php"><button class="btn">Shop
                                    Now</button></a></div>
                    </div>
                    <div class="shopnow">
                        <img src="../Images/shopmens.jpg" alt="mens" />
                        <div class="centered"><a href="../HTML/productPageMen.php"><button class="btn">Shop
                                    Now</button></a></div>
                    </div>
                </section>
                <?php
                }

                ?>
                <br>

                <?php
                if ($result->num_rows > 0) {
                ?> <button class="order" name="order" onclick="window.location.href='orderbutton.php';">Order
                    Now!</button> <?php
                                                                                                                }
                                                                                                                    ?>
            </div>


        </main>
    </div>


</body>

</html>

<?php
include('footer.php');
?>