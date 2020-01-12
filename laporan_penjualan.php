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
<a href="print.php">Laporkan</a>
<table border="1">
<tr>
	<td>Nama Pembeli</td>
	<td>Nama Barang</td>
	<td>Jumlah Barang</td>
	<td>Total Harga</td>
	<td>Bukti Pembayaran</td>
	<td>Status</td>
</tr>
</table>
</body>
</html>