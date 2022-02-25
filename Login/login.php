<?php
session_start();
if(isset($_SESSION['username'])){
    header("location:../Utama/main_layout.php");
}
?>
<html>
    <head>
        <title>ADMIN LOGIN PAGE</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="proseslogin.php" method="POST">
        <h3>Login Here</h3>

        <label for="username">Username</label>
        <input type="text" name = "username" placeholder="Username" id="username" autocomplete="off">

        <label for="password">Password</label>
        <input type="password" name= "password" placeholder="Password" id="password" autocomplete="off">

        <input type="submit" value="LOG IN" id="login" name="login">
        <div class="link">
        <a  href="login_siswa.php">
           Student Login 
        </a>
        </div>
    </form>
</body>
</html>