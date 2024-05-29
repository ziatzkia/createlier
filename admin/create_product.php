<?php
ob_start();
session_start();
include('layouts/header.php');

if (!isset($_SESSION['admin_logged_in'])) {
    header('location: loginAdmin.php');
}
?>

<?php
if (isset($_POST['create_btn'])) {
    $product_name = $_POST['product_name'];
    $product_brand = $_POST['product_brand'];
    $product_category = $_POST['product_category'];
    $product_criteria = $_POST['product_criteria'];
    $product_color = $_POST['product_color'];
    $product_description = $_POST['product_description'];
    $product_price = $_POST['product_price'];

    // This is image file
    $product_image = $_FILES['product_image']['tmp_name'];

    // Images name
    $image_name = str_replace(' ', '_', $product_name) . ".jpg";

    // Upload image
    move_uploaded_file($product_image, "../img/product/" . $image_name);

    $query_insert_product = "INSERT INTO products (product_name, product_brand, product_category, 
        product_criteria, product_color, product_description, product_price, product_image) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt_insert_product = $conn->prepare($query_insert_product);

    $stmt_insert_product->bind_param(
        'ssssssss',
        $product_name,
        $product_brand,
        $product_category,
        $product_criteria,
        $product_color,
        $product_description,
        $product_price,
        $image_name
    );

    if ($stmt_insert_product->execute()) {
        header('location: products.php?success_create_message=Product has been created successfully');
    } else {
        header('location: products.php?fail_create_message=Could not create product!');
    }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-white">Create Product</h1>
    <nav class="mt-4 rounded" aria-label="breadcrumb">
        <ol class="breadcrumb px-3 py-2 rounded mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="products.php">Products</a></li>
            <li class="breadcrumb-item active">Create Product</li>
        </ol>
    </nav>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create Product</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form id="create-form" enctype="multipart/form-data" method="POST" action="create_product.php">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" type="text" name="product_name">
                                </div>
                                <div class="form-group">
                                    <label>Product Brand</label>
                                    <select class="form-control" name="product_brand">
                                        <option value="" disabled selected>Select Brand</option>
                                        <option value="Storenvy">Storenvy</option>
                                        <option value="Beadiful Creations">Beadiful Creations</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Product Category</label>
                                    <select class="form-control" name="product_category">
                                        <option value="" disabled selected>Select Category</option>
                                        <option value="Bracelets">Bracelets</option>
                                        <option value="Hair Accessories">Hair Accessories</option>
                                        <option value="Key Chains">Key Chains</option>
                                        <option value="Necklaces">Necklaces</option>
                                        <option value="Rings">Rings</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Product Criteria</label>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="favourite" name="product_criteria" value="favourite" required>
                                        <label class="custom-control-label" for="favourite">Favourite</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="none" name="product_criteria" value="none" required>
                                        <label class="custom-control-label" for="none">Non-Favourite</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Color</label>
                                    <select class="form-control" name="product_color">
                                        <option value="" disabled selected>Select Color</option>
                                        <option value="Red">Red</option>
                                        <option value="Green">Green</option>
                                        <option value="Blue">Blue</option>
                                        <option value="Black">Black</option>
                                        <option value="White">White</option>
                                        <option value="Yellow">Yellow</option>
                                        <option value="Brown">Brown</option>
                                        <option value="Dark Brown">Dark Brown</option>
                                        <option value="Gold">Gold</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" rows="5" name="product_description"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Price</label>
                                    <input class="form-control" type="text" name="product_price">
                                </div>
                                <label>Image</label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="addImage1" name="product_image" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="addImage1">Choose file...</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-t-20 text-right">
                            <a href="products.php" class="btn btn-danger">Cancel <i class="fas fa-undo"></i></a>
                            <button type="submit" class="btn btn-primary submit-btn" name="create_btn">Create <i class="fas fa-save"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php include('layouts/footer.php'); ?>