<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login & Registration Form | Aston University</title>
  <!---Custom CSS File--->
  <link rel="stylesheet" href="../CSS/style.css">
</head>
<?php

require 'connect.php';
    

    
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);

    $result = mysqli_query($conn, "SELECT * from user WHERE user_email = '$email'");
    $row = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result) > 0) {
        if ($password == $row["user_password"]) {
            
            
            $_SESSION["user_id"] = $row["user_id"];
            if ($email == "admin@stepcorrect.com"){
                header("Location: admin.php");
            } else {
                header("Location: homepage.php");
            }
            
            

        } else {
            echo "<script> alert(\"Wrong password\") </script>";
            echo "<script>setTimeout(function(){ window.location.href = 'index.php'; }, 2);</script>";
            // header("Location: index.php");
            
        }

    }
    else {
        echo "<script> alert(\"User not registered\") </script>";
        echo "<script>setTimeout(function(){ window.location.href = 'index.php'; }, 2);</script>";
    }
} else {

    header("Location: index.php");

}

?>
