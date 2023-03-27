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
                <p1>Products Trending Now!</p1>
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

            <div class="homepageText">
                <p1>
                    Welcome to Step Correct -
                    We are an online retailer
                    <br>
                    selling a variety of shoes and trainers.
                    <br>
                    <br>
                    Please use the navigation bar above to look around.
                    <br>
                    If you have any feedback for us, please let us know.
                    <br>
                    <br>
                    Enjoy your shop!
                </p1>
            </div>
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
