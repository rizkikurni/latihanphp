<?php
require 'fungsion.php';
$bukuperpus = query("SELECT * FROM bukuperpus")
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
<h1>daftar buku perpustakaan</h1>

<a href="tambah.php">tambah data buku</a>
<br><br>

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
            <a href="">ubah</a> |
            <a href="">hapus</a>
        </td>
        <td><?= $buku["judul"] ; ?></td>
        <td><?= $buku["penulis"] ; ?></td>
        <td><?= $buku["kode"] ; ?></td>
        <td><?= $buku["tahun"] ; ?></td>
        <td><?= $buku["genre"] ; ?></td>
    </tr>
    <?php $i++; ?>
    <?php endforeach ;?>
</table>


</body>
</html>