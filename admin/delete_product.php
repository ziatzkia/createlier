<?php
ob_start();
session_start();
include('layouts/header.php');

if (!isset($_SESSION['admin_logged_in'])) {
    header('location: loginAdmin.php');
    exit;
}

include('../server/connection.php');

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    $query_delete_product = "DELETE FROM products WHERE product_id = ?";
    $stmt_delete_product = $conn->prepare($query_delete_product);
    $stmt_delete_product->bind_param('i', $product_id);

    if ($stmt_delete_product->execute()) {
        header('location: products.php?success_delete_message=Product has been deleted successfully');
    } else {
        header('location: products.php?fail_delete_message=Error occurred, try again!');
    }

    $stmt_delete_product->close();
} else {
    header('location: products.php');
    exit;
}

$conn->close();
?>
