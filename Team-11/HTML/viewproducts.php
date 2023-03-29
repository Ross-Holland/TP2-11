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

                <button class="back" onclick="history.back()">
                    << Back</button>


                        <form id="fulldetails" method="POST">

                            <div class="fulldetailsleft">
                                <div id="zoom">
                                    <img id="mainimage" src="../Images/<?php echo $image; ?>">
                                </div>
                                <img class="extraimage active" src="../Images/<?php echo $image; ?>">
                                <img class="extraimage" src="../Images/<?php echo $image1; ?>">
                                <img class="extraimage" src="../Images/<?php echo $image2; ?>">
                            </div>

                            <div class="fulldetailsright">
                                <h1><?php echo $name; ?></h1>
                                <h2>£<?php echo $price; ?></h2>
                                <p>Product Details:</p>
                                <p><?php echo nl2br($description); ?></p>
                                <p>Stock:<?php echo $quantity; ?></p>
                                <form method="post">
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
                                </form>
                                <div class="guide">
                                    <a class="btn" onclick="openPopup()">Size Guide</a>
                                    <div class="popup" id="popup">
                                        <div class="popup-content">
                                            <h2>Size guide</h2>
                                            <img src="../images/womensguide.jpg">
                                            <img src="../images/mensguide.jpg"> 
                                            <br>
                                            <a class="return" type="return" onclick="closePopup()">Return</a>
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <button class='basket' formaction="addToBasket.php"
                                    onclick=document.location='addToBasket.php?id=$id'>Add to Basket</button>
                                <button class='wishlist' formaction="addToWishlist.php"
                                    onclick=document.location='addToWishlist.php?id=$id'>Add to Wishlist</button>

                            </div>
                        </form>
            </main>
        </div>

    </body>

    <script>
    //Zoom in for main product image
    const zoom = document.getElementById("zoom");
    const mainimage = document.getElementById("mainimage");

    zoom.addEventListener("mousemove", (e) => {
        const x = e.clientX - e.target.offsetLeft;
        const y = e.clientY - e.target.offsetTop;

        console.log(x, y);

        mainimage.style.transformOrigin = `${x}px ${y}px`;
        mainimage.style.transform = "scale(2)"


    })
    zoom.addEventListener("mouseleave", () => {
        mainimage.style.transformOrigin = "center";
        mainimage.style.transform = "scale(1)";
    })


    //Displays multiple product images
    let extraimages = document.getElementsByClassName('extraimage')

    let activeImages = document.getElementsByClassName('active')

    for (var i = 0; i < extraimages.length; i++) {

        extraimages[i].addEventListener('mouseover', function() {
            console.log(activeImages)

            if (activeImages.length > 0) {
                activeImages[0].classList.remove('active')
            }

            this.classList.add('active')
            document.getElementById('mainimage').src = this.src
        })
    }

    //Size guide popup
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

</html>

<?php
include('footer.php');
?>