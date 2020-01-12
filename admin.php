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
}
 ?>

<!-- hari ke 2 (a,c) -->
<a href="input_barang.php">Input Barang</a><br>
<a href="tampil_barang.php">Tampil Barang</a><br>
<!-- hari ke 2 (b) -->
<a href="tampil_pelanggan.php">Tampil List Pelanggan</a><br>
<!-- hari ke 2 (d,e) -->
<a href="daftar_pembelian.php">Daftar Pembelian </a><br>
<!-- hari ke 2 (f) -->
<a href="laporan_penjualan.php">Laporan Penjualan</a><br>
<a href="logout.php">Logout</a><br>
</body>
</html>	