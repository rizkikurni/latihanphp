<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'fungsion.php';
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "daftarbuku");

// cek apakah tombol submit sudah ditekan atau belum

if (isset($_POST["submit"])) {
    // cek apakah data berhasil ditambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil ditambahkan ');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                    alert('data gagal ditambahkan ');
                    
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
    <h1>tambah data mahasiswa</h1>
    
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="judul">judul :</label>
                <input type="text" name="judul" id="judul"
                required>
                <!-- required artinya data harus diisi -->
            </li>
            <li>
                <label for="penulis">penulis :</label>
                <input type="text" name="penulis" id="penulis">
            </li>
            <li>
                <label for="kode">kode :</label>
                <input type="file" name="kode" id="kode">
            </li>
            <li>
                <label for="tahun">tahun :</label>
                <input type="text" name="tahun" id="tahun">
            </li>
            <li>
                <label for="genre">genre :</label>
                <input type="text" name="genre" id="genre">
            </li>
            <li>
                <button type="submit" name="submit">Tambah data!</button>
            </li>
        </ul>
    </form>
</body>
</html>