<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="css/wishlist-basket.css" />
</head>

<body>
    <?php include('header.php');
    ?>

    <div class="content">
        <main>

            <div class="basket-message">
                <hr>
                <h1>Basket</h1>
                <hr>
                <p>Your basket is empty</p>
            </div>

            <section id="shopnow">
                <div class="shopnow">
                    <img src="images/shopwomens.jpg" alt="womens" />
                    <div class="centered"><a href="womens.php"><button class="btn">Shop Now</button></a></div>
                </div>
                <div class="shopnow">
                    <img src="images/shopmens.jpg" alt="mens" />
                    <div class="centered"><a href="mens.php"><button class="btn">Shop Now</button></a></div>
                </div>
            </section>


        </main>
    </div>


</body>

</html>

<?php
include('footer.php');
?>