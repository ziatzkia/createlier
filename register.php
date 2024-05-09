<?php
include 'server/connection.php';

if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['pwd']) && isset($_POST['phone']) && isset($_POST['alamat']) && isset($_POST['gender']) && isset($_POST['photo'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $phone = $_POST['phone'];
    $alamat = $_POST['alamat'];
    $gender = $_POST['gender'];
    $photo = $_POST['photo'];

    $checkQuery = "SELECT * FROM akun WHERE username = '$username'";
    $result = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($result) > 0) {
        echo "Username already exists. Please choose a different username.";
    } else {
        $query = "INSERT INTO akun (username, email, pwd, phone, alamat ,gender,photo) VALUES ('$username', '$email', '$pwd', '$phone', '$alamat' ,'$gender','$photo')";
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
                <img src="img/logo/logo.png" alt="brand" width="70%">
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
                        <label for="pwd" class="col-sm-3 col-form-label">Password:</label>
                        <div class="col-sm-9">
                            <input type="password" id="pwd" name="pwd" class="form-control" required>
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
                            <input type="text" id="gender" name="gender" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="photo" class="col-sm-3 col-form-label">Photo:</label>
                        <div class="col-sm-9">
                            <input type="file" id="photo" name="photo" class="form-control-file mb-2" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-9 offset-sm-3">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </div>
                </form>
                <p class="text-center">Already have an account? <a href="login.php">Login here</a>.</p>
            </div>
        </div>

</body>

</html>