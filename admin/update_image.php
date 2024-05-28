<?php include('../server/connection.php'); ?>

<?php

if (isset($_POST['update_image_btn'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];

    // This is image file
    $image = $_FILES['image']['tmp_name'];

    // Images name
    $image_name = str_replace(' ', '_', $product_name) . ".jpg";

    // Upload image
    move_uploaded_file($image, "img/products/" . $image_name);

    $query_update_image = "UPDATE products SET product_image = ? WHERE product_id = ?";

    $stmt_update_image = $conn->prepare($query_update_image);
    $stmt_update_image->bind_param('si', $image_name, $product_id);
    
    if ($stmt_update_image->execute()) {
        header('location: products.php?image_success=Images have been updated successfully');
    } else {
        header('location: products.php?image_failed=Error occurs, please try again!');
    }
}

?>