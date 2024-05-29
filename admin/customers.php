<?php
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header('location: loginAdmin.php');
}
?>

<?php include('layouts/header.php'); ?>

<?php
$query_customers = "SELECT DISTINCT a.username, a.user_city, a.gender, o.order_date, o.order_id, o.order_cost, o.order_status 
                    FROM `akun` a
                    JOIN `orders` o ON a.id = o.id 
                    WHERE o.order_status IN ('DELIVERED', 'shipped', 'paid')
                    ORDER BY o.order_date DESC";

$stmt_customers = $conn->prepare($query_customers);
$stmt_customers->execute();
$customers = $stmt_customers->get_result();
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-white">Customers</h1>
    <nav class="mt-4 rounded" aria-label="breadcrumb">
        <ol class="breadcrumb px-3 py-2 rounded mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Customers</li>
        </ol>
    </nav>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Customers</h6>
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
                            <th>Username</th>
                            <th>City</th>
                            <th>Gender</th>
                            <th>Order Date</th>
                            <th>Other</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($customers as $customer) { ?>
                            <tr>
                                <td><?php echo htmlspecialchars($customer['username']); ?></td>
                                <td><?php echo htmlspecialchars($customer['user_city']); ?></td>
                                <td><?php echo htmlspecialchars($customer['gender']); ?></td>
                                <td><?php echo htmlspecialchars($customer['order_date']); ?></td>
                                <td class="text-center">
                                    <a href="#displayDetailCustomer" data-toggle="modal">detail</a>
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
<div class="modal fade" id="displayDetailCustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Detail Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6 col-md-6" style="color: black;">
                        <p>Username: <?php echo htmlspecialchars($customer['username']); ?></p>      
                        <p>City: <?php echo htmlspecialchars($customer['user_city']); ?></p> 
                        <p>Gender: <?php echo htmlspecialchars($customer['gender']); ?></p> 
                    </div>
                    <div class="col-sm-6 col-md-6" style="color: black;">
                        <p>Order ID: <?php echo htmlspecialchars($customer['order_id']); ?></p>  
                        <p>Cost: <?php echo htmlspecialchars($customer['order_cost']); ?></p>  
                        <p>Status: <?php echo htmlspecialchars($customer['order_status']); ?></p>  
                        <p>Order Date: <?php echo htmlspecialchars($customer['order_date']); ?></p> 
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- End of Main Content -->
<?php include('layouts/footer.php'); ?>
