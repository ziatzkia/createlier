<?php
session_start();
include 'server/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_SESSION['id'];

    // Get form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $user_city = $_POST['user_city'];
    $user_address = $_POST['user_address'];

    // Check if a new photo is uploaded
    if (!empty($_FILES['photo']['name'])) {
        $photo = $_FILES['photo']['name'];
        $upload_dir = 'img/profil/';
        $target_file = $upload_dir . basename($photo);

        if (move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)) {
            $_SESSION['photo'] = $photo;
            error_log("Photo updated to: " . $_SESSION['photo']);

            // Update query with photo
            $query = "UPDATE akun SET username = ?, email = ?, phone = ?, user_city = ?, user_address = ?, photo = ? WHERE id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('ssssssi', $username, $email, $phone, $user_city, $user_address, $photo, $id);
        } else {
            echo "Failed to upload photo";
            exit;
        }
    } else {
        // Update query without photo
        $query = "UPDATE akun SET username = ?, email = ?, phone = ?, user_city = ?, user_address = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('sssssi', $username, $email, $phone, $user_city, $user_address, $id);
    }

    // Execute the query
    if ($stmt->execute()) {
        header('Location: profil.php');
    } else {
        echo "Failed to update profile";
    }
}
?>