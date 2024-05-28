<?php
include 'server/connection.php';

if (isset($_GET['logout'])) {
    if (isset($_SESSION['logged_in'])) {
        unset($_SESSION['logged_in']);
        unset($_SESSION['user_email']);
        unset($_SESSION['photo']);
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
    <link rel="icon" href="img/logo/logo cc.png">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="./img/logo/logo createlier.png" alt="logo" width="40px">
                <img src="./img/logo/logo.png" alt="brand" width="200px" height="30px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item jarak">
                        <a class="nav-link active" href="index.php">Home</a>
                    </li>
                    <li class="nav-item jarak">
                        <a class="nav-link active" href="shop.php">Shop</a>
                    </li>
                    <li class="nav-item jarak">
                        <a class="nav-link active" href="custom.php">Custom</a>
                    </li>
                    <li class="nav-item jarak">
                        <a class="nav-link active" href="about.php">About us</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <a class="jarak-ikon" href="../favorite.php">
                        <img src="./img/icon/like.png" alt="favorite" width="25px" height="25px">
                    </a>
                    <a class="jarak-ikon" href="../shop-cart.php">
                        <img src="./img/icon/shopping-bag (2).png" alt="shopping bag" width="30px" height="30px">
                    </a>
                    <span class="vertical-line  jarak-ikon">|</span>
                    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) { ?>
                        <?php
                        // Path relatif untuk foto profil
                        $profilePhoto = isset($_SESSION['photo']) ? './img/profil/' . $_SESSION['photo'] : 'default_photo.png'; ?>
                        <div class="btn-group dropstart">
                            <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="<?php echo $profilePhoto; ?>" alt="Profile Picture" width="30px" class="dd-profile">
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item dd-item" href="./profil.php">Profile</a></li>
                                <li><a class="dropdown-item dd-item" href="#">History</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item dd-logout" href="./logout.php">Logout</a></li>
                            </ul>
                        </div>
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

<<<<<<< HEAD
=======

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
                    echo '<p><strong>Address:</strong> ' . $_SESSION['user_city'] . '</p>';
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

>>>>>>> 88b6c26758afca359e8d0aaf4de86ec52fb5ab1a
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>