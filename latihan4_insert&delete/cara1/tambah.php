<?php 
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "daftarbuku");

// cek apakah tombol submit sudah ditekan atau belum

if (isset($_POST["submit"])) {
    // ambil data tiap element dalam form
    $judul = $_POST["judul"];
    $penulis = $_POST["penulis"];
    $kode = $_POST["kode"];
    $tahun = $_POST["tahun"];
    $genre = $_POST["genre"];

    // query insert data
    $query = "INSERT INTO bukuperpus VALUES (NULL, '$judul', '$penulis', '$kode', '$tahun', '$genre')";
    
    mysqli_query($conn, $query);

    // var_dump(mysqli_affected_rows($conn)) ; untuk mengetahui berhasil atau tidak 

    // cek apakah data berhasil ditambahkan atau tidak
    if (mysqli_affected_rows($conn) >0 ) {
        echo "berhasil";
    } else{
        echo "gagal";
        echo "<br>";
        echo mysqli_error($conn);
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
    
    <form action="" method="post">
        <ul>
            <li>
                <label for="judul">judul :</label>
                <input type="text" name="judul" id="judul">
            </li>
            <li>
                <label for="penulis">penulis :</label>
                <input type="text" name="penulis" id="penulis">
            </li>
            <li>
                <label for="kode">kode :</label>
                <input type="text" name="kode" id="kode">
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