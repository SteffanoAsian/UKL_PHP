<?php
require_once("../Connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style_tambah.css">
    <title>Tambah SPP</title>
</head>
<body>
    
    <?php require("header.php"); ?>

    <center>
    <h3>Tambah SPP</h3>
    <form action="" method="POST">
        <table cellpadding="5">
            <tr>
                <td>Tahun</td>
                <td align="center">:</td>
                <td><input type="text" name="tahun" class="sub"></td>
            </tr>
            <tr>
                <td>Nominal</td>
                <td align="center">:</td>
                <td><input type="text" name="nominal" class="sub"></td>
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
    $tahun = $_POST['tahun'];
    $nominal = $_POST['nominal'];
    $simpan = mysqli_query($connect, "INSERT INTO spp VALUES(NULL, '$tahun', '$nominal')");
        if($simpan){
            header("location: spp.php");
        }else{
            echo "<script>alert('Data sudah ada');</script>";
        }
}
?>