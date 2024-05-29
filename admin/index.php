<?php
session_start();
include('../server/connection.php');

if (!isset($_SESSION['admin_logged_in'])) {
    header('location: loginAdmin.php');
    exit;
}
?>

<?php
$query_total_orders = "SELECT COUNT(*) AS total_orders FROM orders";
$stmt_total_orders = $conn->prepare($query_total_orders);
$stmt_total_orders->execute();
$stmt_total_orders->bind_result($total_orders);
$stmt_total_orders->store_result();
$stmt_total_orders->fetch();

$query_total_payments = "SELECT SUM(order_cost) AS total_payments FROM orders";
$stmt_total_payments = $conn->prepare($query_total_payments);
$stmt_total_payments->execute();
$stmt_total_payments->bind_result($total_payments);
$stmt_total_payments->store_result();
$stmt_total_payments->fetch();

$query_total_paid = "SELECT COUNT(*) AS total_paid FROM orders WHERE order_status = 'DELIVERED' OR order_status = 'SHIPPED' OR order_status = 'PAID'";
$stmt_total_paid = $conn->prepare($query_total_paid);
$stmt_total_paid->execute();
$stmt_total_paid->bind_result($total_paid);
$stmt_total_paid->store_result();
$stmt_total_paid->fetch();

$query_total_not_paid = "SELECT COUNT(*) AS total__not_paid FROM orders WHERE order_status = 'NOT PAID'";
$stmt_total_not_paid = $conn->prepare($query_total_not_paid);
$stmt_total_not_paid->execute();
$stmt_total_not_paid->bind_result($total_not_paid);
$stmt_total_not_paid->store_result();
$stmt_total_not_paid->fetch();

$kurs_dollar = 15722;

function setRupiah($price)
{
    $result = "Rp. " . number_format($price, 0, ',', '.');
    return $result;
}

// Query to fetch weekly orders count along with order_date
$query_weekly_orders = "SELECT COUNT(*) AS orders_count, order_date FROM orders GROUP BY WEEK(order_date)";
$stmt_weekly_orders = $conn->prepare($query_weekly_orders);
$stmt_weekly_orders->execute();
$weekly_orders_data = $stmt_weekly_orders->get_result()->fetch_all(MYSQLI_ASSOC);

// Query untuk mengambil total pendapatan tiap minggu dari database
$query_weekly_earnings = "SELECT WEEK(order_date) AS week, SUM(order_cost) AS earnings FROM orders GROUP BY WEEK(order_date)";
$stmt_weekly_earnings = $conn->prepare($query_weekly_earnings);
$stmt_weekly_earnings->execute();
$weekly_earnings_data = $stmt_weekly_earnings->get_result()->fetch_all(MYSQLI_ASSOC);

// Query untuk mengambil data produk terlaris/paling banyak dibeli
$query_best_selling_products = "SELECT product_name, COUNT(*) AS total_sold FROM order_items GROUP BY product_name ORDER BY total_sold DESC LIMIT 10";
$stmt_best_selling_products = $conn->prepare($query_best_selling_products);
$stmt_best_selling_products->execute();
$best_selling_products_data = $stmt_best_selling_products->get_result()->fetch_all(MYSQLI_ASSOC);

?>

<?php include('layouts/header.php'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-white">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Orders</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php if (isset($total_orders)) {
                                                                                    echo $total_orders;
                                                                                } ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-bag fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Income</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php if (isset($total_payments)) {
                                                                                    echo setRupiah(($total_payments * $kurs_dollar));
                                                                                } ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Paid</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php if (isset($total_paid)) {
                                                                                    echo $total_paid;
                                                                                } ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-receipt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Not Paid</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php if (isset($total_not_paid)) {
                                                                                    echo $total_not_paid;
                                                                                } ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments-dollar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Row -->

</div>
<!-- /.container-fluid -->
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Number of Orders Each Week</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Period</th>
                                    <th>Total Orders</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Tampilkan data dari query $weekly_orders_data
                                foreach ($weekly_orders_data as $week_data) {
                                    // Mendapatkan tanggal awal dan akhir untuk setiap minggu
                                    $week_start = date("d/m", strtotime("monday this week", strtotime($week_data['order_date'])));
                                    $week_end = date("d/m", strtotime("sunday this week", strtotime($week_data['order_date'])));

                                    // Menampilkan durasi hari dalam format yang diminta
                                    echo "<td>$week_start - $week_end</td>";
                                    echo "<td>" . $week_data['orders_count'] . "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Earnings Every Week</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Period</th>
                                    <th>Income</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Tampilkan data dari query $weekly_earnings_data
                                foreach ($weekly_earnings_data as $week_earning) {
                                    // Mendapatkan tanggal awal dan akhir untuk setiap minggu
                                    $week_start = date("d/m", strtotime("monday this week", strtotime($week_earning['week'])));
                                    $week_end = date("d/m", strtotime("sunday this week", strtotime($week_earning['week'])));

                                    // Menampilkan durasi hari dalam format yang diminta
                                    echo "<tr>";
                                    echo "<td>$week_start - $week_end</td>";
                                    echo "<td>" . setRupiah(($week_earning['earnings'] * $kurs_dollar)) . "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Best Selling Products</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Sold</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Tampilkan data dari query $best_selling_products_data
                        foreach ($best_selling_products_data as $product) {
                            echo "<tr>";
                            echo "<td>" . $product['product_name'] . "</td>";
                            echo "<td>" . $product['total_sold'] . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

    <!-- End of Main Content -->



    <?php include('layouts/footer.php'); ?>