<?php
    $host = "localhost";
    $user = "root";
    $pass = "123456";
    $db   = "feedback";

    $conn = mysqli_connect($host, $user, $pass, $db);

    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }
?>
