<?php
session_start();
include 'server/connection.php';

if (isset($_GET['logout'])) {
    if (isset($_SESSION['logged_in'])) {
        unset($_SESSION['logged_in']);
        unset($_SESSION['user_email']);
        header('location: index.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="../img/logo/logo createlier.png" alt="logo" width="40px">
                <img src="../img/logo/logo.png" alt="brand" width="200px" height="30px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="shop.php">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="custom.php">Custom</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="about.php">About Us</a>
                    </li>
                </ul>
                <!-- <form class="form-inline my-2 my-lg-0 d-flex justify-content-center">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" style="width: 60%;">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="bi bi-search"></i></button>
                </form> -->
                <form class="form-inline my-2 my-lg-0">
                    <a href="../user/shoppingBag.php">
                        <img src="../img/icon/shopping-bag.png" alt="shopping bag" width="30px" height="30px">
                    </a>
                    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) { ?>
                        <button class="btn btn-outline-success my-2 my-sm-0" type="button" data-bs-toggle="modal" data-bs-target="#profileModal">Profile</button>
                    <?php } else { ?>
                        <div class="btn-container">
                            <a href="login.php">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sign in</button>
                            </a>
                        </div>
                    <?php } ?>
                </form>
            </div>
        </div>
    </nav>


    <!-- Modal -->
    <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modalBg">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileModalLabel">Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php
                    echo '<div class="row">';
                    echo '<div class="col">';
                    echo '<td><a href="' . $_SESSION['photo'] . '"><img src="../img/profil/' . $_SESSION['photo'] . '" alt="Foto User" class="profpic"></a></td>';
                    echo '<p><strong>Email:</strong> ' . $_SESSION['email'] . '</p>';
                    echo '<p><strong>Phone:</strong> ' . $_SESSION['phone'] . '</p>';
                    echo '<p><strong>Address:</strong> ' . $_SESSION['alamat'] . '</p>';
                    echo '<p><strong>Gender:</strong> ' . $_SESSION['gender'] . '</p>';
                    echo '<p><strong>Saldo:</strong> ' . $_SESSION['saldo'] . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '<hr>';
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="logoutAdmin.php">
                        <button type="button" class="btn btn-primary logout">Logout</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>