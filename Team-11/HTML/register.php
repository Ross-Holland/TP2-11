<?php

    if (isset($_POST['submit'])) {
        require_once('connect.php');

        $email = $password = $confirmPassword = $firstname = $lastname = $address = $telephone ='';
        
        $email = $_POST['Email'];
        $firstname = $_POST['Fname'];
        $lastname = $_POST['Lname'];
        $address = $_POST['Address'];
        $password = $_POST['Password'];
        $confirmPassword = $_POST['Cpassword'];
        $telephone = $_POST['phone'];
        
 
        $duplicate = mysqli_query($conn, "SELECT * FROM user WHERE user_email ='$email'");
        if (mysqli_num_rows($duplicate)> 0) {
            echo "<script> alert('Email has been taken'); </script>";
        } elseif ($password == $confirmPassword)
        { $password = md5($password);
        
        $sql = "INSERT INTO user (user_firstname, user_lastname, user_email, user_password, user_address, telephone_number)
        VALUES ('$firstname', '$lastname', '$email', '$password', '$address', '$telephone')";
        
        
        $result = mysqli_query($conn, $sql);
        
        if ($result) {
            echo("Success!");
            header("Location: index.html");
        }
        }else if ($password != $confirmPassword) {
        echo  "<script> alert('Passwords do not match'); </script>";} }

?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="background">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Homepage</title>

    <!-- font -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="\Team-11\CSS\register.css" rel="stylesheet">
</head>



<header>
    <div class="nav">
        <a href="">
            Login
        </a>
        <a href="">
            Contact Us
        </a>
        <a href="">
            About Us
        </a>
        <a href="/Team-11/HTML/index.html">
            Home
        </a>
    </div>
</header>

<body>
    <div class="main-body">
        <div class="reg-container">
            <h1 div class="title">Step Correct</h1>
            <div class="reg-box">
                <p1>
                    <div class="reg-text">To Register an account with us, please fill in your details below:</div>
                </p1>
                <form id="register" method="post">
                <input type="text" name="Fname" placeholder="First Name" required>
                <input type="text" name="Lname" placeholder="Last Name" required>
                <input type="text" name="Email" placeholder="Email Address" required>
                <input type="password" name="Password" placeholder="Password" required>
                <input type="password" name="Cpassword" placeholder="Confirm Password" required>
                <input type="text" name="Address" class="" id="Address" placeholder="Enter your address" required>
                <input type="tel" id="phone" name="phone" class="" placeholder="01234567890" pattern="[0-9]{11}" required>
                <input type="submit" value="Submit" name="submit" class="submit-button" id="submit">
                </form>
            </div>
        </div>
    </div>
</body>

</html>