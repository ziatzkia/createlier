<?php
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header('location: loginAdmin.php');
    exit();
}

include('layouts/header.php');
include('../server/connection.php');

$query_topups = "SELECT t.topup_id, t.id, t.request_balance, t.topup_date, t.topup_status, ad.saldo
                 FROM `topup` t
                 JOIN `admins` ad ON t.id = ad.id
                 ORDER BY t.topup_date ASC";

$stmt_topups = $conn->prepare($query_topups);
$stmt_topups->execute();
$topups = $stmt_topups->get_result();

$query_saldo_admin = "SELECT saldo AS saldo_admin FROM admins LIMIT 1"; // Asumsi ada satu admin
$stmt_saldo_admin = $conn->prepare($query_saldo_admin);
$stmt_saldo_admin->execute();
$stmt_saldo_admin->bind_result($saldo_admin);
$stmt_saldo_admin->fetch();

$kurs_dollar = 15722;

function setRupiah($price)
{
    return "Rp. " . number_format($price, 0, ',', '.');
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-white">User Top-up Balance</h1>
    <nav class="mt-4 rounded" aria-label="breadcrumb">
        <ol class="breadcrumb px-3 py-2 rounded mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">User Top-up Balance</li>
        </ol>
    </nav>

    <!-- Earnings (Monthly) Card Example -->
    <div class="mb-4">
        <div class="card shadow h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Your Balance</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo setRupiah($saldo_admin * $kurs_dollar); ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">User Top-up Balance</h6>
        </div>
        <div class="card-body">
            <?php if (isset($_GET['success_status'])) { ?>
                <div class="alert alert-info" role="alert">
                    <?php echo $_GET['success_status']; ?>
                </div>
            <?php } ?>
            <?php if (isset($_GET['fail_status'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_GET['fail_status']; ?>
                </div>
            <?php } ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Top up ID</th>
                            <th>User ID</th>
                            <th>Date</th>
                            <th>Balance</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($topup = $topups->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $topup['topup_id']; ?></td>
                                <td><?php echo $topup['id']; ?></td>
                                <td><?php echo $topup['topup_date']; ?></td>
                                <td><?php echo setRupiah($topup['request_balance'] * $kurs_dollar); ?></td>
                                <td><?php echo $topup['topup_status']; ?></td>
                                <td class="text-center">
                                    <?php if ($topup['topup_status'] == 'PENDING') { ?>
                                        <button class="btn-success fas fa-long-arrow-alt-up" style="color: white; border: none; border-radius: 50%; background-color: gold; padding: 5px; padding-left: 10px; padding-right: 10px;" href="#displayTopup" data-toggle="modal" onclick="topUp(<?php echo $topup['topup_id']; ?>, <?php echo $topup['request_balance']; ?>)"> </button>
                                    <?php } ?>
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

<!-- End of Main Content -->
<?php include('layouts/footer.php'); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
function topUp(topupId, requestBalance) {
    if (confirm("Are you sure you want to top-up this balance?")) {
        $.ajax({
            url: 'process_topup.php',
            type: 'POST',
            data: {
                topup_id: topupId,
                request_balance: requestBalance
            },
            success: function(response) {
                alert(response);
                location.reload();
            },
            error: function(xhr, status, error) {
                alert('Top-up failed. Please try again.');
            }
        });
    }
}
</script>
