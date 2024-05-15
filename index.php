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
</head>

<body>

    <!-- Carousel Begin -->
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/hero/a.png" class="d-block w-100" alt="kalung">
                <div class="carousel-caption d-none d-md-block">
                    <h2>Necklaces</h2>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/hero/b.png" class="d-block w-100" alt="gelang">
                <div class="carousel-caption d-none d-md-block">
                    <h2>Bricelet</h2>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/hero/c.png" class="d-block w-100" alt="cincin">
                <div class="carousel-caption d-none d-md-block">
                    <h2>Ring</h2>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- Crousel end -->


    <!-- Content page 1 -->
    <div class="container mt-1 mb-4">
        <div class="row">
            <div class="col-md-7 mt-5">
                <div class="jumbotron jumbo-right translucent-grid p-2" style="background-color: rgba(255, 255, 255, 0.5);">
                    <div style="color: #850e35">
                        <h4>Handmade Accessories Bring an Elegant and Personal Touch</h4>
                        <hr>
                    </div>
                    <ul class="list-unstyled">
                        <p>In the world of Createlier,</p>
                        <p>accessories are not just additions to your appearance,</p>
                        <p>but are the embodiment of personal elegance and uniqueness.</p>
                        <p>Every accessory we produce is the result of skilled hand craftsmanship and attention to detail.</p><br><br><br>
                        <a href="shop.php" >
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
                        <hr>
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

    <!-- vidio page -->
    <div class="container mt-1 mb-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="justify-content-center">
                    <video class="ms-1 mt-5 pt-4 img-fluid " controls autoplay="true" width="1200px" loop="true">
                        <source src="vidio/createlier.mp4" type="video/mp4">
                    </video>
                </div>
            </div>
        </div>
        <!-- end vidio page -->

        <div class="container mb-4 mt-3">
            <div class="row text-center">
                <div class="col-md-13">
                    <div class="jumbotron" style="background-color: #850e35;">
                        <div style="color: white">
                            <h2>Beauty accessories</h2>
                            <hr>
                        </div>
                        <div style="color: white">
                            <p>Enjoy every accessory that the designer has crafted for you, as each piece is made with passion, dedication, and creativity.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="banner spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="banner__item">
                            <div class="banner__item__pic">
                                <img src="img/banner/banner3.png" alt="">
                            </div>
                            <div class="banner__item__text">
                                <h2>Classic Elegance</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="banner__item banner__item--middle">
                            <div class="banner__item__pic">
                                <img src="img/banner/banner2.png" alt="">
                            </div>
                            <div class="banner__item__text">
                                <h2>Bohemian Chic</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="banner__item banner__item--last">
                            <div class="banner__item__pic">
                                <img src="img/banner/banner1.png" alt="">
                            </div>
                            <div class="banner__item__text">
                                <h2>Minimalist Modern</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

</body>
<br>
<br>
<br>
<br>
<br>
<br>
</html>
<?php
include 'layouts/footer.php';
?>