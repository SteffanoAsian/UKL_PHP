<!-- $query ="SELECT * FROM siswa INNER JOIN kelas ON siswa.id_kelas = kelas.id_kelas ";
//$query ="SELECT * FROM siswa, kelas ON siswa.id_kelas = kelas.id_kelas
//ORDER BY nama LIMIT $dataAwal, $totalDataHalaman"; -->
<?php
include("../Connect.php");

if(!isset($_SESSION['username'])){
    header("location:../Login/login.php");
}else{
    $username = $_SESSION['username'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style_tambah.css">
    <title> Data Siswa</title>
</head>
<body>
    <?php include("header.php");?>
    
    <link rel="stylesheet" href="style_body.css">
    <h3>Halaman Data Siswa</h3>
    <p><a href="layout_TambahSiswa.php">Tambah Data</a></p>
    <table>
        <tr>
            <td>No. </td>
            <td>NISN</td>
            <td>NIS</td>
            <td>Nama Siswa</td>
            <td>Kelas</td>
            <td>Alamat</td>
            <td>No. Telp</td>
            <td>Aksi</td>
        </tr>
<?php

$totalDataHalaman = 5;
$data = mysqli_query($connect, "SELECT * FROM siswa");
$hitung = mysqli_num_rows($data);
$totalHalaman = ceil($hitung / $totalDataHalaman);
$halAktif = (isset($_GET['hal'])) ? $_GET['hal'] : 1;
$dataAwal = ($totalDataHalaman * $halAktif) - $totalDataHalaman;

$query ="SELECT * FROM siswa
JOIN kelas ON siswa.id_kelas = kelas.id_kelas
ORDER BY nama LIMIT $dataAwal, $totalDataHalaman";
$result = mysqli_query($connect, $query);
$no = 1;
while($r = mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $r['nisn']; ?></td>
            <td><?= $r['nis']; ?></td>
            <td><?= $r['nama']; ?></td>
            <td><?= $r['nama_kelas'] . " | " . $r['kompetensi_keahlian']; ?></td>
            <td><?= $r['alamat']; ?></td>
            <td><?= $r['no_telp']; ?></td>
            <td><a href="?hapus&nisn=<?= $r['nisn']; ?>">Hapus</a>
                <a href="layout_EditSiswa.php?nisn=<?= $r['nisn']; ?>">Edit</a</td>
        </tr>
<?php $no++; } ?>
    </table>

<?php for($i=1; $i <= $totalHalaman; $i++): ?>
        <a href="?hal=<?= $i; ?>"><?= $i; ?></a>
<?php endfor; ?>

    <hr />
    <?php include("footer.php"); ?>
</body>
</html>
<?php
// Tombol Hapus ditekan
if(isset($_GET['hapus'])){
    $nisn = $_GET['nisn'];
    $hapus = mysqli_query($connect, "DELETE FROM siswa WHERE nisn='$nisn'");
    if($hapus){
        ?>
            <script>
            alert("Data Berhasil Dihapus");
            document.location.href="layout_siswa.php";
            </script>
        <?php
    }else{
        echo "<script>alert('Maaf, Data GAGAL Dihapus cok');
        </script>";
    }
}
?>