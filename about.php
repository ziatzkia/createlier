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
            <div class="card-group">
                <div class="card">
                    <img src="img/banner/about (3).png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title" style="color: #850E35;">Written by Creatives, For Creatives</h5>
                        <p class="card-text">We are a journey initiated by a group of creative individuals driven by the passion to create beauty. From artists to craftsmen, we come from diverse backgrounds but share a common vision: to inspire the world with boundless creativity. With skilled hands and imaginative minds, we weave beautiful stories through our handmade goods.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="img/banner/about (1).png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title" style="color: #850E35;">Crafted with Quality Materials</h5>
                        <p class="card-text">Quality is the cornerstone of every creation we make. We are committed to using the finest materials available, from soft yarns to sturdy woods, ensuring that each product we produce is not only visually pleasing but also long-lasting. With meticulous craftsmanship and genuine love, we create works that not only meet the highest quality standards but also evoke enduring memories.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="img/banner/about (2).png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title" style="color: #850E35;">Timeless Sophistication</h5>
                        <p class="card-text">Indulge in the artistry of CreateLier and embrace timeless sophistication. Our accessories are more than adornments; they're reflections of your impeccable taste and appreciation for quality craftsmanship. Elevate your style journey with CreateLier today.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section End -->

    <!-- story begin -->
    <section class="why-choose-us py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-title">
                    <h2>Why Choose Us?</h2>
                </div>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <div class="card">
                    <img src="img/hero/stry (4).png" class="card-img-top" alt="Handmade with Love">
                    <div class="card-body">
                        <h5 class="card-title">Handmade with Love</h5>
                        <p class="card-text">Every piece is handcrafted with meticulous attention to detail, making each accessory truly unique.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="img/hero/stry (3).png" class="card-img-top" alt="Unique Designs">
                    <div class="card-body">
                        <h5 class="card-title">Unique Designs</h5>
                        <p class="card-text">Our designs are original and exclusive, ensuring you stand out with accessories you won't find anywhere else.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="img/hero/stry (1).png" class="card-img-top" alt="Excellent Customer Service">
                    <div class="card-body">
                        <h5 class="card-title">Excellent Customer Service</h5>
                        <p class="card-text">Our friendly and responsive team is here to assist you with any questions or special requests you may have about order.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="img/hero/stry (2).png" class="card-img-top" alt="Eco-Friendly Practices">
                    <div class="card-body">
                        <h5 class="card-title">Eco-Friendly Practices</h5>
                        <p class="card-text">We are committed to sustainable practices, using eco-friendly materials and packaging wherever possible.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end -->

    <!-- Team Section Begin -->
    <section class="team spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Meet With</h2>
                        <span>Our Team</span>
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