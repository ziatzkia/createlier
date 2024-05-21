<?php
include('server/connection.php');

function setRupiah($amount)
{
    return 'Rp ' . number_format($amount, 2, ',', '.');
}

$kurs_dollar = 15000;

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    $query = "SELECT * FROM products WHERE product_id=$product_id";

    $stmt = $conn->prepare($query);

    $stmt->execute();

    $product_details = $stmt->get_result();
} else {
    header('location: index.php');
}

include('layouts/header.php');
?>

<!-- Shop Details Section Begin -->
<section class="shop-details">
    <?php while ($row = $product_details->fetch_assoc()) { ?>
        <div class="container">
            <div class="row">
                <!-- Right side: Image -->
                <div class="col-lg-6">
                    <div class="product__details__pic__item">
                        <img src="img/shop-details/<?php echo $row['product_image1']; ?>" alt="">
                    </div>
                </div>
                <!-- Left side: Product Details -->
                <div class="col-lg-6">
                    <div class="product__details__text">
                        <h4><?php echo $row['product_name']; ?></h4>
                        <!-- <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <span> - 5 Reviews</span>
                        </div> -->
                        <h3><?php echo setRupiah($row['product_price'] * $kurs_dollar); ?></h3>
                        <p><?php echo $row['product_description']; ?></p>
                        <div class="product__details__option">
                            <div class="product__details__option__size">
                                <span>Size:</span>
                                <label for="xxl">xxl
                                    <input type="radio" id="xxl">
                                </label>
                                <label class="active" for="xl">xl
                                    <input type="radio" id="xl">
                                </label>
                                <label for="l">l
                                    <input type="radio" id="l">
                                </label>
                                <label for="sm">s
                                    <input type="radio" id="sm">
                                </label>
                            </div>
                            <div class="product__details__option__color">
                                <span>Color:</span>
                                <label class="c-1" for="sp-1">
                                    <input type="radio" id="sp-1">
                                </label>
                                <label class="c-2" for="sp-2">
                                    <input type="radio" id="sp-2">
                                </label>
                                <label class="c-3" for="sp-3">
                                    <input type="radio" id="sp-3">
                                </label>
                                <label class="c-4" for="sp-4">
                                    <input type="radio" id="sp-4">
                                </label>
                                <label class="c-9" for="sp-9">
                                    <input type="radio" id="sp-9">
                                </label>
                            </div>
                        </div>
                        <div class="product__details__cart__option">
                            <form method="POST" action="shop-cart.php">
                                <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                                <input type="hidden" name="product_image" value="<?php echo $row['product_image1']; ?>">
                                <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>">
                                <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="number" name="product_quantity" value="1">
                                    </div>
                                </div>
                                <button type="submit" name="add_to_cart" class="primary-btn"><i class="fa fa-shopping-cart fa-2x"></i> add to cart</button>
                            </form>
                        </div>
                        <div class="product__details__btns__option">
                            <a href="#"><i class="fa fa-heart"></i> add to wishlist</a>
                            <a href="#"><i class="fa fa-exchange"></i> Add To Compare</a>
                        </div>
                        <!-- <div class="product__details__last__option">
                            <h5><span>Guaranteed Safe Checkout</span></h5>
                            <img src="img/shop-details/details-payment.png" alt="">
                            <ul>
                                <li><span>SKU:</span> 3812912</li>
                                <li><span>Categories:</span> <?php echo $row['product_category']; ?></li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</section>
<!-- Shop Details Section End -->

<?php
include('layouts/footer.php');
?>
