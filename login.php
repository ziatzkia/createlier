<?php
session_start();
include('server/connection.php');

if (isset($_SESSION['logged_in'])) {
  header('location: login.php');
  exit;
}

if (isset($_POST['login_btn'])) {
  $email_or_phone = $_POST['email_or_phone'];
  $password = $_POST['password'];

  $query = "SELECT * FROM akun WHERE (email = ? OR phone = ?) AND password = ? LIMIT 1";

  $stmt_login = $conn->prepare($query);
  $stmt_login->bind_param('sss', $email_or_phone, $email_or_phone, $password);

  if ($stmt_login->execute()) {
    $stmt_login->bind_result($id, $username, $email, $phone, $gender, $alamat, $saldo, $photo, $password);
    $stmt_login->store_result();

    if ($stmt_login->num_rows() == 1) {
      $stmt_login->fetch();

      $_SESSION['id'] = $id;
      $_SESSION['username'] = $username;
      $_SESSION['email'] = $email;
      $_SESSION['phone'] = $phone;
      $_SESSION['gender'] = $gender;
      $_SESSION['alamat'] = $alamat;
      $_SESSION['saldo'] = $saldo;
      $_SESSION['photo'] = $photo;
      $_SESSION['logged_in'] = true;

      header('location: welcome.php?message=Logged in succesfully');
    } else {
      header('location: login.php?error=Cound not verify your account');
    }
  } else {
    header('location: login.php?error=Something went wrong!');
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | createlier</title>
  <link rel="stylesheet" href="style/registrasi.css">
</head>

<body>
  <div class=""> <!--wrapper-->
    <form autocomplete="off" id="login-form" method="POST" action="index.php">
      <?php if (isset($_GET['error'])) ?>
      <div role="alert">
        <?php if (isset($_GET['error'])) {
          echo $_GET['error'];
        }
        ?>
        <div class="form-container">
          <img src="gambar/logo.png" alt="logo tulisan">
          <h1>Login</h1>
          <div class="form-group">
            <input autocomplete="new-email" type="text" name="email_or_phone" placeholder="Email/Phone">
          </div>
          <div class="form-group">
            <input autocomplete="new-password" type="password" name="password" placeholder="Password">
          </div>
          <button type="submit">Login</button>
          <div>
            <p><a href="#">Forgot your password?</a></p>
            <p>Don't have an account? <a href="register.php">Register here</a>.</p>

          </div>
        </div>
      </div>
    </form>

  </div>
</body>

</html>