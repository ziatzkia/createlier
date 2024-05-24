<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category = $_POST['category'];
    $prices = [
        "Necklaces" => 50000,
        "Bracelet" => 30000,
        "Ring" => 20000,
        "Hair Accessories" => 15000,
        "Key Chain" => 10000
    ];

    $price = isset($prices[$category]) ? $prices[$category] : 0;
    $priceFormatted = "Rp " . number_format($price, 0, ',', '.');
}
?>
<?php
include 'layouts/header.php';
?>
<!-- vidio end -->
<div class="row justify-content-center" style="margin: 0; padding: 0;">
    <div class="col-md-12" style="margin: 0; padding: 0;">
        <div class="justify-content-center" style="margin: 0; padding: 0;">
            <video class="ms-1 mt-0 pt-0 img-fluid" controls autoplay loop width="100%" style="margin: 0; padding: 0;">
                <source src="vidio/createlier.mp4" type="video/mp4">
            </video>
        </div>
    </div>
</div>
<!-- vidio end -->

<!-- Banner -->
<div class="card mx-auto" style="width: 50rem;">
    <img src="img/banner/banner4.png" class="card-img-top" alt="...">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#customModal" style="background-color: #850e35;">
        Let's Start
    </button>
</div>
<!-- Banner end -->

<!-- Modal -->
<div class="modal fade" id="customModal" tabindex="-1" aria-labelledby="customModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="customModalLabel">Customize Your Accessories</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulir untuk memasukkan data yang ingin disesuaikan -->
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="customData" class="form-label">Category</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="category" id="necklaces" value="Necklaces">
                            <label class="form-check-label" for="necklaces">
                                Necklaces
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="category" id="bracelet" value="Bracelet">
                            <label class="form-check-label" for="bracelet">
                                Bracelet
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="category" id="ring" value="Ring">
                            <label class="form-check-label" for="ring">
                                Ring
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="category" id="hair_accessories" value="Hair Accessories">
                            <label class="form-check-label" for="hair_accessories">
                                Hair Accessories
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="category" id="key_chain" value="Key Chain">
                            <label class="form-check-label" for="key_chain">
                                Key Chain
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="customData" class="form-label">Size</label>
                        <input type="text" class="form-control" id="customData" name="size" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleColorInput" class="form-label">Colors</label>
                        <input type="color" class="form-control form-control-color col-md-2" id="exampleColorInput" value="#563d7c" name="color" title="Choose your color">
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="form-label">Photo</label>
                        <input type="file" class="form-control" id="photo" name="photo">
                    </div>
                    <div class="mb-3">
                        <label for="details" class="form-label">Details</label>
                        <input type="text" class="form-control" id="details" name="details" required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="price" name="price" value="<?php echo isset($priceFormatted) ? $priceFormatted : ''; ?>" readonly>
                    </div>
                    <form action="shop-cart.php" method="POST">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary" style="background-color: #850e35;">Add to cart</button>
                        </div>
                    </form>
                </form>
            </div>
        </div>
    </div>
</div>

<br>
<br>
<br>
<br>
<?php
include 'layouts/footer.php';
?>