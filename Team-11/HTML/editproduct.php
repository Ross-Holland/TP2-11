<link rel="stylesheet" href="../CSS/edituser.css"><?php
require 'connect.php';

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM products WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $product = mysqli_fetch_assoc($result);
} else {
    echo "<script> alert(\"Product ID not specified.\") </script>";
    echo "<script>setTimeout(function(){ window.location.href = 'adminprodcut.php'; }, 2);</script>";

}
if ($product) {
    echo "<h1>Edit User</h1>";
    echo "<form action='updateproduct.php' method='post' enctype='multipart/form-data'>";
    echo "<input type='hidden' name='id' value='".$product['id']."'>";
    echo "<label>Name:</label><input type='text' name='name' value='".$product['name']."' required><br>";
    echo "<label>Description:</label><input type='text' name='description' value='".$product['description']."' required><br>";
    echo "<label>Category:</label><input type='text' name='category' value='".$product['category']."' required><br>";
    echo "<label>Quantity:</label><input type='text' name='quantity' value='".$product['quantity']."' required><br>";
    echo "<label>Price:</label><input type='text' name='price' value='£".$product['price']."' required><br>";
    echo "<label>Image:</label><input type='file' name='image' ><br>";
    echo "<img src='../images/".$product['image']."' height = 25% width=30% >";
    echo "<br><input type='submit' name='submit' value='Update Product'>";
    echo "</form>";
    if (isset($_POST['submit'])) {
        
        $image = $_FILES['image'];
        if ($image['error'] == UPLOAD_ERR_OK) {
            $filename = mysqli_real_escape_string($conn, $image['name']);
            $filedata = mysqli_real_escape_string($conn, file_get_contents($image['tmp_name']));
            $filetype = mysqli_real_escape_string($conn, $image['type']);
            $sql = "UPDATE products SET image_name='$filename', image_data='$filedata', image_type='$filetype' WHERE id='$id'";
            mysqli_query($conn, $sql);
        }
    }
 } else {
    echo "<script> alert(\"Product not found.\") </script>";
    echo "<script>setTimeout(function(){ window.location.href = 'adminproduct.php'; }, 2);</script>";
    }
?>