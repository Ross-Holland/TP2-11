<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="../CSS/wishlist-basket.css" />
    <link rel="stylesheet" href="../CSS/womensproducts.css">
</head>

<body>
    <?php
    include('header.php');
    require_once('connect.php');

    if (isset($_POST['search'])) {
        $valueToSearch = $_POST['valueToSearch'];
        $query = "SELECT * FROM products WHERE CONCAT(name, image) LIKE '%$valueToSearch%'";
        $result = $conn->query($query);
    } else {
        $query = "SELECT * FROM products";
        $result = $conn->query($query);
    }

    ?>

    <div class="content">
        <main>
            <div class="searchprodcuts">
                <h4>Search products</h4>
                <form action="" method="post">
                    <input type="text" name="valueToSearch" placeholder="Search" size="37"><br><br>
                    <input type="submit" name="search" value="Search"><br><br>
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