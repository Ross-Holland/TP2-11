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
            <h1>Shop Football Boots</h1>
            <hr>

            <?php
                $query = "SELECT * FROM products WHERE category=6";
                $result = $conn->query($query);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $name = $row['name'];
                        $price = $row['price'];
                        $image = $row['image'];

                        echo " <div class='gallery'>
                        <div class='products'>
                            <img src='../Images/$image' alt='$name'>
                            <h3>$name</h3>
                            <h6>$price</h6>
                            <button class='view' name='view'>View Now</button>
                        </div>
                        ";
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

