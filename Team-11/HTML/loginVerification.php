<?php

require 'connect.php';
    

    
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);

    $result = mysqli_query($conn, "SELECT * from user WHERE user_email = '$email'");
    $row = mysqli_fetch_assoc ($result);

    if(mysqli_num_rows($result) > 0) {
        if ($password == $row["user_password"]) {
            
            
            $_SESSION["user_id"] = $row["user_id"];

            header("Location: productPage.php");
            

        } else {
            echo "<script> alert(\"Wrong password\") </script>";
            header("Location: index.php");
        }

    }
    else {
        echo "<script> alert(\"User not registered\") </script>";
        header("Location: index.php");
    }
} else {

    header("Location: index.php");

}

?>