<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/adminstyle.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <span class="logo_name">STEPCORRECT</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="admin.php">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Users</span>
                </a>
            </li>
            <li>
                <a href="adminproduct.php" action="adminproduct.php">
                    <i class='bx bx-box'></i>
                    <span class="links_name">Product</span>
                </a>
            </li>
            <li>
                <a href="adminorders.php" class="active">
                    <i class='bx bx-list-ul'></i>
                    <span class="links_name">Order list</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-coin-stack'></i>
                    <span class="links_name">Stock</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-book-alt'></i>
                    <span class="links_name">Total order</span>
                </a>
            </li>
            <li class="log_out">
                <a href="logout.php">
                    <i class='bx bx-log-out'></i>
                    <span class="links_name">Log out</span>
                </a>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class='bx bx-menu sidebarBtn'></i>
                <span class="products">Orders</span>
            </div>
            
        </nav>

        <div class="home-content">


            <div class="title">Orders</div>

            <table>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Size</th>
                    <th>Date</th>
                    <th>Order Status</th>
                    <th></th>
                </tr>
                <?php
                    $sql = "SELECT id, user_id, product_id, product_name, product_description, product_price, product_image, size, date, order_processed FROM orders";
                    $results = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($results) > 0) {
                        while ($row = mysqli_fetch_array($results)) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['user_id'] . "</td>";
                            echo "<td>" . $row['product_id'] . "</td>";
                            echo "<td>" . $row['product_name'] . "</td>";
                            echo "<td>" . $row['product_description'] . "</td>";
                            echo "<td>" ."£".  $row['product_price'] . "</td>";
                            echo "<td>" . "<img src='../images/$row[6]' alt='$row[1]' height = 60% width=60%>" . "</td>";
                            echo "<td>" . $row['size'] . "</td>";
                            echo "<td>" . $row['date'] . "</td>";
                            if ($row['order_processed'] == 0){
                              $status = "Order is being Processed";
                            } else {
                              $status = "Order has been dispatched";
                            }
                            echo "<td>" . $status. "</td>";
                            echo "<td> <a href='editorder.php?id=" . $row['id'] . "'>Edit Order</a> </td>";
                        }
                    } else {
                        echo "<script> alert(\"There are no Orders\") </script>";
                    }
                    ?>
            </table>

        </div>
        <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else
                sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        }
        </script>

</body>

</html>