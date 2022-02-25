<?php
require_once("../Connect.php");

$query = mysqli_query($connect, "SELECT * FROM siswa");
$result = mysqli_fetch_assoc($query);
$name = $result['nama']
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard SISWA</title>
    <link rel="stylesheet" href="layout.css">

  </head>
  <body>
    
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

?>
      
    </div>

    <div class="content">
        <?php
        include("index_siswa.php");
        ?>
    </div>

  </body>
</html> 