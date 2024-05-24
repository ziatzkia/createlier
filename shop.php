<?php
session_start();
include('server/connection.php');

// Inisialisasi variabel produk
$products = [];

// Memproses pencarian dan kategori
if (isset($_GET['search']) || isset($_POST['product_category'])) {
    $search_term = isset($_GET['search']) ? '%' . $_GET['search'] . '%' : '%';
    $category = isset($_POST['product_category']) ? $_POST['product_category'] : '%';
    
    $query_products = "SELECT * FROM products WHERE product_name LIKE ? AND product_category LIKE ?";
    $stmt_products = $conn->prepare($query_products);
    $stmt_products->bind_param('ss', $search_term, $category);
    $stmt_products->execute();
    $products = $stmt_products->get_result();
} else {
    $query_products = "SELECT * FROM products";
    $stmt_products = $conn->prepare($query_products);
    $stmt_products->execute();
    $products = $stmt_products->get_result();
}

function setRupiah($amount)
{
    return 'Rp ' . number_format($amount, 2, ',', '.');
}
$kurs_dollar = 15000;

include('layouts/header.php');
?>

<!-- search -->
<div class="d-flex justify-content-center mt-5">
    <form action="shop.php" method="GET" class="d-flex" style="position: relative; width: 60%;">
        <input type="text" name="search" class="form-control me-2" placeholder="Search product" style="border-radius: 15px; padding-right: 30px; height: 40px; font-size: 16px; background-color: #e0e0e0;">
        <button type="submit" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); border: none; background: none;">
            <i class="bi bi-search"></i>
        </button>
    </form>
</div>
<!-- end -->

<!-- Shop Section Begin -->
<section class="shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shop__product__option">
                    <div class="row">
                        <div class="col-lg-9 col-md-6 col-sm-6">
                            <form id="category-form" method="POST" action="shop.php">
                                <input type="hidden" name="product_category" id="product-category-input">
                                <div class="dropdown-center">
                                    <button class="btn btn-danger dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #850e35;">
                                        Categories
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#" data-value="Ring">Ring</a></li>
                                        <li><a class="dropdown-item" href="#" data-value="Necklaces">Necklaces</a></li>
                                        <li><a class="dropdown-item" href="#" data-value="Bracelet">Bracelet</a></li>
                                        <li><a class="dropdown-item" href="#" data-value="Hair Acc">Hair Acc</a></li>
                                        <li><a class="dropdown-item" href="#" data-value="Key Chain">Key Chain</a></li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
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
                        <div class="col-lg-3 col-md-6 col-sm-6 ">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/product/<?php echo $row['product_image1']; ?>">
                                </div>
                                <div class="product__item__text">
                                    <h5><?php echo $row['product_name']; ?></h5>
                                    <p><?php echo $row['product_category']; ?></p>
                                    <h5><?php echo setRupiah($row['product_price'] * $kurs_dollar); ?></h5>
                                </div>
                                <a href="<?php echo "shop-details.php?product_id=" . $row['product_id']; ?>" class="add-cart"><i class="bi bi-bag"></i></a>
                                <form method="POST" action="favorite.php">
                                    <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                                    <input type="hidden" name="product_image1" value="<?php echo $row['product_image1']; ?>">
                                    <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>">
                                    <input type="hidden" name="product_category" value="<?php echo $row['product_category']; ?>">
                                    <button type="submit" class="add-cart" name="add_favorite"><i class="bi bi-heart"></i></button>
                                </form>
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

<script>
document.querySelectorAll('.dropdown-item').forEach(item => {
    item.addEventListener('click', event => {
        event.preventDefault();
        document.getElementById('product-category-input').value = event.target.getAttribute('data-value');
        document.getElementById('category-form').submit();
    });
});
</script>

<?php
include('layouts/footer.php');
?>
