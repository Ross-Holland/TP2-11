<!DOCTYPE html>
<html lang="en">
<div id="overlay">

    <head>
        <link rel="stylesheet" type="text/css" href="../CSS/wishlist-basket.css" />
        <link rel="stylesheet" type="text/css" href="../CSS/viewproducts.css" />
    </head>

    <body>
        <?php include('header.php');
        ?>

        <div class="content">
            <main>
                <?php
                $id = $_GET['id'];

                require_once('connect.php');

                $trun = "TRUNCATE TABLE viewproduct";
                $delete2 = mysqli_query($conn, $trun);

                $viewDB = "INSERT INTO viewproduct(id) VALUES($id)";
                $result5 =  $conn->query($viewDB);

                $pin = "SELECT * FROM products WHERE id=$id";
                $result = $conn->query($pin);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $name = $row['name'];
                        $price = $row['price'];
                        $image = $row['image'];
                        $id = $row['id'];
                        $description = $row['description'];
                        $quantity = $row['quantity'];
                        $image1 = $row['image1'];
                        $image2 = $row['image2'];
                    }
                }
                ?>

                <form id="fulldetails" method="POST">

                    <div class="fulldetails">
                        <div id="zoom">
                            <img id="featured" src="../Images/<?php echo $image; ?>">
                        </div>
                        <img class="thumbnail active" src="../Images/<?php echo $image; ?>">
                        <img class="thumbnail" src="../Images/<?php echo $image1; ?>">
                        <img class="thumbnail" src="../Images/<?php echo $image2; ?>">
                    </div>

                    <div class="fulldetails">
                        <h1><?php echo $name; ?></h1>
                        <h2>£<?php echo $price; ?></h2>
                        <p>Product Details:</p>
                        <p><?php echo nl2br($description); ?></p>
                        <p>Stock:<?php echo $quantity; ?></p>

                        <select name="size" id="size">
                            <option value="">Select Size</option>
                            <option value="UK 3">UK 3</option>
                            <option value="UK 3.5">UK 3.5</option>
                            <option value="UK 4">UK 4</option>
                            <option value="UK 4.5">UK 4.5</option>
                            <option value="UK 5">UK 5</option>
                            <option value="UK 5.5">UK 5.5</option>
                            <option value="UK 6">UK 6</option>
                            <option value="UK 6.5">UK 6.5</option>
                            <option value="UK 7">UK 7</option>
                            <option value="UK 7.5">UK 7.5</option>
                            <option value="UK 8">UK 8</option>
                        </select>

                        <div class="guide">
                            <button type="submit" class="btn" onclick="openPopup()">Size guide</button>
                            <div class="popup" id="popup">
                                <div class="popup-content">
                                    <h2>Size guide</h2>
                                    <img src="../images/sizeguide.jpg"> <br>
                                    <button type="done" onclick="closePopup()">Done</button>
                                </div>
                            </div>
                        </div>
                        <br>

                        <button class='view' formaction="addToBasket.php" onclick=document.location='addToBasket.php?id=$id'>Add to Basket</button>
                        <button class='view' formaction="addToWishlist.php" onclick=document.location='addToWishlist.php?id=$id'>Add to Wishlist</button>
                </form>


        </div>
</div>
</main>


</body>

</html>

<?php
include('footer.php');
?>


</div>


<script>
//Zoom in for main image
    const zoom = document.getElementById("zoom");
    const featured = document.getElementById("featured");

    zoom.addEventListener("mousemove", (e) => {
        const x = e.clientX - e.target.offsetLeft;
        const y = e.clientY - e.target.offsetTop;

        console.log(x, y);

        featured.style.transformOrigin = `${x}px ${y}px`;
        featured.style.transform = "scale(2)"


    })
    zoom.addEventListener("mouseleave", () => {
        featured.style.transformOrigin = "center";
        featured.style.transform = "scale(1)";
    })


//Displays multiple product images
    let thumbnails = document.getElementsByClassName('thumbnail')

    let activeImages = document.getElementsByClassName('active')

    for (var i = 0; i < thumbnails.length; i++) {

        thumbnails[i].addEventListener('mouseover', function() {
            console.log(activeImages)

            if (activeImages.length > 0) {
                activeImages[0].classList.remove('active')
            }

            this.classList.add('active')
            document.getElementById('featured').src = this.src
        })
    }
</script>

<script>
    let popup = document.getElementById("popup");
    let overlay = document.getElementById("overlay");

    function openPopup() {
        popup.classList.add("open-popup");
        popup.style.width = '100%';
    }

    function closePopup() {
        popup.classList.remove("open-popup");
        popup.style.width = '0%';
    }
</script>