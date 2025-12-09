<?php
include "../config/database.php";
include "../functions/helpers.php";

$nama  = $_POST['nama'];
$email = $_POST['email'];

$sql = "INSERT INTO users (nama, email) VALUES ('$nama', '$email')";

execute($sql);

header("Location: index.php");
