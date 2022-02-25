<?php
require_once("../Connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style_body.css">
    <title>Data Kelas</title>
</head>
<body>

    <?php require_once("header.php"); ?>
    
    <h3>Kelas</h3>
    <p><a href="layout_TambahKelas.php">Tambah Data</a></p>
    <table>
        <tr>
            <td>No. </td>
            <td>Nama Kelas</td>
            <td>Kompetensi Keahlian</td>
            <td>Aksi</td>
        </tr>
<?php

$totalDataHalaman = 5;
$data = mysqli_query($connect, "SELECT * FROM kelas");
$hitung = mysqli_num_rows($data);
$totalHalaman = ceil($hitung / $totalDataHalaman);
$halAktif = (isset($_GET['hal'])) ? $_GET['hal'] : 1;
$dataAwal = ($totalDataHalaman * $halAktif) - $totalDataHalaman;

$sql = mysqli_query($connect, "SELECT * FROM kelas ORDER BY nama_kelas LIMIT $dataAwal, $totalDataHalaman");
$no = 1;
while($r = mysqli_fetch_assoc($sql)){ ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $r['nama_kelas']; ?></td>
            <td><?= $r['kompetensi_keahlian']; ?></t0 d>
            <td><a href="?hapus&id=<?= $r['id_kelas']; ?>">Hapus</a> | 
                <a href="layout_EditKelas.php?id=<?= $r['id_kelas']; ?>">Edit</a</td>
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
    $hapus = mysqli_query($connect, "DELETE FROM kelas WHERE id_kelas='$id'");
    if($hapus){
        ?>
            <script>
                alert("Data Berhasil Dihapus");
                document.location.href="layout_petugas.php";
            </script>
            <?php
    }else{
        echo "<script>alert('Maaf, data GAGAL Dihapus');
        </script>";
    }
}
?>