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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="icon" type="x-icon" href="img/logo/logo cc.png">
</head>

<body class="p-3 m-0 border-0 bd-example m-0 border-0 bg-profile">
    <h1>User Profile</h1>
    <div class="row g-0 position-relative bg-profile-1">
        <div class="col-md-6 mb-md-0 p-md-4">
            <p><img class="img-profile" src="img/profil/<?php echo $user['photo']; ?>" alt="Profile Picture" width="200px"></p>
        </div>
        <div class="col-md-6 p-4 ps-md-0">
            <p><strong  class="text-profile-1">Username: </strong> <?php echo $user['username']; ?></p>
            <p><strong  class="text-profile-1">Email: </strong><?php echo $user['email']; ?></p>
            <p><strong  class="text-profile-1">Phone: </strong><?php echo $user['phone']; ?></p>
            <p><strong  class="text-profile-1">Address: </strong><?php echo $user['alamat']; ?></p>
            <p><strong  class="text-profile-1">Gender: </strong><?php echo $user['gender']; ?></p>
            <button class="btn-edit-profile">
                <a href="#" class="text-profile">Edit Profile</a>
            </button>
        </div>
    </div>

</body>

</html>