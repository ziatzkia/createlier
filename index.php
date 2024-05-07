<?php
include 'server/connection.php';

if (isset($_SESSION['logged in'])) {
    header('location: index.php');
    exit;
}

if (isset($_GET['logout'])) {
    if (isset($_SESSION['logged_in'])) {
        unset($_SESSION['logged_in']);
        unset($_SESSION['user_email']);
        header('location: index.php');
        exit;
    }
}

$q_select = 'SELECT * FROM akun';
$result = mysqli_query($conn, $q_select);

include 'layouts/header.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Createlier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Index | Createlier</title>
</head>
<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-lv7jmEf3DPBjW5zGPrmSdAx2vIEcJyTd1QzStcF4nY8fcw8Ezg6F0MFE0JmwOqFQ" crossorigin="anonymous"></script>
</body>
</html>

<?php
include 'layouts/footer.php';
?>
