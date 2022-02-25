<?php
require_once("../Connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style_tambah.css">
    <title>Tambah Petugas</title>
</style>
</head>
<body>
    
    <?php require("header.php"); ?>
    
    <center>
    <h3>Tambah Petugas</h3>
    <form action="" method="POST">
        <table cellpadding="5">
            <tr>
                <td>Username :</td>
                <td><input type="text" class="sub" name="user" placeholder="Username" autocomplete="off"></td>
            </tr>
            <tr>
                <td>Password :</td>
                <td><input type="password" class="sub" name="pass" placeholder="Password" autocomplete="off"></td>
            </tr>
            <tr>
                <td>Nama :</td>
                <td><input type="text" name="nama" class="sub" autocomplete="off" placeholder="Name"></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" name="simpan" class="button">Simpan</button></td> 
            </tr>
        </table>
    </form>
    </center>
<hr />
            
    <?php require("footer.php"); ?>
</body>
</html>
<?php
// Proses Simpan
if(isset($_POST['simpan'])){
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $nama = $_POST['nama'];
    $pass_enc = md5($pass);
    $simpan = mysqli_query($connect, "INSERT INTO petugas VALUES(NULL, '$user', '$pass_enc', '$nama', 'Petugas')");
        if($simpan){
            echo '<script>alert("Data Berhasil Ditambahkan")</script>';
            ?>
            <script>
                document.location.href="layout_petugas.php";
            </script>
            <?php
        }else{
            echo "<script>alert('Data sudah ada');</script>";
        }
}
?>