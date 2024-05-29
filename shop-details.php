<?php
include('server/connection.php');

function setRupiah($amount)
{
    return 'Rp. ' . number_format($amount, 2, ',', '.');
}

$kurs_dollar = 15000;

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    $query = "SELECT * FROM products WHERE product_id=$product_id";

    $stmt = $conn->prepare($query);

    $stmt->execute();

    $product_details = $stmt->get_result();
} else {
    header('location: index.php');
}

include('layouts/header.php');
?>

<!-- Shop Details Section Begin -->
<section class="shop-details">
    <?php while ($row = $product_details->fetch_assoc()) { ?>
        <div class="container">
            <div class="row">
                <div class="col-md-6 mt-5">
                    <div class="product__details__pic__item" style="align-content: center; ">
                        <img src="img/shop-details/<?php echo $row['product_image2']; ?>" alt="" class="img-fluid" style="align-content: center;">
                    </div>
                </div>
                <div class="col-md-6 mt-5">
                    <div class="product__details__text">
                        <h4><?php echo $row['product_name']; ?></h4>
                        <h3><?php echo setRupiah($row['product_price'] * $kurs_dollar); ?></h3>
                        <p><?php echo $row['product_description']; ?></p>
                        <div class="product__details__option">
                            <div class="product__details__option__size">
                                <span>Size:</span>
                                <label for="xxl">xxl
                                    <input type="radio" id="xxl" name="size">
                                </label>
                                <label class="active" for="xl">xl
                                    <input type="radio" id="xl" name="size">
                                </label>
                                <label for="l">l
                                    <input type="radio" id="l" name="size">
                                </label>
                                <label for="sm">s
                                    <input type="radio" id="sm" name="size">
                                </label>
                            </div>
                        </div>
                        <div class="product__details__cart__option">
                            <form method="POST" action="shop-cart.php">
                                <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                                <input type="hidden" name="product_image" value="<?php echo $row['product_image']; ?>">
                                <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>">
                                <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>">
                                <div class="quantity">
                                    <input type="number" name="product_quantity" value="1">
                                </div>
                                <button type="submit" name="add_to_cart" class="primary-btn" style="background-color: #850E35; color: white;">
                                    <i class="bi bi-cart"></i> add to chart
                                </button>
                            </form>
                        </div>
                        <div>
                            <!-- <button name="custom" class="primary-btn" style="background-color: white; border: solid 2px; border-color: #850E35;"> -->
                            <!-- <a href="custom-cart.php" style="color: #850E35;">Custom</a> -->
                            <!-- <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#insertModal" style="background-color: white; border: solid 2px; border-color: #850E35; color: #850E35;">Custom</a> -->

                            <!-- Modal -->
                            <!-- <div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="index.php" method="POST" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="ukuran"> Custom name:</label>
                                                    <input type="text" class="form-control" id="ukuran" name="ukuran" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="colour"> Colour:</label>
                                                    <input type="color" class="form-control" id="colour" name="colour" style="width: 50px; height: 30px;" required>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- </button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</section>
<!-- Shop Details Section End -->

<br>
<br>

<?php
include('layouts/footer.php');
?>