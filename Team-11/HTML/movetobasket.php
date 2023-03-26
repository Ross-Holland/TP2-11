<?php
require 'connect.php';
$sql1 = "INSERT INTO cart (product_id) SELECT product_id FROM wishlist";
mysqli_query($conn, $sql1);

$sql = "TRUNCATE TABLE wishlist";
mysqli_query($conn, $sql);
echo "<script> alert(\"Added all items to the basket!\") </script>";
echo "<script>setTimeout(function(){ window.location.href = 'basket.php'; }, 2);</script>";

// header('Location: wishlist.php');
?>