<?php
include "../config/database.php";
include "../functions/helpers.php";

$users = query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data User</title>
</head>
<body>

<h2>Daftar User</h2>
<a href="create.php">Tambah User</a>
<br><br>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Aksi</th>
    </tr>

    <?php foreach ($users as $u): ?>
    <tr>
        <td><?= $u['id'] ?></td>
        <td><?= $u['nama'] ?></td>
        <td><?= $u['email'] ?></td>
        <td>
            <a href="edit.php?id=<?= $u['id'] ?>">Edit</a> | 
            <a href="delete.php?id=<?= $u['id'] ?>" onclick="return confirm('Yakin?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>

</table>

</body>
</html>
