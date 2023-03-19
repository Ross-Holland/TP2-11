<?php 

require 'connect.php';

session_start();
session_destroy();

$trun1 = "TRUNCATE TABLE cart";
$trun2 = "TRUNCATE TABLE wishlist";
$delete1 = mysqli_query($conn, $trun1);
$delete2 = mysqli_query($conn, $trun2);

header("Location: index.php");
?>