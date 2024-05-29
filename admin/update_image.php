<?php include('../server/connection.php'); ?>

<?php

if (isset($_POST['update_image_btn'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];

    // This is image file
    $image = $_FILES['image']['tmp_name'];
    $image2 = $_FILES['image2']['tmp_name'];

    // Images name
    $image_name = str_replace(' ', '_', $product_name) . ".jpg";
    $image_name2 = str_replace(' ', '_', $product_name) . "2.jpg";

    // Upload image
    move_uploaded_file($image, "img/products/" . $image_name);
    move_uploaded_file($image2, "../img/product/" . $image_name2);

    $query_update_image = "UPDATE products SET product_image = ?, product_image2 = ? WHERE product_id = ?";

    $stmt_update_image = $conn->prepare($query_update_image);
    $stmt_update_image->bind_param('ssi', $image_name, $image_name2, $product_id);
    
    if ($stmt_update_image->execute()) {
        header('location: products.php?image_success=Images have been updated successfully');
    } else {
        header('location: products.php?image_failed=Error occurs, please try again!');
    }
}

?>