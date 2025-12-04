<?php
include "../config/database.php";

// ambil data form
$name           = $conn->real_escape_string($_POST['name']);
$email          = $conn->real_escape_string($_POST['email']);
$password       = password_hash($_POST['password'], PASSWORD_BCRYPT);
$hobi           = $conn->real_escape_string($_POST['hobi']);
$comments       = $conn->real_escape_string($_POST['comments']);
$location       = $conn->real_escape_string($_POST['location']);
$satisfaction   = $conn->real_escape_string($_POST['satisfaction']);
$emotions       = isset($_POST['emotions']) ? $_POST['emotions'] : [];

// upload foto
$photoName = null;
if (!empty($_FILES['photo']['name'])) {
    $photoName = time() . "_" . $_FILES['photo']['name'];
    move_uploaded_file($_FILES['photo']['tmp_name'], "../assets/uploads/" . $photoName);
}

// insert ke tabel users
$sql = "INSERT INTO users (name, email, password, hobby)
        VALUES ('$name', '$email', '$password', '$hobi')";

mysqli_query($conn, $sql);

// ambil id user terakhir
$user_id = mysqli_insert_id($conn);

// insert ke tabel feedback
$sql = "INSERT INTO feedbacks (user_id, satisfaction, comments, photo_path, location_visited)
        VALUES ('$user_id', '$satisfaction', '$comments', '$photoName', '$location')";
mysqli_query($conn, $sql);

// ambil id feedback terakhir
$feedback_id = mysqli_insert_id($conn);

// insert emotions (pivot table)
foreach ($emotions as $emotion_id) {
    mysqli_query($conn, "INSERT INTO feedback_emotions (feedback_id, emotion_id) VALUES ('$feedback_id', '$emotion_id')");
}

echo "Feedback berhasil dikirim!";
