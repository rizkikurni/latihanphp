<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "daftarbuku");

// ambil data dari tabel bukuperpus/ query data buku perpus
$result = mysqli_query($conn, "SELECT * FROM bukuperpus");

// mengecek error
// if(!$result){
//     echo mysqli_error($conn);
// }

// ambil data bukuperpus dari hasil reseult
// mysqli_fetch_row() // mengembalikan array numerik
// mysqli_fetch_assoc() // mengembalikan array associative
// mysqli_fetch_array() // mengembalikan keduanya
// mysqli_fetch_object() //memakai -> 

// cek apakah data ada
// while( $buku = mysqli_fetch_assoc($result)){
//     var_dump($buku);
// };



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

<table border="1" cellpadding="10" cellspacing="0" >
    <tr>
        <th>no</th>
        <th>judul</th>
        <th>aksi</th>
        <th>penulis</th>
        <th>kode</th>
        <th>tahun</th>
        <th>genre</th>
    </tr>

    <?php $i = 1 ;?>
    <?php while($buku = mysqli_fetch_assoc($result) ) :?>
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
    <?php $i++ ;?>
    <?php endwhile ;?>
</table>


</body>
</html>