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
    $user = $result->fetch_assoc(); // Ambil data pengguna
} else {
    echo "User not found";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="icon" type="x-icon" href="img/logo/logo cc.png">
    <title>Profile User</title>
</head>

<body>
    <h1>User Profile</h1>
    <p><img src="img/profil/<?php echo $user['photo']; ?>" alt="Profile Picture" width="200px"></p>
    <p><strong>Username:</strong> <?php echo $user['username']; ?></p>
    <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
    <p><strong>Phone:</strong> <?php echo $user['phone']; ?></p>
    <p><strong>Address:</strong> <?php echo $user['alamat']; ?></p>
    <p><strong>Gender:</strong> <?php echo $user['gender']; ?></p>
</body>

</html>
