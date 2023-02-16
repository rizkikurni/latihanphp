<!DOCTYPE html>
<html>
<body>

<h1>My first PHP page</h1>

<?php
//standar output
echo "Hello World!";
echo "</br>";
echo "ini adalah enter";
echo "php harus enter manual </br>";
print_r("print </br>");
var_dump(13);

//penulisan sintaks php
// 1. php didalam html(disarankan)
// 2. html di dalam php(tidak disarankan)

// variabel dan tipe data

$namaku = "rizki";
echo "</br>namaku adalah $namaku";

//operator
// aritmatika + - * / & **
$a = 18;
$b = 29;
$c = $a*$b;
echo "</br>hasil perkalian a dan b adalah $c";
// $x = 10;  
// // echo ++$x; ini nambah 1

// pengabungan string
$depan ="rizki";
$belakang ="kurniawan";
echo "</br>nama lengkapku adalah: $depan"." "."$belakang</br>";

// assingment
// =,+=,-=,*=,/=,%=,.=
$nama = "najwa";
$nama .= "ramadhani";
echo $nama;

//perbandigan :ini membandingkan valuenya tidak tipe data
// <,>,<=,>=,==,!=
var_dump(1 == "1");

// identitas: ini membandingkan semuanya
// ===, !==
var_dump(1 === "1");

// logika
// &&(and),||(or),!(not)
var_dump(!true);
echo "</br></br></br>";

// untuk mengecek tipe data
$x = 59.85;
var_dump(is_int($x)); //bisa juga memakai is_float
echo "</br>";

$x = 1.9e411; // is infinite
var_dump($x);
echo "</br>";

$x = acos(8);
echo $x;
var_dump($x);

// untuk memeriksa numerik
echo "</br>";
$x = 5985;
var_dump(is_numeric($x));

$x = "5985";
var_dump(is_numeric($x));

$x = "59.85" + 100;
var_dump(is_numeric($x));

$x = "Hello";
var_dump(is_numeric($x));
echo "</br>";

// untuk mengubah float ke int
$x = 23465.768;
$int_cast = (int)$x;
echo $int_cast;

// php math
// pi
echo "</br></br>";
echo(pi());
echo "</br>";

// min dan max fungsion
echo"nilai minimum : ".(min(0,12,42,34,222));
echo "</br>";
echo"nilai maksimum : ".(max(0,12,42,34,222));
echo "</br>";

// nilai absolute
echo "nilai absolute dari -6.7 adalah".(abs(-6.7));
echo "</br>";

// nilai akar
echo "nilai akar dari 4 adalah ".(sqrt(4));
echo "</br>";

// pembulatan angka
$f = 0.6;
echo "angka bulat dari $f adalah ". round($f);
echo "</br>";

// random angka
echo rand(0,100);
echo "</br></br></br>";

//php constants

// define(name, value, case-insensitive)
// name : Menentukan nama konstanta
// value : Menentukan nilai konstanta
// case-insensitive : Menentukan apakah nama konstanta harus case-insensitive. Standarnya salah

// peka huruf besar kecil
define("GREETING", "ini adalah kontanta diphp");
echo GREETING;
echo "</br>";

// // tidak peka huruf besar kecil (TIDAK DIGUNAKAN LAGI SEJAK VERSI 7.3)
// define("kontanta", "ini adalah kontanta diphp", true);
// echo kontanta;
// echo "</br>";

// kontanta list
define("cars", [
    "Alfa Romeo",
    "BMW",
    "Toyota"
]);
echo cars[0];
echo "</br>";

// kontanta bersifat global 
define("test", "Welcome to W3Schools.com!");

function myTest() {
  echo test;
}
 
myTest();
echo "</br></br></br>";

// php if statements
// if (condition) {
//     code to be executed if this condition is true;
//   } elseif (condition) {
//     code to be executed if first condition is false and this condition is true;
//   } else {
//     code to be executed if all conditions are false;
//   } 

$t = date("H");
echo $t;
if ($t < "10") {
  echo "Have a good morning!";
} elseif ($t < "20") {
  echo "Have a good day!";
} else {
  echo "Have a good night!";
}
echo "</br></br></br>";

// php switch statement
// switch (n) {
//     case label1:
//       code to be executed if n=label1;
//       break;
//     case label2:
//       code to be executed if n=label2;
//       break;
//     case label3:
//       code to be executed if n=label3;
//       break;
//       ...
//     default:
//       code to be executed if n is different from all labels;
//   } 

$favcolor = "red";

switch ($favcolor) {
  case "red":
    echo "Your favorite color is red!";
    break;
  case "blue":
    echo "Your favorite color is blue!";
    break;
  case "green":
    echo "Your favorite color is green!";
    break;
  default:
    echo "Your favorite color is neither red, blue, nor green!";
}
echo "</br></br></br>";

