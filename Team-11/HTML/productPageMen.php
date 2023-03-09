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
    <link rel="stylesheet" href="../CSS/womensproducts.css">

</head>

<body>
<?php include('header.php');  ?>

    <div class = "container">
<main>
            <div class = "header">
                <hr>
                <h1>Shop Men's</h1>
                <hr>
            </div>
        
    
<?php if (!isset($_GET['category'])) { ?>

<div class="category">
    <div class="category">
        <img src="../Images/menboots.jpg" alt="boots" />
        <button class="centered" onclick="document.location='productPageMen.php?category=9'">Boots</button>
    </div>
    <div class="category">
        <img src="../Images/HighTops.jpg" alt="high-tops" />
        <button class="centered" onclick="document.location='productPageMen.php?category=10'">High Tops</button>
    </div>
    <div class="category">
        <img src="../Images/Lows.jpg" alt="lows" />
        <button class="centered" onclick="document.location='productPageMen.php?category=11'">Lows</button>
    </div>
    <div class="category">
        <img src="../Images/trainersmen.jpg" alt="trainers" />
        <button class="centered" onclick="document.location='productPageMen.php?category=4'">Trainers</button>
    </div>
    <div class="category">
        <img src="../Images/menslippers.jpg" alt="slippers" />
        <button class="centered" onclick="document.location='productPageMen.php?category=5'">Slippers</button>
    </div>
</div>

<?php } ?>

        <?php if (isset($_GET['category'])) { ?>
            <button class="back"><a href="productPageMen.php">Browse other products</a></button>
        <?php } ?>

        
                <?php 
                
                if (isset($_GET['category'])) {
                    if ($category == '9') {
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
                    if ($category == '10') {
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
                    if ($category == '11') {
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
                    if ($category == '4') {
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
                    if ($category == '5') {
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





