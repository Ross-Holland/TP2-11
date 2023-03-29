<!DOCTYPE html>
<html lang="en">

<head>
    <title>My Orders</title>
    <link rel="stylesheet" type="text/css" href="../CSS/profilestyle.css" />
</head>

<body>
    <?php
    session_start();
    $user_id = $_SESSION['user_id'];
    require 'header.php';
    ?>

    <div class="content">
        <main>
        <a href="editdetails.php?id=<?php echo $user_id; ?>" style="display: block; width: 200px; margin: 0 auto; background-color: lightblue; margin-top: 10px; color: darkblue; padding: 10px 20px; text-align: center; text-decoration: none; border-radius: 5px; border: 1px solid gray; font-weight: bold;">Click Here to edit your Details!</a>
            <h1>My Orders</h1>
            <table>
                <tr>
                    <th>Product Name</th>
                    <th>Product description</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Size</th>
                    <th>Date</th>
                    <th>Order Status</th>
                </tr>
                <?php
                require 'connect.php';

                
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
                    echo "<td>" . $row['size'] . "</td>";
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