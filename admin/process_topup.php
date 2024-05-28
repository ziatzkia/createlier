<?php
session_start();
include('../server/connection.php');

if (!isset($_SESSION['admin_logged_in'])) {
    header('location: loginAdmin.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $topup_id = $_POST['topup_id'];
    $request_balance = $_POST['request_balance'];

    // Mendapatkan saldo admin saat ini
    $query_saldo_admin = "SELECT saldo FROM admins LIMIT 1"; // Asumsi ada satu admin
    $stmt_saldo_admin = $conn->prepare($query_saldo_admin);
    $stmt_saldo_admin->execute();
    $stmt_saldo_admin->bind_result($saldo_admin);
    $stmt_saldo_admin->fetch();
    $stmt_saldo_admin->close();

    // Mengecek apakah saldo admin cukup
    if ($saldo_admin >= $request_balance) {
        // Mengurangi saldo admin dan mengubah status top-up menjadi 'SUCCESS'
        $query_update_balance = "UPDATE admins ad
                                 JOIN topup t ON ad.id = t.id
                                 SET ad.saldo = ad.saldo - t.request_balance, t.topup_status = 'SUCCESS'
                                 WHERE t.topup_id = ? AND t.topup_status = 'PENDING'";

        $stmt_update_balance = $conn->prepare($query_update_balance);
        $stmt_update_balance->bind_param('i', $topup_id);

        if ($stmt_update_balance->execute()) {
            echo 'Top-up successful!';
        } else {
            echo 'Top-up failed.';
        }

        $stmt_update_balance->close();
    } else {
        echo 'Top-up failed. Insufficient balance.';
    }
}

$conn->close();
?>
