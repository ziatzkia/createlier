<?php
    ob_start();
    session_start();
    include('layouts/header.php');

    if (!isset($_SESSION['admin_logged_in'])) {
        header('location: loginAdmin.php');
    }
?>

<?php 
    if (isset($_GET['product_id'])) {
        $product_id = $_GET['product_id'];
        $query_edit_product = "SELECT * FROM products WHERE product_id = ?";
        $stmt_edit_product = $conn->prepare($query_edit_product);
        $stmt_edit_product->bind_param('i', $product_id);
        $stmt_edit_product->execute();
        $products = $stmt_edit_product->get_result();

    } else if (isset($_POST['edit_btn'])) {
        $id = $_POST['product_id'];
        $name = $_POST['product_name'];
        $brand = $_POST['product_brand'];
        $category = $_POST['product_category'];
        $criteria = $_POST['product_criteria'];
        $color = $_POST['product_color'];
        $description = $_POST['product_description'];
        $price = $_POST['product_price'];

        $query_update_product = "UPDATE products SET product_name = ?, product_brand = ?, product_category = ?, 
            product_criteria = ?, product_color = ?, product_description = ?, product_price = ?
            WHERE product_id = ?";

        $stmt_update_product = $conn->prepare($query_update_product);
        $stmt_update_product->bind_param('sssssssi', $name, $brand, $category, $criteria, $color, $description, $price, $id);

        if ($stmt_update_product->execute()) {
            header('location: products.php?success_update_message=Product has been updated successfully');
        } else {
            header('location: products.php?fail_update_message=Error occured, try again!');
        }
    } else {
        header('location: products.php');
        exit;
    }
?>

<!-- Begin Page Content -->
<div class="container-fluid content-wrapper">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Product</h1>
    <nav class="mt-4 rounded" aria-label="breadcrumb">
        <ol class="breadcrumb px-3 py-2 rounded mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="products.php">Products</a></li>
            <li class="breadcrumb-item active">Edit Product</li>
        </ol>
    </nav>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Product</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form id="edit-form" method="POST" action="edit_product.php">
                        <div class="row">
                            <?php foreach ($products as $product) { ?>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>" />
                                        <label>Name</label>
                                        <input class="form-control" type="text" name="product_name" value="<?php echo $product['product_name']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Product Brand</label>
                                        <select class="form-control" name="product_brand">
                                            <option value="" disabled>Select Paper Type</option>
                                            <option value="Storenvy" <?php if ($product['product_brand'] == 'Storenvy') echo ' selected'; ?>>Storenvy</option>
                                            <option value="Beadiful Creations" <?php if ($product['product_brand'] == 'Beadiful Creations') echo ' selected'; ?>>Beadiful Creations</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Product Category</label>
                                        <select class="form-control" name="product_category">
                                            <option value="" disabled>Select Category</option>
                                            <option value="Bracelets" <?php if ($product['product_category'] == 'Bracelets') echo ' selected'; ?>>Bracelets</option>
                                            <option value="Earrings" <?php if ($product['product_category'] == 'Earrings') echo ' selected'; ?>>Earrings</option>
                                            <option value="Hair Accessories" <?php if ($product['product_category'] == 'Hair Accessories') echo ' selected'; ?>>Hair Accessories</option>
                                            <option value="Key Chains" <?php if ($product['product_category'] == 'Key Chains') echo ' selected'; ?>>Key Chains</option>
                                            <option value="Necklaces" <?php if ($product['product_category'] == 'Necklaces') echo ' selected'; ?>>Necklaces</option>
                                            <option value="Rings" <?php if ($product['product_category'] == 'Rings') echo ' selected'; ?>>Rings</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Criteria</label>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="featured" name="product_criteria" value="featured" required <?php if ($product['product_criteria'] == 'featured') echo ' checked'; ?>>
                                            <label class="custom-control-label" for="featured">Featured</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="none" name="product_criteria" value="none" required <?php if ($product['product_criteria'] == 'none') echo ' checked'; ?>>
                                            <label class="custom-control-label" for="none">Non-Featured</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Color</label>
                                        <select class="form-control" name="product_color">
                                            <option value="" disabled>Select Color</option>
                                            <option value="Red" <?php if ($product['product_color'] == 'Red') echo ' selected'; ?>>Red</option>
                                            <option value="Green" <?php if ($product['product_color'] == 'Green') echo ' selected'; ?>>Green</option>
                                            <option value="Blue" <?php if ($product['product_color'] == 'Blue') echo ' selected'; ?>>Blue</option>
                                            <option value="Black" <?php if ($product['product_color'] == 'Black') echo ' selected'; ?>>Black</option>
                                            <option value="White" <?php if ($product['product_color'] == 'White') echo ' selected'; ?>>White</option>
                                            <option value="Yellow" <?php if ($product['product_color'] == 'Yellow') echo ' selected'; ?>>Yellow</option>
                                            <option value="Brown" <?php if ($product['product_color'] == 'Brown') echo ' selected'; ?>>Brown</option>
                                            <option value="Dark Brown" <?php if ($product['product_color'] == 'Dark Brown') echo ' selected'; ?>>Dark Brown</option>
                                            <option value="Gold" <?php if ($product['product_color'] == 'Gold') echo ' selected'; ?>>Gold</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" rows="5" name="product_description"><?php echo $product['product_description']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input class="form-control" type="text" name="product_price" value="<?php echo $product['product_price']; ?>">
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="m-t-20 text-right">
                            <a href="products.php" class="btn btn-danger">Cancel <i class="fas fa-undo"></i></a>
                            <button type="submit" class="btn btn-primary submit-btn" name="edit_btn">Update <i class="fas fa-share-square"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include('layouts/footer.php'); ?>