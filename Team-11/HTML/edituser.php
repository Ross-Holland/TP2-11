
<link rel="stylesheet" href="../CSS/edituser.css"><?php
require 'connect.php';

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM user WHERE user_id='$id'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
} else {
    echo "<script> alert(\"User ID not specified.\") </script>";
    echo "<script>setTimeout(function(){ window.location.href = 'admin.php'; }, 2);</script>";

}
if ($user) {
    echo "<h1>Edit User</h1>";
    echo "<form action='updateuser.php' method='post'>";
    echo "<input type='hidden' name='user_id' value='".$user['user_id']."'>";
    echo "<label>Firstname:</label><input type='text' name='firstname' value='".$user['user_firstname']."' required><br>";
    echo "<label>Lastname:</label><input type='text' name='lastname' value='".$user['user_lastname']."' required><br>";
    echo "<label>Address:</label><input type='text' name='address' id='Address' value='".$user['user_address']."' required><br>";
    echo "<label>Telephone number:</label><input type='text' name='telephonenumber' pattern='[0-9]{11}' value='".$user['telephone_number']."' required><br>";
    echo "<input type='submit' name='submit' value='Update User'>";
    echo "</form>";
 } else {
    echo "<script> alert(\"User not found.\") </script>";
    echo "<script>setTimeout(function(){ window.location.href = 'admin.php'; }, 2);</script>";
    }
?>