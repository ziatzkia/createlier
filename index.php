<?php
include 'server/connection.php';

if (isset($_SESSION['logged in'])) {
    header('location: index.php');
    exit;
}

if (isset($_GET['logout'])) {
    if (isset($_SESSION['logged_in'])) {
        unset($_SESSION['logged_in']);
        unset($_SESSION['user_email']);
        header('location: index.php');
        exit;
    }
}

$q_select = 'SELECT * FROM akun';
$result = mysqli_query($conn, $q_select);

include 'layouts/header.php';
?>

<?php
include 'layouts/footer.php';
?>

