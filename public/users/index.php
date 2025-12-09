<?php
include "../../config/database.php";
include "../../functions/helpers.php";

$users = query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data User</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-3">
    <h2>Daftar User</h2>
    <a href="create.php" class="btn btn-primary">Tambah User</a>

    <div class="table-responsive mt-3">
        <table border="1" cellpadding="8" class="table">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>

            <?php foreach ($users as $u): ?>
            <tr>
                <td><?= $u['id'] ?></td>
                <td><?= $u['name'] ?></td>
                <td><?= $u['email'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $u['id'] ?>" class="btn btn-warning btn-sm">Edit</a> | 
                    <a href="delete.php?id=<?= $u['id'] ?>" onclick="return confirm('Yakin?')" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

</body>
</html>
