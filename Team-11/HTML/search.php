<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="../CSS/wishlist-basket.css" />
    <link rel="stylesheet" href="../CSS/products.css">
</head>

<body>
    <?php
    include('header.php');
    require_once('connect.php');

    if (isset($_POST['search'])) {
        $valueToSearch = $_POST['valueToSearch']; {
            if (isset($_POST['LowToHigh'])) {
                $query = "SELECT * FROM products WHERE CONCAT(name, image, description, price) LIKE '%$valueToSearch%' ORDER BY price ASC";
                $result = $conn->query($query);
            } else if (isset($_POST['HighToLow'])) {
                $query = "SELECT * FROM products WHERE CONCAT(name, image, description, price) LIKE '%$valueToSearch%' ORDER BY price DESC";
                $result = $conn->query($query);
            } else if (isset($_POST['Newest'])) {
                $query = "SELECT * FROM products WHERE CONCAT(name, image, description, price) LIKE '%$valueToSearch%' ORDER BY id DESC";
                $result = $conn->query($query);
            } else {
                $query = "SELECT * FROM products WHERE CONCAT(name, image, description, price) LIKE '%$valueToSearch%'";
                $result = $conn->query($query);
            }
        }
    } else {
        if (isset($_POST['LowToHigh'])) {
            $query = "SELECT * FROM products ORDER BY price ASC";
            $result = $conn->query($query);
        } else if (isset($_POST['HighToLow'])) {
            $query = "SELECT * FROM products ORDER BY price DESC";
            $result = $conn->query($query);
        } else if (isset($_POST['Newest'])) {
            $query = "SELECT * FROM products  ORDER BY id DESC";
            $result = $conn->query($query);
        } else {
            $query = "SELECT * FROM products";
            $result = $conn->query($query);
        }
    }


    ?>

    <div class="content">
        <main>
            <div class="searchprodcuts">
                <h6>Search products</h6><br>
                <form action="" method="post">
                    <input type="text" name="valueToSearch" placeholder="Search..." size="50"><br><br>
                    <input type="radio" name="Newest" value="Newest"> Newest
                    <input type="radio" name="LowToHigh" value="Price: Low-High "> Price: Low-High
                    <input type="radio" name="HighToLow" value="Price: High-Low"> Price: High-Low
                    <br><br>
                    <input type="submit" name="search" class="filter" value="Filter">

                </form>
            </div>

            <?php if ($result->num_rows > 0) {
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

            ?>


        </main>

    </div>
</body>

</html>

<?php
include('footer.php');
?>