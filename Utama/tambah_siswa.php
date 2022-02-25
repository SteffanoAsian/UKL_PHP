<?php
include("../connect.php");
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
    <title>Data Siswa</title>
</head>
<body>
    
    <?php include("header.php"); ?>
    <center>
    <h3>Data Siswa</h3>
    <form action="" method="POST">
        <table>
            <tr>
                <td>NISN</td>
                <td align="center">:</td>
                <td><input type="text" name="nisn" class="sub" autocomplete="off"></td>
            </tr>
            <tr>
                <td>NIS</td>
                <td align="center">:</td>
                <td><input type="text" name="nis" class="sub" autocomplete="off"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td align="center">:</td>
                <td><input type="text" name="nama" class="sub" autocomplete="off"></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td align="center">:</td>
                <td><select name="kelas" class="sub">
    <?php
    $kelas = mysqli_query($connect, "SELECT * FROM kelas");
    while($r = mysqli_fetch_assoc($kelas)){ ?>
                        <option class="sub" value="<?= $r['id_kelas']; ?>"><?= $r['nama_kelas'] . " | "
                        . $r['kompetensi_keahlian']; ?></option>
    <?php } ?>      </select></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td align="center">:</td>
                <td><input type="text" name="alamat" class="sub" autocomplete="off"></td>
            </tr>
            <tr>
                <td>No. Telp</td>
                <td align="center">:</td>
                <td><input type="tel" name="no" class="sub" autocomplete="off"></td>
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
    $nisn = $_POST['nisn'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    $no = $_POST['no'];
    $simpan = mysqli_query($connect, "INSERT INTO siswa VALUES
    ('$nisn', '$nis', '$nama', '$kelas', '$alamat', '$no')");
        if($simpan){
            ?>
            <script>
            alert("Data Berhasil Disimpan");
            document.location.href="layout_siswa.php";
            </script>
        <?php
        }else{
            $error = mysqli_error($connect);
            echo "<p>alert('Gagal Menambahkan Data : $error');</p>";
        }
}
?>