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
<a href="keranjang.php">Troli</a>
	<br>
<?php
$query = mysqli_query($link_db, "SELECT * FROM tbl_barang");
while ($p=mysqli_fetch_array($query)) {
?>
<img src="images/<?php echo $p['foto']; ?>" width="150px" height="150px"><br>
<a href="view_barang.php?kode_barang=<?php echo $p['kode_barang']; ?>"><?php echo $p['nama_barang']; ?></a><br>
Rp. <?php echo $p['harga']; ?>,-<br>
<?php
}
?>
</body>
</html>