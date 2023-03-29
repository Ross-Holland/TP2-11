<?php
require 'connect.php';

if (isset($_POST['submit'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);

    if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $tmp_name = $_FILES['image']['tmp_name'];
        $filename = basename($_FILES['image']['name']);
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $newfilename = uniqid().'.'.$extension;
        $destination = '../images/'.$newfilename;
        if (move_uploaded_file($tmp_name, $destination)) {
            
            $sql = "UPDATE products SET name='$name', description='$description', category='$category', quantity='$quantity', price='$price', image='$newfilename', image1='', image2='' WHERE id='$id'";
            mysqli_query($conn, $sql);
            echo "<script> alert(\"Product has been updated.\") </script>";
            echo "<script>setTimeout(function(){ window.location.href = 'adminproduct.php'; }, 2);</script>";
            
        } else {
            echo "Error uploading file";
        }
    } else {
        $sql = "UPDATE products SET name='$name', description='$description', category='$category', quantity='$quantity', price='$price' WHERE id='$id'";
        mysqli_query($conn, $sql);
        echo "<script> alert(\"Product has been updated.\") </script>";
        echo "<script>setTimeout(function(){ window.location.href = 'adminproduct.php'; }, 2);</script>";
        
    }
} else {
    echo "<script> alert(\"Error, returning to Products\") </script>";
    echo "<script>setTimeout(function(){ window.location.href = 'adminproduct.php'; }, 2);</script>";
}