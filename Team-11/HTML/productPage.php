<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 

require_once 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Product Page</title>
    <link rel = "stylesheet" href = "../css/productPage1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<?php include('header.php');  ?>

    <ul class="navbar">
        <li><a href="">Home</a></li>

        <li class="dropdown">
            <a href="" class="dropbtn">Products</a>
            <div class="dropdown-content">
                <?php
                include('connect.php');
                
                    $sql = "SELECT * FROM categories";
                    $result = $conn->query($sql);

                    // Process the query results
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo '<a href="">'.$row["category_title"].'</a>';
                        }
                    } else {
                        echo "0 results";
                    }
                ?>
        </li>
   
        <li><a href="">Contact</a></li>
        <li><a href="">About</a></li>
        <div>
    </ul>

    <div class = "wrapper">
        <div class = "container">
            <div class = "header">
                <h1>Men's</h1>
            </div>


            <div class="products">
            <div class="product-container">
                <?php
                    include('connect.php');
                    $sql = "SELECT * FROM products";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $image = base64_encode($row['product_image']);
                            $title = $row['product_title'];
                            $price = $row['product_price'];
                            echo '<div class="product-item">
                                        <div class="product-img">
                                        <img src="data:image/jpg;base64,'.$image.'">
                                            <div>
                                                <button type="button" class="cart-btn">Add to Cart</button>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="item-name">'.$title.'</a>
                                            <span class="price">£ '.$price.'</span>
                                            <div>
                                                <ul class="rating">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star-half-alt"></i></li>
                                                    <li>(70 reviews)</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>';

                                }
                            } else {
                                echo "0 results";
                            }
                        ?>
                        
                </div>
            </div>
        </div>
    </div>


</body>

</html>