<?php
$host = "localhost";
$db = "sekolah";
$uname = "root";
$pass = "";

$connect = mysqli_connect($host, $uname, $pass, $db);
mysqli_query($connect, "SET FOREIGN_KEY_CHECKS=0;");
if(!$connect){
    echo "Koneksi ke Database Gagal : ".mysqli_connect_error();
}
?>