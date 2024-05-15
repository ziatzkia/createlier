<?php
session_start();
$kurs_dollar = 15000;
include('server/connection.php');

if (isset($_POST['search']) && isset($_POST['product_category'])) {
    // Get all products by category
    $category = $_POST['product_category'];
    $query_products = "SELECT * FROM products WHERE product_category = ?";
    $stmt_products = $conn->prepare($query_products);
    $stmt_products->bind_param('s', $category);
    $stmt_products->execute();
    $products = $stmt_products->get_result();
} else {
    // Get all products
    $query_products = "SELECT * FROM products";
    $stmt_products = $conn->prepare($query_products);
    $stmt_products->execute();
    $products = $stmt_products->get_result();
}

function setRupiah($amount)
{
    return 'Rp ' . number_format($amount, 2, ',', '.');
}

include('layouts/header.php');
?>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Shop</h4>
                    <div class="breadcrumb__links">
                        <a href="index.php">Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shop Section Begin -->
<section class="shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="shop__sidebar__search">
                    <form action="#">
                        <input type="text" placeholder="Search...">
                        <button type="submit"><span class="icon_search"></span></button>
                    </form>
                </div>
                <div class="shop__sidebar">
                    <div class="shop__sidebar__accordion">
                        <form method="POST" action="shop.php">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                                <ul class="nice-scroll">
                                                    <li>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" value="sepatu" name="product_category" id="category_one " <?php if (isset($product_category) && $product_category == 'sepatu') {
                                                                                                                                                                        echo 'checked';
                                                                                                                                                                    } ?>>
                                                            <label class="form-check-label" for="product_category">Necklaces</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" value="jaket" name="product_category" id="category_one " <?php if (isset($product_category) && $product_category == 'jaket') {
                                                                                                                                                                        echo 'checked';
                                                                                                                                                                    } ?>>
                                                            <label class="form-check-label" for="product_category">Bricelet</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" value="kaos" name="product_category" id="category_one " <?php if (isset($product_category) && $product_category == 'kaos') {
                                                                                                                                                                        echo 'checked';
                                                                                                                                                                    } ?>>
                                                            <label class="form-check-label" for="product_category">Ring</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" value="sepatu" name="product_category" id="category_one " <?php if (isset($product_category) && $product_category == 'sepatu') {
                                                                                                                                                                        echo 'checked';
                                                                                                                                                                    } ?>>
                                                            <label class="form-check-label" for="product_category">Key Chain</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" value="syal" name="product_category" id="category_one " <?php if (isset($product_category) && $product_category == 'syal') {
                                                                                                                                                                        echo 'checked';
                                                                                                                                                                    } ?>>
                                                            <label class="form-check-label" for="product_category">Hair Acc</label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <button class="btn btn-secondary" onClick="history.go(0);">
                                            <i class="fa fa-refresh"></i>
                                        </button>
                                        <input type="submit" class="btn btn-primary" name="search" value="Search" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="shop__product__option">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="shop__product__option__left">
                                <p>Showing 1–12 of 126 results</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="shop__product__option__right">
                                <p>Sort by Price:</p>
                                <select>
                                    <option value="">Low To High</option>
                                    <option value="">$0 - $55</option>
                                    <option value="">$55 - $100</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php while ($row = $products->fetch_assoc()) { ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/product/<?php echo $row['product_image1']; ?>">
                                    <ul class="product__hover">
                                        <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                                        <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a>
                                        </li>
                                        <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><?php echo $row['product_name']; ?></h6>
                                    <h5><?php echo $row['product_brand']; ?></h5>
                                    <a href="<?php echo "shop-details.php?product_id=" . $row['product_id']; ?>" class="add-cart">+ Add To Cart</a>
                                    <div class="rating">
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <h5><?php echo setRupiah($row['product_price'] * $kurs_dollar); ?></h5>
                                    <div class="product__color__select">
                                        <label for="pc-4">
                                            <input type="radio" id="pc-4">
                                        </label>
                                        <label class="active black" for="pc-5">
                                            <input type="radio" id="pc-5">
                                        </label>
                                        <label class="grey" for="pc-6">
                                            <input type="radio" id="pc-6">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__pagination">
                            <a class="active" href="#">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <span>...</span>
                            <a href="#">21</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop Section End -->

<?php
include('layouts/footer.php');
?>