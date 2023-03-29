<?php
require 'connect.php';

$id = mysqli_real_escape_string($conn, $_POST['user_id']);
$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$telephone = mysqli_real_escape_string($conn, $_POST['telephonenumber']);
$hpassword = md5($password);
if($password != 0){
    $sql = "UPDATE user SET user_firstname='$firstname', user_lastname = '$lastname', user_email = '$email', user_password = '$hpassword', user_address = '$address', telephone_number = '$telephone' WHERE user_id = '$id'";
    mysqli_query($conn, $sql);
    echo "<script> alert(\"User has been updated.\") </script>";
    echo "<script>setTimeout(function(){ window.location.href = 'profile.php'; }, 2);</script>";
}else{
    $sql = "UPDATE user SET user_firstname='$firstname', user_lastname = '$lastname', user_email = '$email', user_address = '$address', telephone_number = '$telephone' WHERE user_id = '$id'";
mysqli_query($conn, $sql);
echo "<script> alert(\"User has been updated.\") </script>";
echo "<script>setTimeout(function(){ window.location.href = 'profile.php'; }, 2);</script>";
}

?>