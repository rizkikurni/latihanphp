<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'fungsion.php';

$bukuperpus = query("SELECT * FROM bukuperpus LIMIT $awaldata, $jumlahdataperhalaman "); //limit start, langkah


// tombol cari ditekan
if (isset($_POST["cari"])) {
    $result = cari($_POST["keyword"]);
    
    $bukuperpus = $result[0];


    $jumlahdataperhalaman = 2;
    $jumlahdata = $result[1];
    $jumlahhalaman = ceil($jumlahdata/$jumlahdataperhalaman);
    $halamanaktif = (isset($_GET["halaman"]) ? $_GET["halaman"] : 1);
    $awaldata = ( $jumlahdataperhalaman * $halamanaktif) - $jumlahdataperhalaman;
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
    <button type="submit" name="cari">Cari!</button>
</form>

<!-- navigasi -->
<!-- untuk < -->
<?php if ($halamanaktif > 1) : ?>
    <a href="?halaman=<?= $halamanaktif - 1 ;?>">&lt;</a>
<?php endif; ?>   

<!-- untuk angkanya -->
<?php for( $i = 1; $i <= $jumlahhalaman; $i++) :?>
    <?php if($i == $halamanaktif) :?>
        <a href="?halaman=<?= $i;?>" style="font-weight: bold; color:red; "><?= $i ;?></a>
    <?php  else:?>
        <a href="?halaman=<?= $i;?>" ><?= $i ;?></a>  
    <?php endif; ?>
<?php endfor; ?>

<!-- untuk > -->
<?php if ($halamanaktif < $jumlahhalaman) : ?>
    <a href="?halaman=<?= $halamanaktif + 1 ;?>">&gt;</a>
<?php endif; ?>   


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

    <?php $i = $awaldata + 1 ;?>
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


</body>
</html>