// php looping
// while loop
// while (condition is true) {
//     code to be executed;
//   } 

$x = 1;

while($x <= 5) {
  echo "The number is: $x <br>";
  $x++;
} 
echo "</br></br></br>";

// do while loop
// do {
//     code to be executed;
//   } while (condition is true); 

$x = 1;

do {
  echo "The number is: $x <br>";
  $x++;
} while ($x <= 5);
echo "</br></br></br>";

// for loop
// for (init counter; test counter; increment counter) {
//     code to be executed for each iteration;
//   } 

// init counter : Inisialisasi nilai counter loop
// test counter : Dievaluasi untuk setiap iterasi loop. Jika hasilnya BENAR, pengulangan berlanjut. Jika bernilai FALSE, loop berakhir.
// increment counter : Menambah nilai loop counter
for ($x = 0; $x <= 100; $x+=10) {
    echo "ini loop for: $x <br>";
} 
echo "</br></br></br>";

// foreach loop
// foreach ($array as $value) {
//     code to be executed;
//   } 
$colors = array("red", "green", "blue", "yellow");

foreach ($colors as $value) {
  echo "$value <br>";
}
echo "</br></br></br>";

// break and continue
for ($x = 0; $x < 10; $x++) {
    if ($x == 4) {
      break; //bisa diganti continue
    }
    echo "The number is: $x <br>";
}
echo "</br></br></br>";

// php function
// function functionName() {
//     code to be executed;
//   } 
// contoh 1
function writeMsg() {
    echo "namaku rizki ini adalah fungsion php </br>";
  }
  
writeMsg(); // call the function

// contoh 2
function familyName($fname, $year) {
    echo "$fname Refsnes. Born in $year <br>";
}
  
familyName("rizki", "2004");
familyName("hitler", "1978");
familyName("mega chan", "1983");

echo "</br></br>";

// contoh 3 return
// declare(strict_types=1); // strict requirement, fungsinya untuk mendeteksi eror

function addNumbers(int $a, int $b) {
  return $a + $b;
}
// echo addNumbers(5, "5 days"); ini yang eror
echo addNumbers(5, 6);
// since strict is enabled and "5 days" is not an integer, an error will be thrown

echo "</br></br>";

// php array
$cars = array("Volvo", "BMW", "Toyota");
echo count($cars);
echo "</br></br>";

// index array
$cars = array("Volvo", "BMW", "Toyota");
$arrlength = count($cars);

for($x = 0; $x < $arrlength; $x++) {
  echo $cars[$x];
  echo "<br>";
}
echo "</br></br>";

// associative arrays
// $age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");

// or:
// $age['Peter'] = "35";
// $age['Ben'] = "37";
// $age['Joe'] = "43"; 
$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
echo "Peter is " . $age['Peter'] . " years old.";
echo "</br></br>";

// contoh 2
$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");

foreach($age as $x => $x_value) {
  echo "Key=" . $x . ", Value=" . $x_value;
  echo "<br>";
}
echo "</br></br>";

// php multidimensial arrays
$cars = array (
    array("Volvo",22,18),
    array("BMW",15,13),
    array("Saab",5,2),
    array("Land Rover",17,15)
);
echo $cars[0][0].": In stock: ".$cars[0][1].", sold: ".$cars[0][2].".<br>";
echo "</br></br>";

// php sorting arrays

// sort()- mengurutkan array dalam urutan menaik
// rsort()- mengurutkan array dalam urutan menurun
// asort()- urutkan array asosiatif dalam urutan menaik, sesuai dengan nilainya
// ksort()- urutkan array asosiatif dalam urutan menaik, sesuai dengan kuncinya
// arsort()- urutkan array asosiatif dalam urutan menurun, sesuai dengan nilainya
// krsort()- urutkan array asosiatif dalam urutan menurun, sesuai dengan kuncinya

$numbers = array(4, 6, 2, 22, 11);
sort($numbers);

echo "</br></br>";

// php superglobals
// Variabel superglobal PHP adalah:

//     $GLOBAL
$x = 75;
$y = 25;
 
function addition() {
  $GLOBALS['z'] = $GLOBALS['x'] + $GLOBALS['y'];
}
 
addition();
echo $z; 
echo "</br></br>";


//     $_SERVER


//     $_REQUEST
//     $_POST
//     $_GET
//     $_FILES
//     $_ENV
//     $_COOKIE
//     $_SESSION

echo "</br></br>";
echo "</br></br>";
echo "</br></br>";
echo "</br></br>";














?>

</body>
</html> 