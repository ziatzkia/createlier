<?php
session_start();
include '../server/connection.php';

if (isset($_SESSION['admin_logged_in'])) {
  header('location: index.php');
  exit;
}

if (isset($_POST['email_or_phone']) && isset($_POST['pwd'])) {
  $email_or_phone = $_POST['email_or_phone'];
  $pwd = $_POST['pwd'];

  $query = "SELECT * FROM admins WHERE (email = ? OR phone = ?) AND pwd = ? LIMIT 1";
  $stmt_login = $conn->prepare($query);
  $stmt_login->bind_param('sss', $email_or_phone, $email_or_phone, $pwd);

  if ($stmt_login->execute()) {
    $stmt_login->store_result();

    if ($stmt_login->num_rows() == 1) {
      $stmt_login->bind_result($id, $photo, $username, $email, $phone, $saldo, $pwd);
      $stmt_login->fetch();

      $_SESSION['id'] = $id;
      $_SESSION['photo'] = $photo;
      $_SESSION['username'] = $username;
      $_SESSION['email'] = $email;
      $_SESSION['phone'] = $phone;
      $_SESSION['saldo'] = $saldo;
      $_SESSION['admin_logged_in'] = true;

      header('location: index.php?message=Logged in successfully');
    } else {
      header('location: loginAdmin.php?error=Could not verify your account');
    }
  } else {
    header('location: loginAdmin.php?error=Something went wrong!');
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../img/logo/logo cc.png">
  <title> Login Admin | Createlier</title>
  <link rel="stylesheet" href="../style/loginRegister.css">
</head>

<body class="login-admin-bg">
  <div class="wrapper"> <!--wrapper-->
    <form autocomplete="off" id="login-form" method="POST" action="loginAdmin.php">
      <?php if (isset($_GET['error'])) ?>
      <div role="alert">
        <?php if (isset($_GET['error'])) {
          echo $_GET['error'];
        }
        ?>
        <div class="form-container">
          <img src="../img/logo/logo createlier.png" alt="logo" width="100px">
          <h2>Login Admin</h2>
          <div class="form-group">
            <input autocomplete="new-email" type="text" name="email_or_phone" placeholder="Email/Phone">
          </div>
          <div class="form-group">
            <input autocomplete="new-pwd" type="password" name="pwd" placeholder="Password" required>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="checkId">
            <label class="form-check-label" for="checkId">
              Remember me
            </label>
          </div>
          <button type="submit">Login</button>
        </div>
      </div>
    </form>
  </div>
</body>

</html>