<?php
include "../../config/database.php";
include "../../functions/helpers.php";

$feedbacks = query("SELECT * FROM feedbacks JOIN users ON feedbacks.user_id = users.id ORDER BY feedbacks.id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Feedback</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-3">
    <h2>Daftar Feedback</h2>

    <div class="table-responsive mt-3">
        <table border="1" cellpadding="8" class="table">
            <tr>
                <th>ID</th>
                <th>Nama User</th>
                <th>Satisfied</th>
                <th>Comment</th>
                <th>Location</th>
                <th>Aksi</th>
            </tr>

            <?php foreach ($feedbacks as $u): ?>
            <tr>
                <td><?= $u['id'] ?></td>
                <td><?= $u['name'] ?></td>
                <td><?= $u['satisfaction'] ?></td>
                <td><?= $u['comments'] ?></td>
                <td><?= $u['location_visited'] ?></td>
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
