<?php
include ('connect.php');

$id = $_POST["id"];

// Remove the item from the database
$sql = "DELETE FROM cart WHERE product_id = $id";
if ($conn->query($sql) === TRUE) {
    echo "Item removed successfully";
} else {
    echo "Error removing item: " . $conn->error;
}
header("Location: basket.php");
exit();

?>