<?php
session_start();
include 'layouts/header.php';
?>

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Customize</h4>
                    <div class="breadcrumb__links">
                        <a href="index.php">Home</a>
                        <span>Custom Accessories</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<br>
<br>
<br>
<!-- banner -->
<div class="card mx-auto" style="width: 50rem;">
    <img src="img/banner/banner4.png" class="card-img-top" alt="...">
    <div class="card-body">
        <p class="card-text mx-auto">Enhance Your Style with Your Own Unique Touch at Createlier</p>
    </div>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#customModal" style="background-color: #850e35;">
        CREATE
    </button>
</div>
<!-- banner end -->

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
                <form action="proses_custom.php" method="POST">
                    <div class="mb-3">
                        <label for="customData" class="form-label">Kategori</label>
                        <input type="text" class="form-control" id="customData" name="customData" required>
                    </div>
                    <div class="mb-3">
                        <label for="customData" class="form-label">Category</label>
                        <input type="radio" class="form-control" id="customData" name="customData" required>
                    </div>
                    <div class="mb-3">
                        <label for="customData" class="form-label">Size</label>
                        <input type="text" class="form-control" id="customData" name="customData" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleColorInput" class="form-label">Color picker</label>
                        <input type="color" class="form-control form-control-color col-md-2" id="exampleColorInput" value="#563d7c" title="Choose your color">
                    </div>
                    <div class="mb-3">
                        <label for="customData" class="form-label">Details</label>
                        <input type="text" class="form-control" id="customData" name="customData" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add to cart</button>
                </form>
            </div>
        </div>
    </div>
</div>


<br>
<br>
<br>
<br>
<br>
<br>
<?php
include 'layouts/footer.php';
?>