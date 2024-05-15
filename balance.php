<?php
session_start();
include 'server/connection.php';

$id = $_SESSION['id'];

$query = "SELECT * FROM akun WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $saldo = $user['saldo'];
} else {
    $saldo = 0;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logo/logo cc.png">
    <title>User Balance</title>
    <link rel="stylesheet" href="style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <!-- Display message -->
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-info">
                <?php echo $_SESSION['message']; ?>
                <?php unset($_SESSION['message']); ?>
            </div>
        <?php endif; ?>

        <h1>User Balance</h1>
        <p><img src="img/icon/top-up.png" alt="top-up" width="50px"> Rp.<?php echo number_format($saldo, 0, ',', '.') ?>,-</p>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#topUpModal">Top Up Balance</button>
    </div>

    <!-- Top-Up Modal -->
    <div class="modal fade" id="topUpModal" tabindex="-1" aria-labelledby="topUpModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="topUpModalLabel">Top Up Balance</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="topUpForm" method="post" action="topup.php">
                        <div class="mb-3">
                            <label for="saldo" class="form-label">Amount</label>
                            <input type="number" class="form-control" id="amount" name="saldo" required>
                        </div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmModal" data-bs-dismiss="modal">Top Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Confirmation Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Confirm Top Up</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to top up the balance?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="confirmTopUp">Yes, Top Up</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('confirmTopUp').addEventListener('click', function () {
            document.getElementById('topUpForm').submit();
        });
    </script>
</body>

</html>
