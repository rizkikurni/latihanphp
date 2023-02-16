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
    return mysqli_affected_rows($conn);
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM bukuperpus WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function update($data){
    global $conn;
    // ambil data tiap element dalam form
    $id = $data["id"];
    $judul = htmlspecialchars($data["judul"]);
    $penulis = htmlspecialchars($data["penulis"]);
    $kode = htmlspecialchars($data["kode"]);
    $tahun = htmlspecialchars($data["tahun"]);
    $genre = htmlspecialchars($data["genre"]);

    // query insert data
    $query = "UPDATE bukuperpus SET
                judul = '$judul',
                penulis = '$penulis',
                kode = '$kode',
                tahun = '$tahun',
                genre = '$genre'
                WHERE id = $id 
                ";

    mysqli_query($conn, $query);
    

    // mengembalikan nilai tambah
    return mysqli_affected_rows($conn);
}
 

function cari($keyword){
    $query = "SELECT * FROM bukuperpus 
                WHERE 
                judul LIKE '%$keyword%' OR 
                penulis LIKE '%$keyword%' OR 
                kode LIKE '%$keyword%' OR
                tahun LIKE '%$keyword%' OR
                genre LIKE '%$keyword%'";
    return query($query);
}
;?>

