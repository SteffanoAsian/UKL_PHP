<?php
require_once("../Connect.php");
$id = $_GET['id'];
$spp = mysqli_query($connect, "SELECT * FROM spp WHERE id_spp='$id'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="Stylesheet" href="style_tambah.css">
    <title>Edit data SPP</title>
</head>
<body>
    <?php require("header.php"); ?>
    <center>
    <h3>Edit data SPP</h3>
<?php
while($row = mysqli_fetch_assoc($spp)){?>
    <form action="" method="POST">
        <table cellpadding="5">
            <input type="hidden" name="id" value="<?= $row['id_spp']; ?>">
            <tr>
                <td>Tahun :</td>
                <td><input type="text" class="sub" name="tahun" value="<?= $row['tahun']; ?>"></td>
            </tr>
            <tr>
                <td>Nominal :</td>
                <td><input type="text" class="sub" name="nominal" value="<?= $row['nominal']; ?>"></td>
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
    $tahun = $_POST['tahun'];
    $nominal = $_POST['nominal'];
    $update = mysqli_query($connect, "UPDATE spp SET tahun='$tahun', nominal='$nominal'
                                 WHERE spp.id_spp='$id'");
        if($update){
            header("location: layout_spp.php");
        }else{
            echo "<script>alert('Gagal'); </script>";
        }
}
?>