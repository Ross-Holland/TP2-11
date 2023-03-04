<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="../CSS/wishlist-basket.css" />
    <link rel="stylesheet" type="text/css" href="../CSS/viewproducts.css" />
</head>

<body>
    <?php include('header.php');
    ?>

    <div class="content">
        <main>
            <?php
            $id = $_GET['id'];

            require_once('connect.php');

            $query = "SELECT * FROM products WHERE id=$id";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $name = $row['name'];
                    $price = $row['price'];
                    $image = $row['image'];
                    $id = $row['id'];
                    $description = $row['description'];
                    $quantity = $row['quantity'];
                }
            }
            ?>

            <form id="fulldetails" action="" method="POST">
                <h1><?php echo $name; ?></h1>
                <h2>£<?php echo $price; ?></h2>
                <img src='../Images/<?php echo $image; ?>' alt='<?php echo $name; ?>'>
                <p><b><?php echo $description; ?></b></p>
                <p>Stock:<?php echo $quantity; ?></p>
            </form>

        </main>
    </div>


</body>

</html>

<?php
include('footer.php');
?>