<?php
session_start();
include 'layouts/header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <!-- About Section Begin -->
    <div class="about_vid">
        <video controls width="100%" height="auto" src="vidio/createlier.mp4">
    </div>
    <!-- About Section End -->

    <!-- Services Section Begin -->
    <section class="services spad">
        <div class="container">
        <h2 style="text-align: center; font-weight: bold;">Our Story</h2>
        <br>
        <br>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 mb-6">
                    <div class="service-item bg-white p-3 rounded shadow-sm">
                        <img src="/img/banner/ab3.png" alt="100% Handmade" class="img-fluid mb-3">
                        <h4>100% Handmade</h4>
                        <p>Our products are crafted with utmost care and precision, ensuring 100% handmade quality.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 mb-6">
                    <div class="service-item bg-white p-3 rounded shadow-sm">
                        <img src="/img/banner/ab2.png" alt="Created by Creative People" class="img-fluid mb-3">
                        <h4>Created by Creative People</h4>
                        <p>Our items are designed and made by a team of highly creative and skilled individuals.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 mb-6">
                    <div class="service-item bg-white p-3 rounded shadow-sm">
                        <img src="/img/banner/ab1.png" alt="From Good Beads Products" class="img-fluid mb-3">
                        <h4>From Good Quality Beads</h4>
                        <p>We source only the best materials to create products that stand out in quality and beauty.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section End -->



    <!-- Team Section Begin -->
    <section class="team spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span >Our Team</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team__item">
                        <img src="img/banner/3.png" alt="">
                        <h4>Ananda Putri</h4>
                        <span>Software Tester</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team__item">
                        <img src="img/banner/1.png" alt="">
                        <h4>Jamilah Kamaliah</h4>
                        <span>Data Analyst</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team__item">
                        <img src="img/banner/2.png" alt="">
                        <h4>Zia Tazkiatul Aisya</h4>
                        <span>Software Developer</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team__item">
                        <img src="img/banner/4.png" alt="">
                        <h4>Diyan Pebriyanti</h4>
                        <span>Software Developer</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Team Section End -->

    <script src="js/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://platform.linkedin.com/badges/js/profile.js" async defer type="text/javascript"></script>

</body>

</html>
<?php
include('layouts/footer.php');
?>