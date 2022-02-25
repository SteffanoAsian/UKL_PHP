<?php
session_start();
include("../Connect.php");
// proses login 
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $pass_enc = md5($password);
    $query = mysqli_query($connect, "SELECT * FROM petugas WHERE username='$username'");
    $result = mysqli_fetch_assoc($query);
        if(mysqli_num_rows($query) == 0){
            echo "<center>Username belum terdaftar! <a href='login.php'>Kembali!</a></center>";
        }else{
            if($result['password'] <> $pass_enc){
                // echo "<center>Password salah! <a href='login.php'>Kembali!</a></center>";
                echo "<script> alert('Password Anda SALAH !!') </script>";
                header("location:login.php");
            }else{
                $_SESSION['username'] = $_POST['username'];
                header("location:../Utama/main_layout.php");
            }
        }
    }
?>