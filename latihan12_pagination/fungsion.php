<?php
$conn = mysqli_connect("localhost", "root", "", "daftarbuku");

// untuk pagination

// pagination
// alogaritma
$jumlahdataperhalaman = 2;
$jumlahdata = count(query("SELECT * FROM bukuperpus"));
$jumlahhalaman = ceil($jumlahdata/$jumlahdataperhalaman);
$halamanaktif = (isset($_GET["halaman"]) ? $_GET["halaman"] : 1);
$awaldata = ( $jumlahdataperhalaman * $halamanaktif) - $jumlahdataperhalaman;

// 

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    };
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
    global $jumlahdataperhalaman;
    global $awaldata;
    $jumlahhasilyangdicari = count(query("SELECT * FROM bukuperpus 
                WHERE 
                judul LIKE '%$keyword%' OR 
                penulis LIKE '%$keyword%' OR 
                kode LIKE '%$keyword%' OR
                tahun LIKE '%$keyword%' OR
                genre LIKE '%$keyword%' "));
    $query = "SELECT * FROM bukuperpus 
                WHERE 
                judul LIKE '%$keyword%' OR 
                penulis LIKE '%$keyword%' OR 
                kode LIKE '%$keyword%' OR
                tahun LIKE '%$keyword%' OR
                genre LIKE '%$keyword%' LIMIT $awaldata, $jumlahdataperhalaman";
    return [query($query), $jumlahhasilyangdicari];
}

function registrasi ($data){
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "
        <script>
            alert('username sudah terdaftar! ');
        </script>
        ";
        return false;
    };

    // cek konfirmasi password
    if ($password !== $password2) {
        echo "
        <script>
            alert('password tidak sama ');
        </script>
        ";
        return false;
    };

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan ke database
    mysqli_query($conn, "INSERT INTO user VALUE(NULL, '$username', '$password')");

    return mysqli_affected_rows($conn);

}

;?>

