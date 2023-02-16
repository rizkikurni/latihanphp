<?php
// menghilangkan session
session_start();
$_SESSION = [];
session_unset();
session_destroy();

// menghilangkan cookie
setcookie('id', '', time() - 3600);
setcookie('key', '', time() - 3600);
header("Location: login.php");
exit;
?>