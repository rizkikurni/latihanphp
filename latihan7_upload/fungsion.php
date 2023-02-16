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

    // upload gambar
    $kode = upload();
    if (!$kode) {
        return false;
    }

    $tahun = htmlspecialchars($data["tahun"]);
    $genre = htmlspecialchars($data["genre"]);

    // query insert data
    $query = "INSERT INTO bukuperpus VALUES (NULL, '$judul', '$penulis', '$kode', '$tahun', '$genre')";

    mysqli_query($conn, $query);
    

    // mengembalikan nilai tambah
    return mysqli_affected_rows($conn);
}

function upload() {
    $namafile = $_FILES['kode']['name'];
    $ukuranfile = $_FILES['kode']['size'];
    $erorr = $_FILES['kode']['error'];
    $tmpname = $_FILES['kode']['tmp_name'];

    // cek apakah gambar ada atau tidak
    if ($erorr === 4) {
        echo "
            <script>
                alert('pilih gambar terlebih dahulu');
            </script>
        ";
        return false;
    };

    // cek apakah yang diupload adalah gambar
    $ektensigambarvalid = ['jpg','jpeg','png'];
    $ektensigambar = explode('.', $namafile);
    $ektensigambar = strtolower(end($ektensigambar));
    if(!in_array($ektensigambar, $ektensigambarvalid)) {
        echo "
        <script>
            alert('yang anda upload bukan gambar');
        </script>
        ";
        return false;
    };   

    // cek ukuran gambar terlalu besar
    if ($ukuranfile > 2000000) {
        echo "
        <script>
            alert('gambar anda terlalu besar');
        </script>
        ";
        return false;
    };

    // lolos pengecekan gambar siap diupload
    // move_uploaded_file(filename, destination)

    // generate nama baru yang unik
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ektensigambar;

    move_uploaded_file($tmpname, 'img/' . $namafilebaru);
    return $namafilebaru;
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

    $kodelama = htmlspecialchars($data["kodelama"]);
    // cek apakah user pilih gambar baru atau tidak
    if ($_FILES['kode']['error'] === 4) {
        $kode = $kodelama;
    } else {
        $kode = upload();
    };

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

