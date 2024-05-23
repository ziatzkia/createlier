<?php
session_start();
include('server/connection.php');

if (isset($_SESSION['logged_in'])) {
  header('location: index.php');
  exit;
}

$failed = false;

if (isset($_POST['email_or_phone']) && isset($_POST['pwd'])) {
  $email_or_phone = $_POST['email_or_phone'];
  $pwd = $_POST['pwd'];

  $query = "SELECT * FROM akun WHERE (email = ? OR phone = ?) AND pwd = ? LIMIT 1";

  $stmt_login = $conn->prepare($query);
  $stmt_login->bind_param('sss', $email_or_phone, $email_or_phone, $pwd);

  if ($stmt_login->execute()) {
    $stmt_login->store_result();

    if ($stmt_login->num_rows() == 1) {
      $stmt_login->bind_result($id, $photo, $username, $email, $phone, $alamat, $gender, $saldo, $pwd);
      $stmt_login->fetch();

      $_SESSION['id'] = $id;
      $_SESSION['photo'] = $photo;
      $_SESSION['username'] = $username;
      $_SESSION['email'] = $email;
      $_SESSION['phone'] = $phone;
      $_SESSION['alamat'] = $alamat;
      $_SESSION['gender'] = $gender;
      $_SESSION['saldo'] = $saldo;
      $_SESSION['logged_in'] = true;

      echo "<script>
              window.onload = function() {
                Swal.fire({
                  icon: 'success',
                  title: 'Success',
                  text: 'Logged in successfully'
                }).then(function() {
                  window.location.href = 'index.php';
                });
              }
            </script>";
    } else {
    $failed = true;
    }
  } else {
    $failed = true;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="img/logo/logo cc.png">
  <title>Login | Createlier</title>
  <link rel="stylesheet" href="style/loginRegister.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="login-bg">
  <div class="wrapper">
    <form autocomplete="off" id="login-form" method="POST" action="login.php">
        <div class="form-container">
          <img src="img/logo/logo createlier.png" alt="logo" width="100px">
          <?php if ($failed) { ?>
            <div class="alert alert-danger alert-dismissible fade show mt-10" role="alert">
                Incorrect username or password!
                <a href="login.php" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
        <?php } ?>
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
