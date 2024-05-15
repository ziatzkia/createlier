<?php
session_start();
include 'server/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_SESSION['id'];
    $saldo = $_POST['saldo'];

    // Validate amount
    if ($saldo <= 0) {
        $_SESSION['message'] = "Invalid amount!";
        header('Location: balance.php');
        exit;
    }

    // Update saldo
    $query = "UPDATE akun SET saldo = saldo + ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ii', $saldo, $id);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Balance added successfully!";
    } else {
        $_SESSION['message'] = "Failed to top up balance!";
    }

    header('Location: balance.php');
    exit;
}
?>
