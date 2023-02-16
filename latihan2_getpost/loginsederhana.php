<?php 
if ( isset($_POST["submit"]) ) {
    // cek ussername
    if ($_POST["username"] == "admin" && $_POST["password"] == "123") {
        // jika benar, maka akan diteruskan ke admin
        header("Location: adminsederhana.php");
        exit;
    } else {
        // jika salah
        $error = true;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login sederhana</title>
</head>
<body>
<h1>login adminn</h1>

<?php if(isset($error)) :?>
    <p style="color: red;">username dan password salah</p>
<?php endif ;?>

<ul>
<form action="" method="post">
    <li>
        <label for="username">username</label>
        <input type="text" name="username" id="username">
    </li>

    <li>
        <label for="password">password</label>
        <input type="password" name="password" id="password">
    </li>

    <li>
        <button type="submit" name="submit">login</button>
    </li>
</form>
</ul>


</body>
</html>