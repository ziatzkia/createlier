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

<body class="p-3 m-0 border-0 bd-example m-0 border-0" background="img/walpaper.jpg">
    <a href="index.php"><img src="img/banner/icon/close.png" alt="close" width="30px"></a>
    <div class="row g-0 position-relative bg-profile-1">
    <h1 class="h1-profil">Profile</h1>
        <div class="col-md-6 mb-md-0 p-md-4">
            <p><img class="img-profile" src="img/profil/<?php echo $user['photo']; ?>" alt="Profile Picture" width="200px"></p>
        </div>
        <div class="col-md-6 p-4 ps-md-0">
            <p><strong  class="text-profile-1">Username: </strong> <?php echo $user['username']; ?></p>
            <p><strong  class="text-profile-1">Email: </strong><?php echo $user['email']; ?></p>
            <p><strong  class="text-profile-1">Phone: </strong><?php echo $user['phone']; ?></p>
            <p><strong  class="text-profile-1">Address: </strong><?php echo $user['alamat']; ?></p>
            <p><strong  class="text-profile-1">Gender: </strong><?php echo $user['gender']; ?></p>
            <button class="btn-edit-profile btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                Edit Profile
            </button>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog text-profile-1">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="editProfile.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body te">
                        <div class="mb-3">
                            <label for="photo" class="form-label">Profile Photo</label>
                            <input type="file" class="form-control" id="photo" name="photo">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $user['username']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $user['phone']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Address</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $user['alamat']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-control" id="gender" name="gender" required>
                                <option value="Male" <?php echo ($user['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                                <option value="Female" <?php echo ($user['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>