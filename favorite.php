<?php
session_start();

function setRupiah($amount)
{
    return 'Rp ' . number_format($amount, 2, ',', '.');
}

$kurs_dollar = 15000;


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

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-optionfavorite">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text" style="text-align: center;">
                    <h4 style="color: #850E35;">My Favorite</h4>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="shopping__cart__table">
                    <table>
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
                                            </div>
                                        </td>
                                        <td class="quantity__item">
                                            <div class="quantity">
                                                <form method="POST" action="favorite.php">
                                                    <div>
                                                        <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>" />
                                                        <h6><input type="number" name="product_quantity" value="<?php echo $product['product_quantity']; ?>"></h6>
                                                    </div>
                                                    <div>
                                                        <button class="editbtn" type="submit" name="edit_quantity"><i class="fa fa-refresh"></i> Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </td>
                                        <td class="cart__price">
                                            <span><?php echo setRupiah($product['product_quantity'] * ($product['product_price'] * $kurs_dollar)); ?></span>
                                        </td>
                                        <form method="POST" action="favorite.php">
                                            <td>
                                                <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                                                <button type="submit" class="btn btn-danger" name="remove_product"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </form>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shopping Cart Section End -->

<?php
include('layouts/footer.php');
?>
