<?php
include "../../config/database.php";
include "../../functions/helpers.php";

$id = $_GET['id'];

$sql = "DELETE FROM users WHERE id = $id";

execute($sql);

header("Location: index.php");
