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
        if (mysqli_query($conn, $getID)) {
            echo "Done";
        } else {
            echo "Error: " . mysqli_error($conn);
        } 

        $cd = "SELECT id FROM products WHERE @getID := id";
        $ty = $conn->query($cd);
        $insert = "INSERT INTO cart (product_id) VALUES ('$ty')";
        $result2 = mysqli_query($conn, $insert);

        ?>

    </main>

</body>

</html>