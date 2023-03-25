<?php
require_once('connect.php');

$category = "";
if (isset($_GET['category'])) {
    $category = $_GET['category'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="../CSS/womens.css" />
    <link rel="stylesheet" href="../CSS/womensproducts.css">
</head>

<body>
    <?php include('header.php');  ?>

    <div class="content">
        <main>

            <hr>
            <h1>Shop Womens</h1>
            <hr>

            <?php if (!isset($_GET['category'])) { ?>

                <div class="category">
                    <div class="category">
                        <img src="../Images/boots-w.jpg" alt="boots" />
                        <button class="centered" onclick="document.location='womens.php?category=1'">Boots</button>
                    </div>
                    <div class="category">
                        <img src="../Images/heals-w.jpg" alt="heals" />
                        <button class="centered" onclick="document.location='womens.php?category=2'">Heels</button>
                    </div>
                    <div class="category">
                        <img src="../Images/flats-w.jpg" alt="flats" />
                        <button class="centered" onclick="document.location='womens.php?category=3'">Flats</button>
                    </div>
                    <div class="category">
                        <img src="../Images/trainers-w.jpg" alt="trainers" />
                        <button class="centered" onclick="document.location='womens.php?category=4'">Trainers</button>
                    </div>
                    <div class="category">
                        <img src="../Images/sandals-w.jpg" alt="sandals" />
                        <button class="centered" onclick="document.location='womens.php?category=5'">Sandals</button>
                    </div>
                </div>

            <?php } ?>


            <?php if (isset($_GET['category'])) { ?>
                <button class=" back" onclick="history.back()">Browse other products</button>
            <?php } ?>


            <?php
            if (isset($_GET['category'])) {
                if ($category == '1') {
                    $query = "SELECT * FROM products WHERE category=$category";
                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $name = $row['name'];
                            $price = $row['price'];
                            $image = $row['image'];
                            $id = $row['id'];

                            echo " <div class='gallery'>
                    <div class='products'>
                        <img src='../Images/$image' alt='$name'>
                        <h3>$name</h3>
                        <h6>£$price</h6>
                        <button class='view' onclick=document.location='viewproducts.php?id=$id'>View Now</button>
                    </div>
                    </div>";
                        }
                    }
                }

                if ($category == '2') {
                    $query = "SELECT * FROM products WHERE category=$category";
                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $name = $row['name'];
                            $price = $row['price'];
                            $image = $row['image'];
                            $id = $row['id'];

                            echo " <div class='gallery'>
                    <div class='products'>
                        <img src='../Images/$image' alt='$name'>
                        <h3>$name</h3>
                        <h6>£$price</h6>
                        <button class='view' onclick=document.location='viewproducts.php?id=$id'>View Now</button>
                    </div>
                    </div>";
                        }
                    }
                }

                if ($category == '3') {
                    $query = "SELECT * FROM products WHERE category=$category";
                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $name = $row['name'];
                            $price = $row['price'];
                            $image = $row['image'];
                            $id = $row['id'];

                            echo " <div class='gallery'>
                    <div class='products'>
                        <img src='../Images/$image' alt='$name'>
                        <h3>$name</h3>
                        <h6>£$price</h6>
                        <button class='view' onclick=document.location='viewproducts.php?id=$id'>View Now</button>
                    </div>
                    </div>";
                        }
                    }
                }

                if ($category == '4') {
                    $query = "SELECT * FROM products WHERE category=$category";
                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $name = $row['name'];
                            $price = $row['price'];
                            $image = $row['image'];
                            $id = $row['id'];

                            echo " <div class='gallery'>
                    <div class='products'>
                        <img src='../Images/$image' alt='$name'>
                        <h3>$name</h3>
                        <h6>£$price</h6>
                        <button class='view' onclick=document.location='viewproducts.php?id=$id'>View Now</button>
                    </div>
                    </div>";
                        }
                    }
                }

                if ($category == '5') {
                    $query = "SELECT * FROM products WHERE category=$category";
                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $name = $row['name'];
                            $price = $row['price'];
                            $image = $row['image'];
                            $id = $row['id'];

                            echo " <div class='gallery'>
                    <div class='products'>
                        <img src='../Images/$image' alt='$name'>
                        <h3>$name</h3>
                        <h6>£$price</h6>
                        <button class='view' onclick=document.location='viewproducts.php?id=$id'>View Now</button>
                    </div>
                    </div>";
                        }
                    }
                }
            }
            ?>

        </main>
    </div>

</body>

</html>

<?php
include('footer.php');
?>