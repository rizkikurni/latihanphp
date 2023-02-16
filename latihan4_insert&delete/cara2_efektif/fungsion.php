<?php
$conn = mysqli_connect("localhost", "root", "", "daftarbuku");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}


function tambah($data){
    global $conn;
    // ambil data tiap element dalam form
    $judul = htmlspecialchars($data["judul"]);
    $penulis = htmlspecialchars($data["penulis"]);
    $kode = htmlspecialchars($data["kode"]);
    $tahun = htmlspecialchars($data["tahun"]);
    $genre = htmlspecialchars($data["genre"]);

    // query insert data
    $query = "INSERT INTO bukuperpus VALUES (NULL, '$judul', '$penulis', '$kode', '$tahun', '$genre')";

    mysqli_query($conn, $query);
    

    // mengembalikan nilai tambah
    mysqli_affected_rows($conn);
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM bukuperpus WHERE id = $id");
    return mysqli_affected_rows($conn);
}
;?>

