<?php
require_once("../Connect.php");
if(!isset($_SESSION['username'])){
    header("location: Login/login.php");
}else{
    $username = $_SESSION['username'];
}
$nisnSiswa = $_GET['nisn'];
$siswa = mysqli_query($connect, "SELECT * FROM siswa WHERE nisn='$nisnSiswa'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style_tambah.css">
</head>
<body>
    <?php require("header.php"); ?>
<center>
    <h3>Edit data Siswa</h3>
<?php
while($row = mysqli_fetch_assoc($siswa)){?>
    <form action="" method="POST">
        <table cellpadding="5">
            <input type="hidden" name="nisn" value="<?= $row['nisn']; ?>">
            <tr>
                <td>Nama</td>
                <td align="center">:</td>
                <td><input type="text" autocomplete="off" class ="sub "name="nama" value="<?= $row['nama']; ?>"></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td><select name="kelas">
<?php
$kelas = mysqli_query($connect, "SELECT * FROM kelas");
while($r = mysqli_fetch_assoc($kelas)){ ?>
                        <option value="<?= $r['id_kelas']; ?>"><?= $r['nama_kelas'] . " | " 
                    . $r['kompetensi_keahlian']; ?></option>
<?php } ?>          </select></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><input type="text" autocomplete="off" class="sub" name="alamat" value="<?= $row['alamat']; ?>"></td>
            </tr>
            <tr>
                <td>No. Telp</td>
                <td>:</td>
                <td><input type="tel" autocomplete="off" class="sub" name="no" value="<?= $row['no_telp']; ?>"></td>
            </tr>
            <tr>
                <td colspan="3"><button class="button" type="submit" name="simpan">Simpan</button></td>
            </tr>
        </table>
    </form>
</center>
<?php } ?>
<hr />
    <?php require("footer.php"); ?>
</body>
</html>
<?php
// Proses update
if(isset($_POST['simpan'])){
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    $no = $_POST['no'];
    $query =  "UPDATE siswa SET nama='$nama',
                                 id_kelas='$kelas', alamat='$alamat', no_telp='$no' 
                                 WHERE siswa.nisn='$nisn'";
    $update = mysqli_query($connect, $query);
        if($update){
            ?>
            <script>
            alert("Data Berhasil Disimpan");
            document.location.href="layout_siswa.php";
            </script>
        <?php
        }else{
            echo "<script>alert('Gagal'); </script>";
        }
}
?>