<?php
session_start();

function setRupiah($amount)
{
    return 'Rp ' . number_format($amount, 2, ',', '.');
}

$kurs_dollar = 15000;

if (!empty($_SESSION['cart'])) {
    // Let user in
} else {
    // Send user to hompe page
    // Kalau mau dihilangkan tinggal diberi comment
    //header('location: index.php');
}
?>

<?php
include('layouts/header.php');
?>
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <form id="checkout-form" method="POST" action="/server/place_order.php">
                <div class="alert alert-danger" role="alert">
                    <?php if (isset($_GET['message'])) {
                        echo htmlspecialchars($_GET['message']);
                    } ?>
                    <?php if (isset($_GET['message'])) { ?>
                        <a href="login.php" style="text-decoration: underline;">Login</a>
                    <?php } ?>
                </div>
                <div class="col-lg-5 col-md-7 d-flex justify-content-center">
                    <div class="checkout__order">
                        <h4 class="order__title">Your order</h4>
                        <div class="checkout__order__products">Product <span>Price</span></div>
                        <ul class="checkout__total__products">
                            <?php
                            if (!empty($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] as $key => $value) {
                                    if (isset($_SESSION['total'])) { // Tambahkan pengecekan ini
                            ?>
                                        <li><?php echo htmlspecialchars($value['product_quantity']); ?> <?php echo htmlspecialchars($value['product_name']); ?> <span> <?php echo setRupiah(($value['product_price'] * $kurs_dollar)); ?></span></li>
                            <?php
                                    }
                                }
                            } ?>
                        </ul>
                        <ul class="checkout__total__all">
                            <?php if (isset($_SESSION['total'])) { ?> <!-- Tambahkan pengecekan ini -->
                                <li>Total <span><?php echo setRupiah(($_SESSION['total'] * $kurs_dollar)); ?></span></li>
                            <?php } ?>
                        </ul>
                        <!-- <ul class="checkout__total__all">
                                <li>Total <span><?php echo setRupiah(($_SESSION['total'] * $kurs_dollar)); ?></span></li>
                            </ul> -->
                        <input type="submit" class="site-btn" id="checkout-btn" name="place_order" value="PAYMENT" style="background-color: #850E35;">
                    </div>
                </div>
        </div>
        </form>
    </div>
    </div>
</section>
<!-- Checkout Section End -->
<?php
include('layouts/footer.php');
?>