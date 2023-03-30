<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'connect.php';

$category = "";
if (isset($_GET['category'])) {
    $category = $_GET['category'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Product Page</title>
    <link rel = "stylesheet" href = "../CSS/productPage1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../CSS/products.css">

</head>

<body>
<?php include('header.php');  ?>

    <div class = "content">
<main>
            <div class = "header">
                <hr>
                <h1>Shop Kids</h1>
                <hr>
            </div>
        
    
<?php if (!isset($_GET['category'])) { ?>

<div class="category">
    <div class="category">
        <img src="../Images/kidsboots.jpg" alt="boots" />
        <button class="centered" onclick="document.location='productPagekids.php?category=14'">Kids Boots</button>
    </div>
    <div class="category">
        <img src="../Images/kidshightops.jpg" alt="high-tops" />
        <button class="centered" onclick="document.location='productPagekids.php?category=15'">High Tops</button>
    </div>
    <div class="category">
        <img src="../Images/kidsmartshoe.jpg" alt="kidsmartshoe" />
        <button class="centered" onclick="document.location='productPagekids.php?category=16'">smart shoes</button>
    </div>
    <div class="category">
        <img src="../Images/trainerskids.jpg" alt="trainers" />
        <button class="centered" onclick="document.location='productPagekids.php?category=17'">Trainers</button>
    </div>
    <div class="category">
        <img src="../Images/slipperskid.jpg" alt="slippers" />
        <button class="centered" onclick="document.location='productPagekids.php?category=18'">Slippers</button>
    </div>
</div>

<?php } ?>

        <?php if (isset($_GET['category'])) { ?>
            <button class="back" onclick="history.back()">Browse other products</button>
        <?php } ?>

        
                <?php 
                
                if (isset($_GET['category'])) {
                    if ($category == '12') {
                        $query = "SELECT * FROM products WHERE category=$category";
                        $result = $conn->query($query);
                        

    
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $name = $row['name'];
                                $price = $row['price'];
                                $image = $row['image'];
                                $id = $row['id'];
    
                                echo "<div class='gallery'>
                        <div class='products'>
                            <img src='../Images/$image' alt='$name'>
                            <h3>$name</h3>
                            <h6>$price</h6>
                            <button class='view' onclick=document.location='viewproducts.php?id=$id'>View Now</button>
                        </div>
                        </div>";
                            }
                        }
                        }
                        
                    } 
                            
                        ?>

                <?php 
                
                if (isset($_GET['category'])) {
                    if ($category == '13') {
                        $query = "SELECT * FROM products WHERE category=$category";
                        $result = $conn->query($query);
                        

    
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $name = $row['name'];
                                $price = $row['price'];
                                $image = $row['image'];
                                $id = $row['id'];
    
                                echo "<div class='gallery'>
                        <div class='products'>
                            <img src='../Images/$image' alt='$name'>
                            <h3>$name</h3>
                            <h6>$price</h6>
                            <button class='view' onclick=document.location='viewproducts.php?id=$id'>View Now</button>
                        </div>
                        </div>";
                            }
                        }
                        }
                        
                    } 
                            
                        ?>

                <?php 
                
                if (isset($_GET['category'])) {
                    if ($category == '14') {
                        $query = "SELECT * FROM products WHERE category=$category";
                        $result = $conn->query($query);
                        

    
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $name = $row['name'];
                                $price = $row['price'];
                                $image = $row['image'];
                                $id = $row['id'];
    
                                echo "<div class='gallery'>
                        <div class='products'>
                            <img src='../Images/$image' alt='$name'>
                            <h3>$name</h3>
                            <h6>$price</h6>
                            <button class='view' onclick=document.location='viewproducts.php?id=$id'>View Now</button>
                        </div>
                        </div>";
                            }
                        }
                        }
                        
                    } 
                            
                        ?>

                <?php 
                
                if (isset($_GET['category'])) {
                    if ($category == '15') {
                        $query = "SELECT * FROM products WHERE category=$category";
                        $result = $conn->query($query);
                        

    
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $name = $row['name'];
                                $price = $row['price'];
                                $image = $row['image'];
                                $id = $row['id'];
    
                                echo "<div class='gallery'>
                        <div class='products'>
                            <img src='../Images/$image' alt='$name'>
                            <h3>$name</h3>
                            <h6>$price</h6>
                            <button class='view' onclick=document.location='viewproducts.php?id=$id'>View Now</button>
                        </div>
                        </div>";
                            }
                        }
                        
                        }
                    } 
                            
                        ?>

                <?php 
                
                if (isset($_GET['category'])) {
                    if ($category == '16') {
                        $query = "SELECT * FROM products WHERE category=$category";
                        $result = $conn->query($query);
                        

    
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $name = $row['name'];
                                $price = $row['price'];
                                $image = $row['image'];
                                $id = $row['id'];
    
                                echo "<div class='gallery'>
                        <div class='products'>
                            <img src='../Images/$image' alt='$name'>
                            <h3>$name</h3>
                            <h6>$price</h6>
                            <button class='view' onclick=document.location='viewproducts.php?id=$id'>View Now</button>
                        </div>
                        </div>";
                            }
                            
                        }
                        
                    }
                    } 
                            
                        ?>
                         
                

        </div>
            
                    <main>
        </body>

        
</html>

<?php
include('footer.php');
?>