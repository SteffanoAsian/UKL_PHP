<?php
session_start();
include "../Connect.php";
if(!isset($_SESSION['nisn'])){
    header("location:../Login/login_siswa.php");
}else{
    $nisn = $_SESSION['nisn'];
}
$siswa = mysqli_query($connect, "SELECT * FROM siswa 
JOIN kelas ON siswa.id_kelas=kelas.id_kelas 
WHERE nisn='$nisn'");
$result = mysqli_fetch_assoc($siswa);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style_body.css">
    <title>Halaman Utama</title>
</head>
<body>
    <h1>Selamat datang di Aplikasi Pembayaran SPP</h1>
            <hr />
    <a href="#biodata">Biodata Kamu</a> | 
    <a href="#SPP">Data SPP</a> | 

            <hr />
    <h2>Selamat Datang <?= $result['nama']; ?></h2>
    <h3>Biodata Kamu</h3>
            <hr />
    <table cellpadding="5" id="biodata">
        <tr>
            <td>NISN</td>
            <td>:</td>
            <td><?= $result['nisn']; ?></td>
        </tr>
        <tr>
            <td>NIS</td>
            <td>:</td>
            <td><?= $result['nis']; ?></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><?= $result['nama']; ?></td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td>:</td>
            <td><?= $result['nama_kelas'] . " | " . $result['kompetensi_keahlian']; ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><?= $result['alamat']; ?></td>
        </tr>
    </table>
            <hr />
    <p><h2>Data SPP</p></h2>
    <table id="SPP" cellpadding="5" cellspacing="0" border="1">
    <tr>
            <td>No. </td>
            <td>Tahun</td>
            <td>Nominal</td>
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
        </tr>
<?php $no++; } ?>
    </table>

    <?php for($i=1; $i <= $totalHalaman; $i++): ?>
        <a href="?hal=<?= $i; ?>"><?= $i; ?></a>
<?php endfor; ?>

            <hr />
            <hr />
    <?php include("footer.php"); ?>
</body>
</html>