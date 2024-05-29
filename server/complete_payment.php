<?php
session_start();
include('connection.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['transaction_id']) && isset($_GET['order_id']) && isset($_SESSION['user_id'])) {

    $order_id = $_GET['order_id'];
    $order_status = "paid";
    $transaction_id = $_GET['transaction_id'];
    $user_id = $_SESSION['user_id'];
    $payment_date = date('Y-m-d H:i:s');

    // Change the order status to paid
    $query_change_order_status = "UPDATE orders SET order_status = ? WHERE order_id = ?";
    $stmt_change_order_status = $conn->prepare($query_change_order_status);

    if ($stmt_change_order_status === false) {
        die("Prepare failed for order status: " . $conn->error);
    }

    $stmt_change_order_status->bind_param('si', $order_status, $order_id);

    if ($stmt_change_order_status->execute() === false) {
        die("Execute failed for order status: " . $stmt_change_order_status->error);
    }

    // Store payment info
    $query_save_payment = "INSERT INTO payments (order_id, id, transaction_id, payment_date) VALUES (?, ?, ?, ?)";
    $stmt_save_payment = $conn->prepare($query_save_payment);

    if ($stmt_save_payment === false) {
        die("Prepare failed for save payment: " . $conn->error);
    }

    $stmt_save_payment->bind_param('iiss', $order_id, $user_id, $transaction_id, $payment_date);

    if ($stmt_save_payment->execute() === false) {
        die("Execute failed for save payment: " . $stmt_save_payment->error);
    }

    // Close statements
    $stmt_change_order_status->close();
    $stmt_save_payment->close();

    // Go to user account
    header('Location:../account.php?payment_message=Paid successfully, thanks for your shopping with us');
    exit;

} else {
    header('Location: ../index.php');
    exit;
}
?>
