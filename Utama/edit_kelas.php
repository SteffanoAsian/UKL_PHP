<?php
require_once("../Connect.php");
$id = $_GET['id'];
$kelas = mysqli_query($connect, "SELECT * FROM kelas WHERE id_kelas='$id'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style_tambah.css">
    <title>Data Kelas</title>
</head>
<body>
    <?php require("header.php"); ?>
    <center>
    <h3>Edit data Kelas</h3>
<?php
while($row = mysqli_fetch_assoc($kelas)){?>
    <form action="" method="POST">
        <table cellpadding="5">
            <input type="hidden" name="id" value="<?= $row['id_kelas']; ?>">
            <tr>
                <td>Nama Kelas</td>
                <td align="center">:</td>
                <td><input type="text" class="sub" name="nama" value="<?= $row['nama_kelas']; ?>"></td>
            </tr>
            <tr>
                <td>Kompetensi Keahlian</td>
                <td align="center">:</td>
                <td><input type="text" class="sub" name="kk" value="<?= $row['kompetensi_keahlian']; ?>"></td>
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
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $kk = $_POST['kk'];
    $update = mysqli_query($connect, "UPDATE kelas SET nama_kelas='$nama', kompetensi_keahlian='$kk'
                                 WHERE kelas.id_kelas='$id'");
        if($update){
            header("location: layout_kelas.php");
        }else{
            echo "<script>alert('Gagal'); </script>";
        }
}
?>