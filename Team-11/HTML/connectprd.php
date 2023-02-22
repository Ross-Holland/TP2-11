
<?php

// Define database connection variables
$host = "localhost";
$user = "root";
$password = "";
$database = "T11DB";

// Establish a connection to the database
$db = mysqli_connect($host, $user, $password, $database);

// Check if the connection was successful
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// Execute a SQL query


// Close the database connection
$db = mysqli_connect($host, $user, $password, $database);

?>

