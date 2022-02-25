<?php
include("../Connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style_tambah.css">
    <title>Tambah Kelas</title>
</head>
<body>
    
    <?php require("header.php"); ?>
    
    <center>
    <h3>Tambah Kelas</h3>
    <form action="" method="POST">
        <table cellpadding="5">
            <tr>
                <td>Nama Kelas</td>
                <td align="center">:</td>
                <td><input type="text" name="nama" class="sub"></td>
            </tr>
            <tr>
                <td>Kompetensi Keahlian</td>
                <td align="center">:</td>
                <td><input type="text" name="kk" class="sub"></td>
            </tr>
            <tr>
                <td colspan="3"><button type="submit" name="simpan" class="button">Simpan</button></td>
            </tr>
        </table>
    </form>
    </center>
<hr />
            
    <?php include("footer.php"); ?>
</body>
</html>
<?php
// Proses Simpan
if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];
    $kk = $_POST['kk'];
    $simpan = mysqli_query($connect, "INSERT INTO kelas VALUES(NULL, '$nama', '$kk')");
        if($simpan){
            header("location: layout_kelas.php");
        }else{
            echo "<script>alert('Data sudah ada');</script>";
        }
}
?>