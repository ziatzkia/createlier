<?php
session_start();
include 'server/connection.php';

if (!isset($_SESSION['logged_in'])) {
    header('location: login.php');
    exit;
}

$id = $_SESSION['id'];

$query = "SELECT * FROM akun WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $saldo = $result->fetch_assoc(); // Ambil data saldo
} else {
    // Jika saldo tidak ditemukan, tambahkan catatan bahwa saldo belum ditetapkan
    $saldo['saldo'] = "Ups saldo anda Rp.0,- silahkan top up saldo!";
}
?>

<h1>User Balance</h1>
<p><strong>Balance:</strong> Rp.<?php echo number_format($saldo['saldo'], 0, ',', '.') ?>,-</p>
<button>
    <a href="topup.php" class="btn btn-primary">Top Up Balance</a>
</button>
