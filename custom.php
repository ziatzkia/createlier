<?php
include './server/connection.php';

// Insert data
if (isset($_POST['submit_insert'])) {
    $path = "uploads/" . basename($_FILES['photo']['name']);

    $category = $_POST['category'];
    $ukuran = $_POST['ukuran'];
    $colour = $_POST['colour'];
    $photo = $_FILES['photo']['name'];
    $price = $_FILES['price']['name']; // Ganti ini dengan input yang sesuai
    $details = $_POST['detail']; // Tambahkan ini untuk detail

    if (move_uploaded_file($_FILES['photo']['tmp_name'], $path)) {
        $query = "INSERT INTO custom (category, ukuran, colour, photo, price, detail) VALUES ('$category', '$ukuran', '$colour', '$photo', '$price', '$details')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $success = true;
            header("location: index.php?dataMasuk=true");
        } else {
            $success = false;
            header("location: index.php?success=$success&error=Failed to Add");
        }
    } else {
        $success = false;
        header("location: index.php?success=$success&error=Failed to Upload Image");
    }
}

$sql = "SELECT * FROM custom";
$result = $conn->query($sql);

// notifikasi
$dataMasuk = isset($_GET["dataMasuk"]) && $_GET["dataMasuk"] == "true";
?>
<?php
include('layouts/header.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MySiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
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
    <!-- <div class="card mx-auto" style="width: 50rem;">
        <img src="img/banner/banner4.png" class="card-img-top" alt="...">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertModal" style="background-color: #850e35;">
            Let's Start
        </button>
    </div> -->
    <!-- Banner end -->

    <div class="container">
        <h2>Custom</h2>


        <?php if ($dataMasuk) { ?>
            <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                Anda berhasil menginput data!
                <a href="index.php" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
        <?php } ?>


        <!-- Modal Insert -->
        <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#insertModal">Insert Data</a>
        <div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="insertModallabel" aria-hidden="true">

            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="insertModallabel"> Insert Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="index.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="customData" class="form-label">Category</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="category" id="necklaces" value="Necklaces" <?php echo isset($category) && $category == 'Necklaces' ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="necklaces">
                                            Necklaces
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="category" id="bracelet" value="Bracelet" <?php echo isset($category) && $category == 'Bracelet' ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="bracelet">
                                            Bracelet
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="category" id="ring" value="Ring" <?php echo isset($category) && $category == 'Ring' ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="ring">
                                            Ring
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="category" id="hair_accessories" value="Hair Accessories" <?php echo isset($category) && $category == 'Hair Accessories' ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="hair_accessories">
                                            Hair Accessories
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="category" id="key_chain" value="Key Chain" <?php echo isset($category) && $category == 'Key Chain' ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="key_chain">
                                            Key Chain
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ukuran"> Size:</label>
                                <input type="text" class="form-control" id="ukuran" name="ukuran" required>
                            </div>
                            <div class="form-group">
                                <label for="colour"> Colour:</label>
                                <input type="color" class="form-control" id="colour" name="colour" style="width: 50px; height: 30px;" required>
                            </div>
                            <div class="form-group">
                                <label for="photo"> Photo: </label>
                                <input type="file" class="form-control-file mb-2" id="photo" name="photo" required>
                            </div>
                            <div class="form-group">
                                <label for="detail"> Details:</label>
                                <input type="text" class="form-control" id="detail" name="detail" required>
                            </div>
                            <div class="product__details__cart__option">
                            <form method="POST" action="custom-cart.php">
                                <button type="submit" name="add_to_cart" class="primary-btn" style="background-color: #850E35;">
                                    <i class="bi bi-cart"></i> Add to cart
                                </button>
                            </form>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
<?php
include('layouts/footer.php');
?>