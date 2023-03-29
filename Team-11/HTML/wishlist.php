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

            <div class="wishlist">
                <hr>
                <h1>WishList</h1>
                <hr>

                <?php
                $wishlist = "SELECT * FROM wishlist";
                $result = $conn->query($wishlist);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row_wishlist = mysqli_fetch_assoc($result)) {
                        $sql = "SELECT * FROM products WHERE id =" . $row_wishlist["product_id"];
                        $all_products = $conn->query($sql);
                        while ($row = mysqli_fetch_assoc($all_products)) {
                            $name = $row['name'];
                            $price = $row['price'];
                            $image = $row['image'];
                            $id = $row['id'];
                            $size = $row_wishlist['size'];

                            echo " <div class='gallery'>
                        <div class='products'>
                            <img src='../Images/$image' alt='$name'>
                            <h3>$name</h3>
                            <h3>$size</h3>
                            <h6>£$price</h6>
                            <form method='post' action='removeitemw.php'><input type='hidden' name='id' value='" . $id . "'><button class= 'remove' type='submit'>Remove</button></form> 
                            <button onclick=\"window.location.href = 'movetobasket.php';\">Add to Basket!</button>
                            </div>
                    </div>";
                        }
                    }
                } else {
                    echo "Nothing in wishlist";
                ?>

                    <h4>Explore Now...</h4>

                    <section id="shopnow">
                        <div class="shopnow">
                            <img src="../Images/shopwomens.jpg" alt="womens" />
                            <div class="centered"><a href="../HTML/womens.php"><button class="btn">Shop Now</button></a></div>
                        </div>
                        <div class="shopnow">
                            <img src="../Images/shopmens.jpg" alt="mens" />
                            <div class="centered"><a href="../HTML/productPageMen.php"><button class="btn">Shop Now</button></a></div>
                        </div>
                    </section>
                <?php
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