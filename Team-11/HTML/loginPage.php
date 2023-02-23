<?php 
require "connect.php";
if(isset($_SESSION["user_id"])) {
  header("Location:registrationPage.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account - Sign up or Login</title>
</head>
<section id="header">
<a href="index.php"><img src="img/logo.png" class="logo" alt=""></a>      
    
<?php 
    if(isset($_SESSION["user_id"])) {
        $id = $_SESSION["user_id"];
        $sql = "SELECT firstname FROM user WHERE user_id = '$id'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $name = $row['firstname'];
    }
?>
      
<body>


    <div <form class="modal-content" method="post" action="loginVerification.php" >    
    <div class="container">
      <label for="em"><b>Email Address</b></label>
      <input type="email" placeholder="Enter Email" name="email" required>
      <label for="pass"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>
        
      <button type="submit" name="Submit">Login</button>
    </div>
    </form>class="container" style="background-color:#f1f1f1">
      <h4> Not Registered? <a href="registrationPage.php">Register here</a>  </h4>
    </div>
  
<body> 