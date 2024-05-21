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
include 'layouts/header.php';

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
            <div class="hero__items set-bg" data-setbg="img/hero/1.png">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <!-- <h6>Summer Collection</h6> -->
                                <h2 style="color: #850e35;">Collections 2025</h2>
                                <p>A specialist label creating luxury essentials. Ethically crafted with an unwavering
                                    commitment to exceptional quality.</p>
                                <a href="shop.php" class="primary-btn">Shop now</span></a>
                                <div class="hero__social">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero__items set-bg" data-setbg="img/hero/2.png">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <h2 style="color: #850e35;">Make Your Style</Style></h2>
                                <p>Enhance Your Style with Your Own Unique Touch at Createlier</p>
                                <a href="custom.php" class="primary-btn">Custom Now</a>
                                <div class="hero__social">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero__items set-bg" data-setbg="img/hero/3.png">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <h2 style="color: #850e35;"> Special Collaboration</h2>
                                <p>A special collaboration with korean superstars Jennie.
                                    bringing you the latest trends infused with their unique style and flair.
                                    Dive into a world where fashion meets music,
                                    where each piece tells a story of creativity and innovation</p>
                                <div class="hero__social">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</div>
        </div>
    </section>
    <!-- Hero Section End -->

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

    <!-- vidio end -->
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="justify-content-center">
                <video class="ms-1 mt-5 pt-4 img-fluid" controls autoplay loop width="100%">
                    <source src="vidio/createlier.mp4" type="video/mp4">
                </video>
            </div>
        </div>
    </div>
    <!-- vidio end -->

    <hr style="background-color: #850e35;">

    <!-- Latest Blog Section Begin -->
    <section class="latest spad">
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
    </section>
    <!-- Latest Blog Section End -->
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
</body>

</html>
<?php
include 'layouts/footer.php';
?>