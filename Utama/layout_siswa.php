<?php
session_start();
require_once("../Connect.php");
if(!isset($_SESSION['username'])){
    header("location:../Login/login.php");
}else{
    $username = $_SESSION['username'];
}
$query = mysqli_query($connect,"SELECT * FROM petugas");
$result=mysqli_fetch_assoc($query);
$name = $result['nama_petugas'];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="layout.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
  </head>
  <body>

    <input type="checkbox" id="check">
    <header>
      <div class="left_area">
        <h3>Aplikasi Pembayaran <span>SPP</span></h3>
      </div>
      <div class="right_area">
        <a href="../Login/logout.php" class="logout_btn">Logout</a>
      </div>
    </header>
    <div class="sidebar">
      <div class="profile_info">
        <img src="avatar.png" class="profile_image" alt="">
        <?  ?>
        <h4><?= $name?> </h4>
      </div>
      <?php
$panggil = mysqli_query($connect, "SELECT * FROM petugas WHERE username='$username'");
$hasil = mysqli_fetch_assoc($panggil);
    if($hasil['level'] == "Administrator"){ 
        include("index_admin.php");
    }else{ 
    include("index_petugas.php");
    } 
?>
    </div>
    <div class="content">
    <?php
    require_once("siswa.php");
    ?>
    </div>
  </body>
</html>
      