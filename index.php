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
 <!-- Hero Section Begin -->
<section class="hero">
    <div class="hero__slider owl-carousel">
        <div class="hero__items set-bg" data-setbg="/img/hero/brand.jpeg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-7 col-md-8">
                        <div class="hero__text">
                            <h6>Summer Collection</h6>
                            <h2>Fall - Winter Collections 2030</h2>
                            <p>A specialist label creating luxury essentials. Ethically crafted with an unwavering
                                commitment to exceptional quality.</p>
                            <a href="#" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                            <div class="hero__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero__items set-bg" data-setbg="/img/hero/brand.jpeg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-7 col-md-8">
                        <div class="hero__text">
                            <h6>Summer Collection</h6>
                            <h2>Fall - Winter Collections 2030</h2>
                            <p>A specialist label creating luxury essentials. Ethically crafted with an unwavering
                                commitment to exceptional quality.</p>
                            <a href="#" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                            <div class="hero__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Content page 2 -->
<div class="container mt-1 mb-4">
    <div class="row">
        <div class="col-md-5 mt-5">
            <div class="jumbotron bg-30">
                <div class="card bg-dark text-white">
                    <img src="img/hero/brand 3.jpeg" style="opacity: 0.5;" width="400px" height="450px" class="card-img object-fit-cover" alt="...">
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
                </ul>
            </div>
        </div>
    </div>
</div>
</div>


<!-- <div class="container mt-2 mb-3">
    <div class="row p-2">
        <div class="col-md-3">
            <div class="ads">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/download (4).jpeg.jpg" class="d-block w-100 " class="img-fluid" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/Free Phone Screen Savers! - Sara Rosett.jpeg.jpg" class="d-block w-100" class="img-fluid" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/Books Wallpaper _ Book Wall.jpeg.jpg" class="d-block w-100" class="img-fluid" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

        </div>


        <div class="col-md-9">
            <div class="jumbotron jumbo-right bg-30 p-3">
                <div>
                    <h6>SPRING-DISCOUNT List</h6>
                    <hr>
                </div>
                <ul class="list-unstyled">
                    <li class="media">
                        <div class="media-body">
                            <a class="text-dark" style="text-decoration: none;" href="detil-buku.php?id=596">
                                <h5 class="mt-0 mb-1">Hero: The Life and Legend of Lawrence of Arabia</h5>
                            </a>
                            <p>From Michael Korda, author of the New York Times bestselling Eisenhower biography Ike and the captivating Battle of Britain book With Wings Like Eagles, comes the critically-acclaimed definitive biography of T. E. Lawrence—the legendary British soldier, strategist, scholar, and adventurer whose exploits as “Lawrence of Arabia” created a legacy of mythic proportions in his own lifetime. Many know T.E. Lawrence from David Lean’s Oscar-winning 1962 biopic—based, itself, upon Lawrence’s autobiographical Seven Pillars of Wisdom—but in the tradition of modern biographers like John Meacham, David McCullough, and Barbara Leaming, Michael Korda’s penetrating new examination reveals new depth and character in the twentieth century’s quintessential English hero.</p>
                        </div>
                    </li>
                    <li class="media my-4">
                        <div class="media-body">
                            <a class="text-dark" style="text-decoration: none;" href="detil-buku.php?id=958">
                                <h5 class="mt-0 mb-1">Quarter Life Crisis</h5>
                            </a>
                            <p>Anxious and confused about the future? Can't decide on a career? Choosing the right partner? Idealism or reality? What do you want to do after graduation?</p>
                            <p>Language
                                : Indonesian,

                                Release Date
                                : November 18, 2019,

                                Author
                                : Gerhana Nurhayati Putri,
                            </p>
                        </div>
                    </li>
                    <li class="media">
                        <div class="media-body">
                            <a class="text-dark" style="text-decoration: none;" href="detil-buku.php?id=825">
                                <h5 class="mt-0 mb-1">Harry Potter and the Philosopher's Stone</h5>
                            </a>
                            <p>Harry Potter lives with his abusive aunt and uncle, Vernon and Petunia Dursley, and their bullying son, Dudley. On Harry's eleventh birthday, a half-giant named Rubeus Hagrid personally delivers an acceptance letter to Hogwarts School of Witchcraft and Wizardry, revealing that Harry's parents, James and Lily Potter, were wizards. When Harry was one year old, an evil and powerful dark wizard, Lord Voldemort, murdered his parents. Harry survived Voldemort's killing curse that rebounded and seemingly destroyed the Dark Lord, leaving a lightning bolt-shaped scar on his forehead. Unknown to Harry, this act made him famous in the wizarding world.</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div> -->

<!-- <div class="container mb-4 mt-3">
    <div class="row text-center">
        <div class="col-md-12">
            <div class="jumbotron bg-30 p-3">
                <div class="">
                    <h2>Enjoy Every Page</h2>
                    <hr>
                </div>
                <div class="">
                    <p>Enjoy every page that the author has created for you, because every page is made with energy, heart and mind.</p>
                </div>
            </div>
        </div>
    </div>
</div> -->
</div>




<?php
include 'layouts/footer.php';
?>