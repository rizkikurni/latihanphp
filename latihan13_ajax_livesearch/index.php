<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'fungsion.php';
$bukuperpus = query("SELECT * FROM bukuperpus");

// tombol cari ditekan
if (isset($_POST["cari"])) {
    $bukuperpus = cari($_POST["keyword"]);
}

;?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<a href="logout.php">logout!</a>
<h1>daftar buku perpustakaan</h1>

<a href="tambah.php">tambah data buku</a>
<br><br><br>

<form action="" method="post">
    <input type="text" name="keyword" id="keyword" size="40" autofocus placeholder="masukan keyword pencarian" autocomplete="off">
    <button type="submit" name="cari" id="tombol-cari">Cari!</button>
</form>

<div id="container">
<table border="1" cellpadding="10" cellspacing="0" >
    <tr>
        <th>no</th>
        <th>aksi</th>
        <th>judul</th>
        <th>penulis</th>
        <th>kode</th>
        <th>tahun</th>
        <th>genre</th>
    </tr>

    <?php $i = 1 ;?>
    <?php foreach($bukuperpus as $buku) :?>
    <tr>
        <td><?= $i ; ?></td>
        <td>
            <a href="update.php?id=<?= $buku["id"] ; ?>">ubah</a> |
            <a href="hapus.php?id=<?= $buku["id"] ; ?>" onclick="return confirm('yakin?')">hapus</a>
        </td>
        <td><?= $buku["judul"] ; ?></td>
        <td><?= $buku["penulis"] ; ?></td>
        <td><img src="img/<?= $buku["kode"] ; ?>" alt="" height="150" width="120"></td>
        <td><?= $buku["tahun"] ; ?></td>
        <td><?= $buku["genre"] ; ?></td>
    </tr>
    <?php $i++; ?>
    <?php endforeach ;?>
</table>
</div>


<script src = "js/script.js"></script>
</body>
</html>