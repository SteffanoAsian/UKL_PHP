<?php
require_once("../Connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style_body.css">
    <link rel="stylesheet" href="style_tambah.css">
    <title>Data Petugas</title>
</head>
<body>
    
    <?php require_once("header.php"); ?>
    
    <h3>Petugas</h3>
    <p><a href="layout_TambahPetugas.php">Tambah Data</a></p>
    <table cellspacing="0" border="1" cellpadding="5">
        <tr>
            <td>No. </td>
            <td>Username</td>
            <td>Nama Petugas</td>
            <td>Level</td>
            <td>Aksi</td>
        </tr>
<?php

$jmlhDataHal = 5;
$data = mysqli_query($connect, "SELECT * FROM petugas");
$jmlhData = mysqli_num_rows($data);
$jmlhHal = ceil($jmlhData / $jmlhDataHal);
$halAktif = (isset($_GET['hal'])) ? $_GET['hal'] : 1;
$dataAwal = ($jmlhData * $halAktif) - $jmlhData;

$sql = mysqli_query($connect, "SELECT * FROM petugas LIMIT $dataAwal, $jmlhDataHal");
$no = 1;
while($r = mysqli_fetch_assoc($sql)){ ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $r['username']; ?></td>
            <td><?= $r['nama_petugas']; ?></td>
            <td><?= $r['level']; ?></td>
            <td><a href="?hapus&id=<?= $r['id_petugas']; ?>">Hapus</a> | 
                <a href="layout_EditPetugas.php?id=<?= $r['id_petugas']; ?>">Edit</a</td>
        </tr>
<?php $no++; } ?>
    </table>

<?php for($i=1; $i <= $jmlhHal; $i++): ?>
        <a href="?hal=<?= $i; ?>"><?= $i; ?></a>
<?php endfor; ?>

    <hr />
    <?php require_once("footer.php"); ?>
</body>
</html>
<?php
// Tombol Hapus ditekan
if(isset($_GET['hapus'])){
    $id = $_GET['id'];
    $hapus = mysqli_query($connect, "DELETE FROM petugas WHERE id_petugas='$id'");
    if($hapus){
        echo '<script>alert("Data Berhasil Dihapus")</script>';
    }else{
        echo '<script>alert("Maaf, Data GAGAL Dihapus")</script>';
    }
}
?>