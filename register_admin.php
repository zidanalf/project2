<?php
include "koneksi.php";
session_start();
if (!isset($_SESSION['username'])){
header ("location:login.php");
}
?>
<html>
<head>
	<title></title>
</head>
<body>
<form action="proses_admin.php" method="post">
	Username : <input type="text" name="username"><br>
	Nama : <input type="text" name="nama"><br>
	Email : <input type="text" name="email"><br>
	No Telfon : <input type="number" name="no_tlp"><br>
	Jenis Kelamin : <br>
	<input type="radio" name="jenis_kelamin" value="Laki-Laki">Laki-Laki<br>
	<input type="radio" name="jenis_kelamin" value="Perempuan">Perempuan<br>
	Password : <input type="password" name="password"><br>
	Re-Enter Password : <input type="password" name="password2"><br>
	<input type="submit" name="Register">
</form>
</body>
</html>