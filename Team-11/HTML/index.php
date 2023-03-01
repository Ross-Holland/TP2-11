<?php 
require "connect.php";
if(isset($_SESSION["user_id"])) {
  header("Location:registrationPage.php");
}
?>
<!DOCTYPE html>
<!---Coding By S Ajayi | Aston University--->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login & Registration Form | Aston University</title>
  <!---Custom CSS File--->
  <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
  <div class="container">
    <input type="checkbox" id="check">
    <div class="login form">
      <header>Login</header>
      <form class="modal-content" method="post" action="loginVerification.php">
        <input type="text" placeholder="Enter your email" name="email">
        <input type="password" placeholder="Enter your password" name="password">
        <input type="submit" class="button" value="Login">
      </form>
      <div class="signup">
        <span class="signup">Don't have an account?
         <!-- <button href="register.php">Register here!</button> -->
         <label for="check">Signup</label>
         <button onclick="window.location.href='./register.php';">Register here!</button>
        </span>
      </div>
    </div>
    <div class="registration form">
      <header>Signup</header>
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
      <div class="signup">
        <span class="signup">Already have an account?
         <label for="check">Login</label>
        </span>
      </div>
    </div>
  </div>
</body>
</html>
<?php 
    if(isset($_SESSION["user_id"])) {
        $id = $_SESSION["user_id"];
        $sql = "SELECT email FROM user WHERE email = '$email'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $name = $row['firstname'];
    }
?>
<?php

if (isset($_POST['submit'])) {
    require_once('connect.php');

    $email = $password = $confirmPassword = $firstname = $lastname = $address = $telephone = '';

    $email = $_POST['Email'];
    $firstname = $_POST['Fname'];
    $lastname = $_POST['Lname'];
    $address = $_POST['Address'];
    $password = $_POST['Password'];
    $confirmPassword = $_POST['Cpassword'];
    $telephone = $_POST['phone'];


    $duplicate = mysqli_query($conn, "SELECT * FROM user WHERE user_email ='$email'");
    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script> alert('Email has been taken'); </script>";
    } elseif ($password == $confirmPassword) {
        $password = md5($password);

        $sql = "INSERT INTO user (user_firstname, user_lastname, user_email, user_password, user_address, telephone_number)
        VALUES ('$firstname', '$lastname', '$email', '$password', '$address', '$telephone')";


        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo ("Success!");
            header("Location: index.php");
        }
    } else if ($password != $confirmPassword) {
        echo  "<script> alert('Passwords do not match'); </script>";
    }
}

?>