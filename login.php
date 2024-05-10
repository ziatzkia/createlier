<?php
session_start();
include('server/connection.php');

if (isset($_SESSION['logged_in'])) {
  header('location: index.php');
  exit;
}

if (isset($_POST['email_or_phone']) && isset($_POST['pwd'])) {
  $email_or_phone = $_POST['email_or_phone'];
  $pwd = $_POST['pwd'];

  $query = "SELECT * FROM akun WHERE (email = ? OR phone = ?) AND pwd = ? LIMIT 1";

  $stmt_login = $conn->prepare($query);
  $stmt_login->bind_param('sss', $email_or_phone, $email_or_phone, $pwd);

  if ($stmt_login->execute()) {
    $stmt_login->store_result();

    if ($stmt_login->num_rows() == 1) {
      $stmt_login->bind_result($id, $username, $email, $phone, $gender, $alamat, $saldo, $photo, $pwd);
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

      header('location: index.php?message=Logged in succesfully');
    } else {
      header('location: login.php?error=Could not verify your account');
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
  <link rel="icon" href="img/logo/logo cc.png">
  <title> Login | Createlier</title>
  <link rel="stylesheet" href="style/loginRegister.css">
</head>

<body>
  <div class="wrapper"> <!--wrapper-->
    <form autocomplete="off" id="login-form" method="POST" action="login.php">
      <?php if (isset($_GET['error'])) ?>
      <div role="alert">
        <?php if (isset($_GET['error'])) {
          echo $_GET['error'];
        }
        ?>
        <div class="form-container">
          <img src="img/logo/logo createlier.png" alt="logo" width="100px">
          <h2>Sign in</h2>
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
          <div>
            <p><a href="#">Forgot your password?</a></p>
            <p>Don't have an account? <a href="register.php">Get started</a>.</p>
          </div>
        </div>
      </div>
    </form>
  </div>
</body>

</html>

<?php
# include('layouts/footer.php');
?>