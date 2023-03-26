<!DOCTYPE html>
<html lang="en">

<head>
    <title>My Orders</title>
    <link rel="stylesheet" type="text/css" href="../CSS/profilestyle.css" />
</head>

<body>
    <?php
    require 'header.php';
    ?>

    <div class="content">
        <main>
            <h1>My Orders</h1>
            <table>
                <tr>
                    <th>Product Name</th>
                    <th>Product description</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Date</th>
                    <th>Order Status</th>
                </tr>
                <?php
                require 'connect.php';

                session_start();
                $user_id = $_SESSION['user_id'];
                $sql = "SELECT * FROM orders WHERE user_id = $user_id";
                $result = mysqli_query($conn, $sql);

                // display the user's orders in a table
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['product_name'] . "</td>";
                    echo "<td>" . $row['product_description'] . "</td>";
                    echo "<td>" . $row['product_price'] . "</td>";
                    echo "<td>" . $row['product_image'] . "</td>";
                    echo "<td>" . $row['date'] . "</td>";
                    if ($row['order_processed'] == '0') {
                        echo "<td>" . 'Order Processing' . "</td>";
                    } else {
                        echo "<td>" . 'Order has been dispatched' . "</td>";
                    }
                    echo "</tr>";
                }
                ?>
            </table>

        </main>

    </div>

</body>

</html>


<?php
include('footer.php');
?>