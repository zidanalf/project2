<?php 
include 'koneksi.php';
session_start();
if (isset($_SESSION['username'])){
header ("location:index.php");
}
?>
<html>
<head>
	<title>Login</title>
</head>
<body>
<form action="proses_login.php" name="login" method="post">
Username : <input type="text" name="username" placeholder="Username"><br>
Password : <input type="password" name="password" placeholder="Password"><br>
<input type="submit" value="Log-In">
</form>
<a href="register.php">Tidak Punya Akun? Register Sekarang!!!</a>
</body>
</html>