<?php
require_once("../Connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style_body.css">
    <title>Data SPP</title>
</head>
<body>
    
    <?php require_once("header.php"); ?>

    <h3>SPP</h3>
    <p><a href="layout_TambahSPP.php">Tambah Data</a></p>
    <table cellspacing="0" border="1" cellpadding="5">
        <tr>
            <td>No. </td>
            <td>Tahun</td>
            <td>Nominal</td>
            <td>Aksi</td>
        </tr>
<?php

$totalDataHalaman = 5;
$data = mysqli_query($connect, "SELECT * FROM spp");
$hitung = mysqli_num_rows($data);
$totalHalaman = ceil($hitung / $totalDataHalaman);
$halAktif = (isset($_GET['hal'])) ? $_GET['hal'] : 1;
$dataAwal = ($totalDataHalaman * $halAktif) - $totalDataHalaman;

$sql = mysqli_query($connect, "SELECT * FROM spp ORDER BY tahun ASC LIMIT $dataAwal, $totalDataHalaman");
$no = 1;
while($r = mysqli_fetch_assoc($sql)){ ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $r['tahun']; ?></td>
            <td><?= "Rp. " . $r['nominal']; ?></td>
            <td><a href="?hapus&id=<?= $r['id_spp']; ?>">Hapus</a> | 
                <a href="layout_EditSPP.php?id=<?= $r['id_spp']; ?>">Edit</a</td>
        </tr>
<?php $no++; } ?>
    </table>

    <?php for($i=1; $i <= $totalHalaman; $i++): ?>
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
    $hapus = mysqli_query($connect, "DELETE FROM spp WHERE id_spp='$id'");
    if($hapus){
        header("location: layout_spp.php");
    }else{
        echo "<script>alert('Maaf, Data GAGAL Dihapus');
        </script>";
    }
}
?>