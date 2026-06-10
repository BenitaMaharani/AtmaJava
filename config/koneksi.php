// koneksi = penghubung PHP dengan database
Cara kerjanya:
PHP → koneksi.php → MySQL Database → data ditampilkan ke website


<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "db_atmajava";

$conn = mysqli_connect($host, $user, $pass, $db);

if(!$conn){
    die("Koneksi gagal". mysqli_connect_error());
}
?>