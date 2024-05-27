<?php
session_start();
function setRupiah($amount)
{
    return 'Rp ' . number_format($amount, 2, ',', '.');
}

$kurs_dollar = 15000;

if (!isset($_SESSION['fav'])) {
    $_SESSION['fav'] = array();
}

if (isset($_POST['add_favorite'])) {
    $product_id = $_POST['product_id'];
    if (isset($_SESSION['fav'][$product_id])) {
        echo '<script>alert("Produk sudah ditambahkan ke favorit")</script>';
    } else {
        $product_array = array(
            'product_image1' => $_POST['product_image1'],
            'product_id' => $_POST['product_id'],
            'product_name' => $_POST['product_name'],
            'product_category' => $_POST['product_category'],
            'product_price' => $_POST['product_price'],
        );
        $_SESSION['fav'][$product_id] = $product_array;
        echo '<script>alert("Produk berhasil ditambahkan ke favorit")</script>';
    }
}

if (isset($_POST['remove_product'])) {
    $product_id = $_POST['product_id'];
    unset($_SESSION['fav'][$product_id]);
    echo '<script>alert("Produk berhasil dihapus dari favorit")</script>';
}

?>

<?php
include('layouts/header.php');
?>
<br>
<br>

<!-- Bagian Breadcumb -->
<section class="breadcrumb-optionfavorite">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text" style="text-align: center;">
                    <h4 style="color: #850E35;">Favorit Saya</h4>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Akhir Bagian Breadcumb -->

<!-- Favorite List Section -->
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <?php if (!empty($_SESSION['fav'])) { ?>
                <?php foreach ($_SESSION['fav'] as $product) { ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="card">
                            <img src="img/product/<?php echo $product['product_image1']; ?>" class="card-img-top" alt="Gambar produk <?php echo $product['product_name']; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $product['product_name']; ?></h5>
                                <p class="card-text"><?php echo setRupiah($product['product_price']); ?></p>
                                <div class="d-flex justify-content-between">
                                    <form method="POST" action="favorite.php">
                                        <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                                        <button type="submit" class="btn btn-danger btn-sm" name="remove_product"><i class="bi bi-trash"></i> Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <div class="col-lg-12 text-center">
                    <p>You have not added any products to favorites.</p>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- End Favorite List Section -->

<?php
include('layouts/footer.php');
?>
