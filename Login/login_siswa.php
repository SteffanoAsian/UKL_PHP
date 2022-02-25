<?php
session_start();
include "../Connect.php";
if(isset($_SESSION['nisn'])){
    header("location:../Utama/layout_IndexSiswa.php");
}
?>
<html>
    <head>
        <link rel="stylesheet" href="login.css">
        <title>LOG IN</title>
    </head>
<body>
<div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
<form action="" method="POST">
<h3>Login Here</h3>
<?php
// Proses Login
if(isset($_POST['login'])){
    $nisn = $_POST['nisn'];
    $cari = mysqli_query($connect, "SELECT * FROM siswa WHERE nisn='$nisn'");
    $hasil = mysqli_fetch_assoc($cari);

    if(mysqli_num_rows($cari) == 0){
            echo "<td colspan='2'><center>NISN belum terdaftar!</center></td>";
        }else{

            $_SESSION['nisn'] = $_POST['nisn'];
            header("location: ../Utama/layout_IndexSiswa.php");
        }
}
?>

        <input type="text" placeholder="NISN" id="nisn" name="nisn" autocomplete="off">
        <input type="submit" value="LOG IN" id="login" name="login">
        <div class="link">
        <a  href="login.php">Admin Login</a>
        </div>
</form>
</body>
</html>