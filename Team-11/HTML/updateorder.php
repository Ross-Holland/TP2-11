<?php
require 'connect.php';
$id = mysqli_real_escape_string($conn, $_POST['id']);
$order = mysqli_real_escape_string($conn, $_POST['orderstatus']);

$sql = "UPDATE orders SET order_processed = '$order' WHERE id = '$id'";
mysqli_query($conn, $sql);
echo "<script> alert(\"Order has been updated.\") </script>";
echo "<script>setTimeout(function(){ window.location.href = 'adminorders.php'; }, 2);</script>";

?>