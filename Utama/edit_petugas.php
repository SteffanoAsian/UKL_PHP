<?php
require_once("../Connect.php");
$id = $_GET['id'];
$petugas = mysqli_query($connect, "SELECT * FROM petugas WHERE id_petugas='$id'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style_tambah.css">
    <title>Data Petugas</title>
</head>
<body>
    <?php require("header.php"); ?>
    <center>
    <h3>Edit data Petugas</h3>
<?php
while($row = mysqli_fetch_assoc($petugas)){?>
    <form action="" method="POST">
        <table cellpadding="5">
            <input type="hidden" name="id" value="<?= $row['id_petugas']; ?>">
            <tr>
                <td>Username :</td>
                <td><input type="text" class="sub" name="user" value="<?= $row['username']; ?>"></td>
            </tr>
            <tr>
                <td>Password :</td>
                <td><input type="password" class="sub" name="pass" value="<?= $row['password']; ?>"></td>
            </tr>
            <tr>
                <td>Nama Petugas :</td>
                <td><input type="text" class="sub" name="nama" value="<?= $row['nama_petugas']; ?>"></td>
            </tr>
            <tr>
                <td colspan="2"><button class="button" type="submit" name="simpan">Simpan</button></td>
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
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $nama = $_POST['nama'];
    $pass_enc = md5($pass);
    $update = mysqli_query($connect, "UPDATE petugas SET username='$user',
                                 password='$pass_enc', nama_petugas='$nama'
                                 WHERE petugas.id_petugas='$id'");
        if($update){
            header("location: layout_petugas.php");
        }else{
            echo "<script>alert('Gagal'); </script>";
        }
}
?>