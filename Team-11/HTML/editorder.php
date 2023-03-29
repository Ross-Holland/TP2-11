<link rel="stylesheet" href="../CSS/editorder.css"><?php
require 'connect.php';

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM orders WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $order = mysqli_fetch_assoc($result);
} else {
    echo "<script> alert(\"ID not specified.\") </script>";
    echo "<script>setTimeout(function(){ window.location.href = 'adminorders.php'; }, 2);</script>";

}
if ($order) {
    echo "<h1>Edit Order</h1>";
    echo "<form action='updateorder.php' method='post'>";
    echo "<input type='hidden' name='id' value='".$order['id']."'>";
    echo "<label>Order status:</label><input type='text' name='orderstatus' pattern='[0-1]' title='Either 0 or 1' value='".$order['order_processed']."' required><br>";
    echo "<input type='submit' name='submit' value='Update order'>";
    echo "</form>";
 } else {
    echo "<script> alert(\"order not found.\") </script>";
    echo "<script>setTimeout(function(){ window.location.href = 'adminorders.php'; }, 2);</script>";
    }
?>