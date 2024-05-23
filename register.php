<?php
include 'server/connection.php';

if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['alamat']) && isset($_POST['gender']) && isset($_POST['pwd'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $alamat = $_POST['alamat'];
    $gender = $_POST['gender'];
    $pwd = $_POST['pwd'];

    $checkQuery = "SELECT * FROM akun WHERE username = '$username' or  email = '$email' or pwd = '$pwd'";
    $result = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($result) > 0) {
        $message = "Username, email, or password already exists in the database.";
    } else {
        // Jika tidak ada, insert data ke database
        $query = "INSERT INTO akun (username, email, phone, alamat, gender, pwd) VALUES ('$username', '$email', '$phone', '$alamat', '$gender', '$pwd')";
        $insertResult = mysqli_query($conn, $query);

        if ($insertResult) {
            // Jika berhasil insert, arahkan ke halaman registrasi dengan parameter dataMasuk
            header("Location: register.php?dataMasuk=true");
            exit(); // Hentikan eksekusi script setelah melakukan redirect
        } else {
            // Jika gagal insert, arahkan kembali ke halaman registrasi dengan parameter error
            $message = "Failed to register. Please try again later.";
        }
    }
}

$q_select = 'SELECT * FROM akun';
$result = mysqli_query($conn, $q_select);

$dataMasuk = isset($_GET["dataMasuk"]) && $_GET["dataMasuk"] == "true";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logo/logo cc.png">
    <title>Sign Up | Createlier</title>
    <link rel="stylesheet" href="style/loginRegister.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="login-bg">
    <div class="container">
        <div class="left-section">
            <h1>Sign Up to</h1>
            <h1>find your treasure</h1>
        </div>
        <div class="right-section">
            <div class="form-container">
                <img src="img/logo/logo.png" alt="brand" width="70%">
                <?php if ($dataMasuk) { ?>
                    <div class="alert alert-success alert-dismissible fade show mt-10" role="alert">
                        Anda berhasil registrasi!
                        <a href="register.php" class="close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </a>
                    </div>
                <?php } ?>
                <?php if (!empty($message)) { ?>
                    <div class="alert alert-danger alert-dismissible fade show mt-10" role="alert">
                        <?php echo $message; ?>
                        <a href="register.php" class="close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </a>
                    </div>
                <?php } ?>

                <form method="post" action="register.php">
                    <div class="form-group row">
                        <label for="username" class="col-sm-3 col-form-label">Username:</label>
                        <div class="col-sm-9">
                            <input type="text" id="username" name="username" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Email:</label>
                        <div class="col-sm-9">
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-3 col-form-label">Phone:</label>
                        <div class="col-sm-9">
                            <input type="text" id="phone" name="phone" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-3 col-form-label">Address:</label>
                        <div class="col-sm-9">
                            <input type="text" id="alamat" name="alamat" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gender" class="col-sm-3 col-form-label">Gender:</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="gender" name="gender" required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="pwd" class="col-sm-3 col-form-label">Password:</label>
                        <div class="col-sm-9">
                            <input type="password" id="pwd" name="pwd" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-9 offset-sm-3">
                            <button type="submit" class="btn-register" background-color="#850E35">Register</button>
                        </div>
                    </div>
                </form>
                <p class="text-center">Already have an account? <a href="login.php">Login here</a>.</p>
            </div>
        </div>

</body>

</html>