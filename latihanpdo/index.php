<?php 
$dsn = 'mysql:host=localhost;dbname=daftarbuku';
$username = 'root';
$password = '';
$option = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
try {
    $dbh = new PDO($dsn, $username, $password, $option);
} catch (PDOException $e){
    echo 'koneksi database gagal: ' . $e->getMessage();
    exit;
}

// query untuk insert data ke tabel users
$sql =  "INSERT INTO bukuperpus (judul, penulis, tahun, genre) VALUES (:judul, :penulis, :tahun, :genre)";

// prepare statement PDO
$stmt =$dbh->prepare($sql);

// binding parameter ke statement
$judul = "laut bercerita";
$penulis = "sinta dean";
$tahun = "2015";
$genre = "sad";

$stmt->bindParam(':judul', $judul);
$stmt->bindParam(':penulis', $penulis);
$stmt->bindParam(':tahun', $tahun);
$stmt->bindParam(':genre', $genre);

//eksesusi statement untuk insert data
if($stmt->execute()){
    echo "data berhasil ditambahkan";
} else {
    echo "data gagal ditambahkan";
}


;?>