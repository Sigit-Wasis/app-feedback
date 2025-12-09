<?php
include "../config/database.php";
include "../functions/helpers.php";

$id = $_GET['id'];
$user = query("SELECT * FROM users WHERE id = $id")[0];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>

<h2>Edit User</h2>

<form action="update.php" method="POST">
    <input type="hidden" name="id" value="<?= $user['id'] ?>">
    Nama: <input type="text" name="nama" value="<?= $user['nama'] ?>"><br><br>
    Email: <input type="email" name="email" value="<?= $user['email'] ?>"><br><br>
    <button type="submit">Update</button>
</form>

</body>
</html>
