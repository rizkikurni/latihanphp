<?php 
require 'fungsion.php';

if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "
            <script>
                    alert('user baru telah ditambahkan');
            </script>
        ";
    } else {
        echo mysqli_error($conn);
    };
}

;?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>regristrasi</title>
</head>
<body>
<h1>halaman regristrasi</h1>

<form action="" method="post">

    <ul>
        <li>
            <label for="username">username : </label>
            <input type="text" name="username" id="username">
        </li>

        <li>
            <label for="password">password : </label>
            <input type="password" name="password" id="password">
        </li>

        <li>
            <label for="password2">konfirmasi password : </label>
            <input type="password2" name="password2" id="password2">
        </li>

        <li>
            <button type="submit" name="register">registrasi!</button>
        </li>
    </ul>

</form>

</body>
</html>