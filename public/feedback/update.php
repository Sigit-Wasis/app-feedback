<?php
include "../config/database.php";
include "../functions/helpers.php";

$id    = $_POST['id'];
$nama  = $_POST['nama'];
$email = $_POST['email'];

$sql = "UPDATE users SET nama='$nama', email='$email' WHERE id=$id";

execute($sql);

header("Location: index.php");
