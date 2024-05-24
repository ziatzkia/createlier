<?php
session_start();

function setRupiah($amount)
{
    return 'Rp ' . number_format($amount, 2, ',', '.');
}

$kurs_dollar = 15000;

// Inisialisasi session favorit jika belum ada
if (!isset($_SESSION['fav'])) {
    $_SESSION['fav'] = array();
}

// Menghandle penambahan ke favorit
if (isset($_POST['add_favorite'])) {
    $product_id = $_POST['product_id'];
    // Periksa apakah produk sudah ada di favorit
    if (isset($_SESSION['fav'][$product_id])) {
        echo '<script>alert("Produk sudah ditambahkan ke favorit")</script>';
    } else {
        // Tambahkan produk ke favorit
        $product_array = array(
            'product_image1' => $_POST['product_image1'],
            'product_id' => $_POST['product_id'],
            'product_name' => $_POST['product_name'],
            'product_category' => $_POST['product_category'],
        );
        $_SESSION['fav'][$product_id] = $product_array;
        echo '<script>alert("Produk berhasil ditambahkan ke favorit")</script>';
    }
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

<!-- Bagian Daftar Favorit -->
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="shopping__cart__table">
                    <table>
                        <tbody>
                            <?php if (!empty($_SESSION['fav'])) { ?>
                                <?php foreach ($_SESSION['fav'] as $product) { ?>
                                    <tr>
                                        <td class="product__cart__item">
                                            <div class="product__cart__item__pic">
                                                <img src="img/product/<?php echo $product['product_image1']; ?>" alt="Gambar produk <?php echo $product['product_name']; ?>">
                                            </div>
                                            <div class="product__cart__item__text">
                                                <h6><?php echo $product['product_name']; ?></h6>
                                            </div>
                                        </td>
                                        <td>
                                            <form method="POST" action="favorite.php">
                                                <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                                                <button type="submit" class="btn btn-danger" name="remove_product"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="4" style="text-align: center;">Anda belum menambahkan produk ke favorit.</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Akhir Bagian Daftar Favorit -->

<?php
include('layouts/footer.php');
?>