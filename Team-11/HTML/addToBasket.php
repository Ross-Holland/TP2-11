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

        $cd = "SELECT * FROM viewproduct LIMIT 1";
        $ty = $conn->query($cd);
        $row = mysqli_fetch_array($ty);
        $row0 = $row[0];
        $insert = "INSERT INTO cart (product_id) VALUES ('$row0')";
        $result2 = mysqli_query($conn, $insert);
        $trun= "TRUNCATE TABLE viewproduct";
        $delete2 = mysqli_query($conn, $trun);

        ?>

    </main>

</body>

</html>