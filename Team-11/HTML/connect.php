<?php
    session_start();

    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "sc";

    $conn = new mysqli($server, $user, $pass, $db);

?>