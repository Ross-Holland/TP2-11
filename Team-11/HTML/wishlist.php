<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="../CSS/wishlist-basket.css" />
</head>

<body>
    <?php include('header.php');
    ?>

    <div class="content">
        <main>

            <div class="wishlist-message">
                <hr>
                <h1>WishList</h1>
                <hr>
                <p>You have no saved items</p>
            </div>

            <br>
            <h2>Explore Now</h2>

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