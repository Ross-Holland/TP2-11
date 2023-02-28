<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Mono" rel="stylesheet">
    <link rel="stylesheet" href="../css/hpstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>STEP CORRECT</title>
    <style>
        .fa {
            padding: 20px;
            text-align: center;
            margin: 5px 2px;
            font-size: 30px;
            width: 50px;
        }
        
        .fa-facebook {
            background: #3B5998;
            color: white;
        }
        
        .fa-twitter {
            background: #55ACEE;
            color: white;
        }
        
        .fa-instagram {
            background: #881212;
            color: white;
        }
        
        .fa:hover {
            opacity: 0.9;
        }
    </style>

</head>

<body>

    <header>
        <!-- <img class="logo" src="..images/logo1.png" alt="Logo"> -->
        <!-- <div class="search-container">
            <input type="text" placeholder="Search sneakers">
            <button type="submit">Search</button>
        </div> -->
        <!-- Navigation Bar -->
        <!-- <div class="navbar navbar-default">
            <ul>
                <li><a style="color: lightblue;" href="#">HOME</a></li>
                <li><a style="color: lightblue;" href="#products">BRANDS</a></li>
                <li><a style="color: lightblue;" href="#about">ABOUT</a></li>
                <li><a style="color: lightblue;" href="#contact">CONTACT US</a></li>
            </ul>
        </div>

        <div style="float: right;">
            <h2>United Kingdom | English(UK) | $GBP</h2>
            <a href="#" class="fa fa-facebook"></a>
            <a href="#" class="fa fa-twitter"></a>
            <a href="#" class="fa fa-instagram"></a>

        </div> -->
        <?php
            include_once "header.php";
        ?>
    </header>

    <!-- Banner -->
    <div class="banner">
        <h1>STEP CORRECT</h1>
    <!-- </div>
    <div class="section">
        <div class="section1">
            <div class="img-slider">
                <img src="../images/Airmax-90.jpg" alt="" class="img"/>
                <img src="../images/Ultraboost.jpg" alt="" class="img"/>
                <img src="../images/Airmax-97.jpg" alt="" class="img"/>
                <img src="../images/NMD-R1.jpg" alt="" class="img"/>
                <img src="../images/NMD-Black-600.png" alt="" class="img"
                />
            </div>
        </div> -->
    <div class="slideshow-container">
        <div class="mySlides fade">
            <img src="../images/Airmax-90.jpg" style="width:100% height:20%" alt="images">
        </div>
        <div class="mySlides fade">
            <img src="../images/Ultraboost.jpg" style="width:100% height:20%" alt="images">
        </div>
        <div class="mySlides fade">
            <img src="../images/Airmax-97.jpg" style="width:100% height:20%" alt="images">
        </div>
        <div class="mySlides fade">
            <img src="../images/NMD-R1.jpg" style="width:100% height:20%" alt="images">
        </div>
    
    <script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
            slides[slideIndex-1].style.display = "block";
            
            setTimeout(showSlides, 2000); // Change image every 2 seconds
        }
    </script>

        <div class="background-container">
        <!-- Products -->
        <h3 id="products">NEW ARRIVALS</h3>
        <div class="product-container">
            <div class="card">
                <div class="shoe-img product1"></div>
                <h4>Nike Air Force.</h4>
                <button class="btn">Buy Now</button>
            </div>
            <div class="card">
                <div class="shoe-img product2"></div>
                <h4>Adidas Ultra Boost.</h4>
                <button class="btn">Buy Now</button>
            </div>
            <div class="card">
                <div class="shoe-img product3"></div>
                <h4>puma cali.</h4>
                <button class="btn">Buy Now</button>
            </div>
            <div class="card">
                <div class="shoe-img product4"></div>
                <h4>Converse Chuck Taylor.</h4>
                <button class="btn">Buy Now</button>
            </div>
        </div>

        <h3 id="brands">BEST SELLERS</h3>
        <div class="brand-container">
            <div class="card">
                <div class="shoe-img brand1"></div>
                <h4>Nike.</h4>
                <button class="btn">Buy Now</button>
            </div>
            <div class="card">
                <div class="shoe-img brand2"></div>
                <h4>Adidas.</h4>
                <button class="btn">Buy Now</button>
            </div>
            <div class="card">
                <div class="shoe-img brand3"></div>
                <h4>puma.</h4>
                <button class="btn">Buy Now</button>
            </div>
            <div class="card">
                <div class="shoe-img brand4"></div>
                <h4>Converse.</h4>
                <button class="btn">Buy Now</button>
            </div>
            <div class="card">
                <div class="shoe-img brand5"></div>
                <h4>Dior</h4>
                <button class="btn">Buy Now</button>
            </div>
            <div class="card">
                <div class="shoe-img brand6"></div>
                <h4>Adidas crocs</h4>
                <button class="btn">Buy Now</button>
            </div>
            <div class="card">
                <div class="shoe-img brand7"></div>
                <h4>prada</h4>
                <button class="btn">Buy Now</button>
            </div>
            <div class="card">
                <div class="shoe-img brand8"></div>
                <h4>jordan</h4>
                <button class="btn">Buy Now</button>
            </div>
            <div class="card">
                <div class="shoe-img brand9"></div>
                <h4>Balenciaga</h4>
                <button class="btn">Buy Now</button>
            </div>
            <div class="card">
                <div class="shoe-img brand10"></div>
                <h4>Gucci</h4>
                <button class="btn">Buy Now</button>
            </div>

        </div>

        <!-- About Section -->
        <!-- <div id="about" class="about">
            <h2>About Us</h2>
            <p>We specialize in selling sneakers, also known as sthletic shoes or trainers.Our sneaker store offers a wide range of sneakers from various brands including popular names such as Nike,Adidas,Puma and Converse.</p>
        </div> -->

        <!-- Contact form -->
        <!-- <div id="contact" class="card contact-form">
            <h3>Contact Us</h3>
            <form action="/action_page.php">
                <input type="email" name="email" placeholder="name@email.com">
                <textarea id="message" name="text" placeholder="Enter Message here..."></textarea>
                <button class="btn submit-form" type="submit">Submit</button>
            </form>
        </div> -->

        <!-- Footer -->
        <footer>
            <?php
                include_once "footer.php";
            ?>
        </footer>

    </div>

</body>

</html>