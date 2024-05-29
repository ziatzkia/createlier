<?php
session_start();

if (isset($_POST['add_to_cart'])) {
    // Jika pengguna sudah menambahkan produk ke keranjang
    if (isset($_SESSION['cart'])) {
        $products_array_ids = array_column($_SESSION['cart'], "product_id");
        // Jika produk belum ditambahkan ke keranjang
        if (!in_array($_POST['product_id'], $products_array_ids)) {
            $product_id = $_POST['product_id'];

            $product_array = array(
                'product_id' => $_POST['product_id'],
                'product_name' => $_POST['product_name'],
                'product_price' => $_POST['product_price'],
                'product_image' => $_POST['product_image'],
                'product_quantity' => $_POST['product_quantity']
            );

            $_SESSION['cart'][$product_id] = $product_array;
        } else {
            echo '<script>alert("Produk sudah ditambahkan ke keranjang")</script>';
        }
    } else {
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];
        $product_quantity = $_POST['product_quantity'];

        $product_array = array(
            'product_id' => $product_id,
            'product_name' => $product_name,
            'product_price' => $product_price,
            'product_image' => $product_image,
            'product_quantity' => $product_quantity
        );

        $_SESSION['cart'][$product_id] = $product_array;
    }

    calculateTotalCart();

} elseif (isset($_POST['remove_product'])) {
    // Hapus produk dari keranjang
    $product_id = $_POST['product_id'];
    unset($_SESSION['cart'][$product_id]);
    calculateTotalCart();

} elseif (isset($_POST['edit_quantity'])) {
    // Edit kuantitas produk di keranjang
    $product_id = $_POST['product_id'];
    $product_quantity = $_POST['product_quantity'];
    $_SESSION['cart'][$product_id]['product_quantity'] = $product_quantity;
    calculateTotalCart();
}

function calculateTotalCart() {
    $total_price = 0;
    $total_quantity = 0;

    foreach ($_SESSION['cart'] as $product) {
        $total_price += $product['product_price'] * $product['product_quantity'];
        $total_quantity += $product['product_quantity'];
    }

    $_SESSION['total'] = $total_price;
    $_SESSION['quantity'] = $total_quantity;
}
?>
<?php
include('layouts/header.php');
?>
<!-- <a href="shop-cart.php" class="btn btn-primary">Produk</a>
<a href="custom-cart.php" class="btn btn-primary">Custom</a> -->
<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="shopping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Kuantitas</th>
                                <th>Sub Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($_SESSION['cart'])) { ?>
                                <?php foreach ($_SESSION['cart'] as $product) { ?>
                                    <tr>
                                        <td class="product__cart__item">
                                            <div class="product__cart__item__pic">
                                                <img src="img/product/<?php echo $product['product_image']; ?>" alt="">
                                            </div>
                                            <div class="product__cart__item__text">
                                                <h6><?php echo $product['product_name']; ?></h6>
                                                <h5><?php echo setRupiah($product['product_price'] * $kurs_dollar); ?></h5>
                                            </div>
                                        </td>
                                        <td class="quantity__item">
                                            <div class="quantity">
                                                <form method="POST" action="shop-cart.php">
                                                    <div>
                                                        <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>" />
                                                        <h6><input type="number" name="product_quantity" value="<?php echo $product['product_quantity']; ?>"></h6>
                                                    </div>
                                                    <div>
                                                        <button class="editbtn" type="submit" name="edit_quantity"><i class="bi bi-arrow-clockwise"></i>Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </td>
                                        <td class="cart__price">
                                            <span><?php echo setRupiah($product['product_quantity'] * ($product['product_price'] * $kurs_dollar)); ?></span>
                                        </td>
                                        <form method="POST" action="shop-cart.php">
                                            <td>
                                                <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                                                <button type="submit" class="btn btn-danger" name="remove_product"><i class="bi bi-trash3"></i></button>
                                            </td>
                                        </form>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn">
                            <a href="shop.php" class="btn btn-primary" style="background-color: #850e35;"> Shop Again <i class="bi bi-arrow-right"></i></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cart__total" >
                    <h6>Total Keranjang</h6>
                    <ul>
                        <li>Total <span><?php if (isset($_SESSION['cart'])) { echo setRupiah($_SESSION['total'] * $kurs_dollar); } ?></span></li>
                    </ul>
                    <form method="POST" action="checkout.php">
                        <input type="submit" class="primary-btn" value="Checkout" name="checkout" style="background-color: #850e35; color: white;">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shopping Cart Section End -->

<?php
include('layouts/footer.php');
?>
