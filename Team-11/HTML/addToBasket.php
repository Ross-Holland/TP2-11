<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="../CSS/wishlist-basket.css" />
    <link rel="stylesheet" type="text/css" href="../CSS/viewproducts.css" />
</head>

<body>
    <?php include('header.php');
    ?>

    <main>
        <?php

        require_once('connect.php');

        $getID = "SELECT id FROM viewproduct";
        $sizeoption = $_POST['size'];
        if (mysqli_query($conn, $getID)) {
            echo  "<script> alert('Product has been added to basket'); </script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        } 

        $cd = "SELECT * FROM viewproduct LIMIT 1";
        $ty = $conn->query($cd);
        $row = mysqli_fetch_array($ty);
        $row0 = $row[0];
        $insert = "INSERT INTO cart (product_id, size) VALUES ('$row0', '$sizeoption')";
        $result2 = mysqli_query($conn, $insert);
        $trun= "TRUNCATE TABLE viewproduct";
        $delete2 = mysqli_query($conn, $trun);

        echo "<script>setTimeout(function(){ window.location.href = 'basket.php'; }, 2);</script>";
        ?>

    </main>

</body>

</html>