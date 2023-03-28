<?php
require 'connect.php';
session_start();
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM cart";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    while($row_cart = mysqli_fetch_assoc($result)){
        $sql = "SELECT * FROM products WHERE id =". $row_cart["product_id"];
        $all_products = $conn->query($sql);
        while($row = mysqli_fetch_assoc($all_products)){
            $product_id = $row['id'];
            $product_name = $row['name'];
            $product_desc = $row['description'];
            $product_price = $row['price'];
            $product_image = $row['image'];
            $size = $row_cart['size'];
            $date = date('d-m-Y');

            $sql1 = "INSERT INTO orders (user_id, product_id, product_name, product_description, product_price, product_image, size, date, order_processed) VALUES ('$user_id', '$product_id', '$product_name', '$product_desc', '$product_price', '$product_image', '$size', '$date', '0')";
            mysqli_query($conn, $sql1);

            
        }
    }
}

$sql = "TRUNCATE TABLE cart";
mysqli_query($conn, $sql);

echo "<script> alert(\"Your items have been ordered, they are now being processed!\") </script>";
echo "<script>setTimeout(function(){ window.location.href = 'basket.php'; }, 2);</script>";
?>