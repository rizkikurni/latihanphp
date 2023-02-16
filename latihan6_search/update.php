<?php
require 'fungsion.php';
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "daftarbuku");

// ambil data di url
$id = $_GET["id"];

// query data buku berdasarkan id
$buku = query("SELECT * FROM bukuperpus WHERE id = $id")[0];
// [0] berfungsi untuk bisa mengambil data

// cek apakah tombol submit sudah ditekan atau belum

if (isset($_POST["submit"])) {
    
    // cek apakah data berhasil ditambahkan atau tidak
    if (update($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil diupdate ');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                    alert('data gagal diupdate ');
                    document.location.href = 'index.php';
            </script>
        ";
    }
}

;?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah data mahasiswa</title>
</head>
<body>
    <h1>update data mahasiswa</h1>
    
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $buku["id"] ; ?>">
        <ul>
            <li>
                <label for="judul">judul :</label>
                <input type="text" name="judul" id="judul"
                required value="<?= $buku["judul"] ; ?>">
                <!-- required artinya data harus diisi -->
            </li>
            <li>
                <label for="penulis">penulis :</label>
                <input type="text" name="penulis" id="penulis"
                value="<?= $buku["penulis"] ; ?>">
            </li>
            <li>
                <label for="kode">kode :</label>
                <input type="text" name="kode" id="kode"
                value="<?= $buku["kode"] ; ?>">
            </li>
            <li>
                <label for="tahun">tahun :</label>
                <input type="text" name="tahun" id="tahun"
                value="<?= $buku["tahun"] ; ?>">
            </li>
            <li>
                <label for="genre">genre :</label>
                <input type="text" name="genre" id="genre"
                value="<?= $buku["genre"] ; ?>">
            </li>
            <li>
                <button type="submit" name="submit">Update data!</button>
            </li>
        </ul>
    </form> 
</body>
</html>