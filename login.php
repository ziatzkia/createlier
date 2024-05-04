<?php
session_start();
include('server/connection.php');

if (isset($_SESSION['logged_in'])) {
  header('location: welcome.php');
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
      header('location: test.php?error=Cound not verify your account');
    }
  } else {
    header('location: test.php?error=Something went wrong!');
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login page</title>
  <link rel="stylesheet" href="styleLogin.css">
</head>

<body>
  <div class="top"> <!--wrapper-->
    <form autocomplete="off" id="login-form" method="POST" action="indexW2.php">
      <?php if (isset($_GET['error'])) ?>
      <div role="alert">
        <?php if (isset($_GET['error'])) {
          echo $_GET['error'];
        }
        ?>
        <div class="bottom">
          <img src="media/createlier-removebg-preview.png" alt="logo tulisan">
          <h1>Login</h1>
          <div class="form">
            <!-- <input type="email" palceholder="email address" -->
            <input autocomplete="new-email" type="text" name="email_or_phone" placeholder="Email/Phone">
            <!-- <input type="password" palceholder="password"> -->
            <input autocomplete="new-password" type="password" name="password" placeholder="Password">
          </div>
          <div class="button-login">
            <!-- <button> Login </button> -->
            <input type="submit" id="login-btn" name="login_btn" value="Login">
          </div>
          <div class="footer">
            <a href="#">Forgot your password?</a>
            <p>Don't have an account? <a href="register.php">Register here</a>.</p>

          </div>
        </div>
      </div>
    </form>

  </div>
</body>

</html>