<?php
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header('location: loginAdmin.php');
}
?>

<?php include('layouts/header.php'); ?>

<?php
$query_orders = "SELECT o.order_id, o.order_cost, o.order_status, a.username, o.user_city, o.order_date 
FROM `orders` o, `akun` a WHERE o.id = a.id
ORDER BY o.order_date DESC";
// "SELECT o.order_id, o.order_cost, o.order_status, a.username, o.user_city, o.order_date 
// FROM `orders` o
// JOIN `akun` a ON o.user_id = a.id
// ORDER BY o.order_date DESC";

$stmt_orders = $conn->prepare($query_orders);
$stmt_orders->execute();
$orders = $stmt_orders->get_result();
?>

<!-- Begin Page Content -->
<div class="container-fluid content-wrapper">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-white">Orders</h1>
    <nav class="mt-4 rounded" aria-label="breadcrumb">
        <ol class="breadcrumb px-3 py-2 rounded mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Orders</li>
        </ol>
    </nav>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Orders</h6>
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
                            <th>Cost</th>
                            <th>Status</th>
                            <th>Name</th>
                            <th>City</th>
                            <th>Transaction Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($orders as $order) { ?>
                            <tr>
                                <td><?php echo setRupiah ($order['order_cost']* $kurs_dollar); ?></td>
                                <td><?php echo $order['order_status']; ?></td>
                                <td><?php echo $order['username']; ?></td>
                                <td><?php echo $order['user_city']; ?></td>
                                <td><?php echo $order['order_date']; ?></td>
                                <td class="text-center">
                                    <a href="edit_order.php?order_id=<?php echo $order['order_id']; ?>" class="btn btn-info btn-circle">
                                        <i class="fas fa-edit"></i>
                                    </a>
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

</div>
<!-- End of Main Content -->
<?php include('layouts/footer.php'); ?>