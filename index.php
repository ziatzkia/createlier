<?php
session_start();
include 'server/connection.php';

if (isset($_SESSION['logged in'])) {
    header('location: index.php');
    exit;
}

if (isset($_GET['logout'])) {
    if (isset($_SESSION['logged_in'])) {
        unset($_SESSION['logged_in']);
        unset($_SESSION['user_email']);
        unset($_SESSION['photo']);
        header('location: index.php');
        exit;
    }
}

$q_select = 'SELECT * FROM akun';
$result = mysqli_query($conn, $q_select);
?>

<?php
include 'layouts/header.php';
include('server/controller_favourite_product.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="x-icon" href="img/logo/logo cc.png">
    <title>Createlier</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="hero__slider owl-carousel">
            <!-- Slide 1 -->
            <div class="hero__items set-bg" data-setbg="img/hero/1.png">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-5 col-lg-7 col-md-8 text-center">
                            <div class="hero__text">
                                <h2 style="color: #850e35;">New Collections Accessories</h2>
                                <a href="shop.php" class="primary-btn">Shop now</a>
                                <div class="hero__social"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="hero__items set-bg" data-setbg="img/hero/7.png">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-5 col-lg-7 col-md-8 text-center">
                            <div class="hero__text">
                                <h2 style="color: #850e35;">Make Your Style</h2>
                                <p style="color: white;">Enhance Your Style with Your Own Unique Touch at Createlier</p>
                                <a href="shop.php" class="primary-btn">Buy Now</a>
                                <div class="hero__social"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="hero__items set-bg" data-setbg="img/hero/5.png">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-5 col-lg-7 col-md-8 text-center">
                            <div class="hero__text">
                                <h2 style="color: #850e35;">Special Accessories</h2>
                                <div class="hero__social"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <br>
    <br>
    <br>

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <br>
                        <br>
                        <h2 style="color: #850e35">Best Seller</h2>
                    </div>
                </div>
            </div>
            <div class="row product__filter_slide">
                <?php while ($row = $fav_products->fetch_assoc()) { ?>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="img/product/<?php echo $row['product_image']; ?>">
                                <span class="label">New</span>
                            </div>
                            <div class="product__item__text">
                                <h6><?php echo $row['product_name']; ?></h6>
                                <h5><?php echo setRupiah(($row['product_price'] * $kurs_dollar)); ?></h5>
                            </div>
                            <a href="<?php echo "shop-details.php?product_id=" . $row['product_id']; ?>" class="add-cart"><i class="bi bi-bag"></i></a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- Product Section End -->


    <!-- Content page 1 -->
    <div class="container mt-1 mb-4">
        <div class="row">
            <div class="col-md-7 mt-5">
                <div class="jumbotron jumbo-right translucent-grid p-2" style="background-color: rgba(255, 255, 255, 0.5);">
                    <div>
                        <h4>Handmade Accessories Bring an Elegant and Personal Touch</h4>
                        <hr style="background-color: #850e35;">
                    </div>
                    <ul class="list-unstyled">
                        <p>In the world of Createlier,accessories are not just additions to your appearance,</p>
                        <p>but are the embodiment of personal elegance and uniqueness.</p>
                        <p>Every accessory we produce is the result of skilled hand craftsmanship and attention to detail.</p><br><br><br>
                        <a href="shop.php">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: #850e35;">Buy now</button>
                        </a>
                    </ul>
                </div>
            </div>
            <div class="col-md-5 mt-5 ">
                <div class="jumbotron" style="background-color: #850e35;">
                    <div class="card bg-dark text-white">
                        <img src="img/hero/brand4.jpeg" style="opacity: 0.5;" width="400px" height="450px" class="card-img object-fit-cover" alt="...">
                        <div class="card-img-overlay mt-5">
                            <div class="align-items-center mt-5 pt-5">
                                <h5 class="card-title text-center">Beauty & Luxury</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- end page 1 -->


    <!-- Content page 2 -->
    <div class="container mt-1 mb-4">
        <div class="row">
            <div class="col-md-5 mt-5">
                <div class="jumbotron" style="background-color: #850e35;">
                    <div class="card bg-dark text-white">
                        <img src="img/hero/brand3.jpeg" style="opacity: 0.5;" width="400px" height="450px" class="card-img object-fit-cover" alt="...">
                        <div class="card-img-overlay mt-5">
                            <div class="align-items-center mt-5 pt-5">
                                <h5 class="card-title text-center">Customize your own accessories</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 mt-5">
                <div class="jumbotron jumbo-right translucent-grid p-2" style="background-color: rgba(255, 255, 255, 0.5);">
                    <div style="color: #850e35">
                        <h4>Enhance Your Style with Your Own Unique Touch at Createlier</h4>
                        <hr style="background-color: #850e35;">
                    </div>
                    <ul class="list-unstyled">
                        <p>At Createlier, we don't just offer beautiful ready-to-wear accessories,</p>
                        <p>but also provide you with the opportunity to create something truly unique.</p>
                        <p>With our custom product service, you can express your own creativity</p>
                        <p>and have accessories made specifically to your liking.</p><br><br><br>
                        <a href="custom.php">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: #850e35;">Custom now</button>
                        </a>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- end page 2 -->


    <!-- Latest Blog Section Begin -->
    <!-- <section class="latest spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Latest News</span>
                        <h2>Createlier x Jennie</h2>
                        <p>Coming soon</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-13">
                    <div class="justify-content-center">
                        <video class="ms-1 mt-5 pt-4 img-fluid" controls autoplay loop width="100%">
                            <source src="vidio/vidcreatelier.mp4" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/banner/banner1.png"></div>
                        <div class="blog__item__text">
                            <span><img src="img/icon/calendar.png" alt=""> 15 Oktober 2025</span>
                            <h5>New Pop Store</h5>
                            <a href="blog.php">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/banner/banner2.png"></div>
                        <div class="blog__item__text">
                            <span><img src="img/icon/calendar.png" alt=""> 21 Oktober 2025</span>
                            <h5>Product Release With Jennie</h5>
                            <a href="blog.php">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/banner/banner3.png"></div>
                        <div class="blog__item__text">
                            <span><img src="img/icon/calendar.png" alt=""> 28 Oktober 2025</span>
                            <h5>Launching New Accessories</h5>
                            <a href="blog.php">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Latest Blog Section End -->
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
</body>

</html>
<?php
include 'layouts/footer.php';
?>