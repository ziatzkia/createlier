<?php
include 'server/connection.php';

if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['phone']) && isset($_POST['alamat'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $alamat = $_POST['alamat'];

    $checkQuery = "SELECT * FROM akun WHERE username = '$username'";
    $result = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($result) > 0) {
        echo "Username already exists. Please choose a different username.";
    } else {
        $query = "INSERT INTO akun (username, email, password, phone, alamat) VALUES ('$username', '$email', '$password', '$phone', '$alamat')";
        mysqli_query($conn, $query);
        echo "Record inserted successfully!";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logo/logo cc.png">
    <title>Sign Up | Createlier</title>
    <link rel="stylesheet" href="style/loginRegister.css">
</head>

<body>
    <div class="container">
        <div class="left-section">
            <h1>Sign Up to</h1>
            <h1>find your treasure</h1>
        </div>
        <div class="right-section">
            <div class="form-container">
                <img src="img/logo/logo.png" alt="brand" width="70%" >
                <form method="post" action="register.php">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="text" id="phone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" id="alamat" name="alamat" required>
                    </div>
                    <button type="submit">Register</button>
                </form>
                <p>Already have an account? <a href="login.php">Login here</a>.</p>
            </div>
        </div>
    </div>
</body>

</html>

