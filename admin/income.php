<?php
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header('location: loginAdmin.php');
}
?>

<?php include('layouts/header.php'); ?>

<?php
$query_incomes = "SELECT o.order_id, o.order_cost, o.order_date, a.id, oi.product_name, oi.product_quantity, oi.product_price
                    FROM `orders` o, `akun` a, `order_items` oi 
                    WHERE o.id = a.id AND a.id = oi.id AND o.order_status = 'DELIVERED' OR order_status = 'SHIPPED' OR order_status = 'PAID'
                    ORDER BY o.order_date DESC";


$stmt_incomes = $conn->prepare($query_incomes);
$stmt_incomes->execute();
$incomes = $stmt_incomes->get_result();

$kurs_dollar = 15722;

    function setRupiah($price)
    {
        $result = "Rp".number_format($price, 0, ',', '.');
        return $result;
    }
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-white">Income</h1>
    <nav class="mt-4 rounded" aria-label="breadcrumb">
        <ol class="breadcrumb px-3 py-2 rounded mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Income</li>
        </ol>
    </nav>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Income</h6>
        </div>
        <div class="card-body">
            <?php if (isset($_GET['success_status'])) { ?>
                <div class="alert alert-info" role="alert">
                    <?php if (isset($_GET['success_status'])) {
                        echo $_GET['success_status'];
                    } ?>
                </div>
            <?php } ?>
            <?php if (isset($_GET['fail_status'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php if (isset($_GET['fail_status'])) {
                        echo $_GET['fail_status'];
                    } ?>
                </div>
            <?php } ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Date</th>
                            <th>Income</th>
                            <th>Other</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($incomes as $income) { ?>
                            <tr>
                                <td><?php echo $income['order_id']; ?></td>
                                <td><?php echo $income['order_date']; ?></td>
                                <td><?php echo setRupiah(($income['order_cost'] * $kurs_dollar)); ?></td>
                                <td class="text-center">
                                    <a href="#displayDetailIncome" data-toggle="modal">detail</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<div class="modal fade" id="displayDetailIncome" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Detail Income</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6" style="color: black;">
                                        <p>Order ID: </p>  
                                        <p>User ID: </p> 
                                        <p>Date: </p> 
                                        <p>Product: </p>  
                                        <p>Item Price: </p>
                                        <p>Income: </p>
                                    </div>
                                    <div class="col-sm-6 col-md-6"">
                                        <p><?php echo $income['order_id'];?></p>  
                                        <p><?php echo $income['id'];?></p> 
                                        <p><?php echo $income['order_date'];?></p>
                                        <p><?php echo $income['product_name'];?> x<?php echo $income['product_quantity'];?></p> 
                                        <p><?php echo setRupiah(($income['product_price'] * $kurs_dollar));?></p>
                                        <p><?php echo setRupiah(($income['order_cost'] * $kurs_dollar)); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

</div>
<!-- End of Main Content -->
<?php include('layouts/footer.php'); ?>