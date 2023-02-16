<?php 
require '../fungsion.php';
$keyword = $_GET["keyword"];
$query = "SELECT * FROM bukuperpus WHERE judul LIKE '%$keyword%' OR penulis LIKE '%$keyword%' OR kode LIKE '%$keyword%' OR tahun LIKE '%$keyword%' OR genre LIKE '%$keyword%'";

$bukuperpus = query($query)
;?>

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
