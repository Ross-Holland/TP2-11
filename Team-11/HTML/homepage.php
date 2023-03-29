<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../CSS/homePage.css">
    <title>STEP CORRECT</title>
</head>

<body>
    <?php
    include_once "header.php";
    ?>
    <div class="content">
        <div class="colorContainer">
            <div class="homepageText , bold">
                <p1> OUR FAVOURITES! </p1>
            </div>
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

            </div>
             
        <div class="f-text">
          <h1>
            STEP CORRECT
          </h1>
        </div>
        <a href="../HTML/homepage.php" class="btn">SHOP NOW</a>
    </div>
  </div>


  <div id="container"> 
    <div class="BESTSELLING1" class="item">
      <img src= "../images/Airmax-90.jpg" alt="90" style="width:80%">
      <div class="f-text2">
        <h1>Unisex Nike Airmax 90</h1>
        <p class="price">£150.00</p>
      </div>
  </div>
                  
          
  <div class="TRENDING1" class="item">
    <img src="../images/Airmax-97.jpg" alt="97s" style="width:80%">
    <div class="f-text3">
      <h1>Men’s Nike AirMax 97s</h1>
      <p class="price">£125.99</p>
    </div>
  </div>
        

    <div class="NEWIN1" class="item">
      <img src="../images/Ultraboost.jpg" alt="ultraboost" style="width:80%">
      <div class="f-text4">
        <h1> Women Adidas </h1>
        <p class="price">£131.99</p>
    </div>
  </div>
    
</body>

</html>

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
        if (slideIndex > slides.length) {
            slideIndex = 1
        }
        slides[slideIndex - 1].style.display = "block";
        setTimeout(showSlides, 2000);
    }
</script>

<?php
include('footer.php');
?>
