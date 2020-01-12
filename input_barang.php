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
<form action="proses_barang.php" method="post" enctype="multipart/form-data">
	Nama Barang : <input type="text" name="nama_barang"><br>
	Jenis Barang : <input type="text" name="jenis_barang"><br>
	Harga : <input type="number" name="harga"><br>
	Stock : <input type="number" name="stock"><br>
	Foto Barang : <input type="file" name="fotos"><br>
	Deskripsi Barang : <textarea name="deskripsi">
	</textarea>
	<input type="submit" name="Submit">
</form>
</body>
</html>