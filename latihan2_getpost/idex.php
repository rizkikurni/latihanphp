<?php
$daftarnama = [
    [
        "nama" => "rizki",
        "umur" => "18"
    ],
    [
        "nama" => "reza",
        "umur" => "19"
    ]
] 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>latihan git dan post</title>
</head>
<body>
<h1>Daftar nama</h1>

<?php foreach ($daftarnama as $dfrnama) : ?>
    <ul>
        <li>
            <a href="data2.php?nama=<?= $dfrnama["nama"] ; ?>&umur=<?= $dfrnama["umur"] ?>"><?= $dfrnama["nama"] ; ?></a> 
        </li>
    </ul>
<?php endforeach; ?>
</body>
</html>
