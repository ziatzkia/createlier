<?php
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
<!-- Carousel Begin -->
<div id="carouselExampleCaptions" class="carousel slide">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="img/hero/brand.jpeg" class="d-block w-100" alt="kalung">
            <div class="carousel-caption d-none d-md-block">
                <h3>Necklaces</h3>
                <p>Some representative placeholder content for the first slide.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="img/hero/b.jpg" class="d-block w-100" alt="gelang">
            <div class="carousel-caption d-none d-md-block">
                <h3>Bricelet</h3>
                <p>Some representative placeholder content for the second slide.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="img/hero/c.jpg" class="d-block w-100" alt="cincin">
            <div class="carousel-caption d-none d-md-block">
                <h3>Ring</h3>
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
            <div class="jumbotron jumbo-right translucent-grid p-2">
                <div>
                    <h4>Handmade Accessories Bring an Elegant and Personal Touch</h4>
                    <hr>
                </div>
                <ul class="list-unstyled">
                    <p>In the world of Createlier,</p>
                    <p>accessories are not just additions to your appearance,</p>
                    <p>but are the embodiment of personal elegance and uniqueness.</p>
                    <p>Every accessory we produce is the result of skilled hand craftsmanship and attention to detail.</p><br><br><br><br>
                    < <a href="#" class="primary-btn">Buy now</a>
                </ul>
            </div>
        </div>
        <div class="col-md-5 mt-5">
            <div class="jumbotron bg-30">
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
            <div class="jumbotron bg-30">
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
            <div class="jumbotron jumbo-right translucent-grid p-2">
                <div>
                    <h4>Enhance Your Style with Your Own Unique Touch at Createlier</h4>
                    <hr>
                </div>
                <ul class="list-unstyled">
                    <p>At Createlier, we don't just offer beautiful ready-to-wear accessories,</p>
                    <p>but also provide you with the opportunity to create something truly unique.</p>
                    <p>With our custom product service, you can express your own creativity</p>
                    <p>and have accessories made specifically to your liking.</p>
                    <a href="#" class="primary-btn">Custom Now</a>
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
                    <source src="media/video.mp4" type="video/mp4">
                </video>
            </div>
        </div>
</div>
<!-- end vidio page -->

<!-- Latest Blog Section Begin -->
<section class="latest spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Latest News</span>
                        <h2>Fashion New Trends</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-1.jpg"></div>
                        <div class="blog__item__text">
                            <span><img src="img/icon/calendar.png" alt=""> 16 February 2020</span>
                            <h5>What Curling Irons Are The Best Ones</h5>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-2.jpg"></div>
                        <div class="blog__item__text">
                            <span><img src="img/icon/calendar.png" alt=""> 21 February 2020</span>
                            <h5>Eternity Bands Do Last Forever</h5>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-3.jpg"></div>
                        <div class="blog__item__text">
                            <span><img src="img/icon/calendar.png" alt=""> 28 February 2020</span>
                            <h5>The Health Benefits Of Sunglasses</h5>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Blog Section End -->

<?php
include 'layouts/footer.php';
?>