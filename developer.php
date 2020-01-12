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
<?php
$username = $_SESSION['username'];
$query = mysqli_query($link_db, "SELECT * FROM tbl_user WHERE username='$username'");
$p = mysqli_fetch_array($query);
$lvl = $p['level'];
if ($lvl=='pelanggan') {
	echo "<meta http-equiv='refresh' content='0 url=404.php'>";
}else if ($lvl=='admin') {
	echo "<meta http-equiv='refresh' content='0 url=404.php'>";
}
 ?>

<a href="input_barang.php">Input Barang</a><br>
<a href="tampil_barang.php">Tampil Barang</a><br>
<a href="register_admin.php">Register Admin</a><br>
<a href="tampil_admin.php">Tampil List Admin</a><br>
<a href="tampil_pelanggan.php">Tampil List Pelanggan</a><br>
<a href="logout.php">Logout</a><br>
</body>
</html>	