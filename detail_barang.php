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
$kode_barang = isset($_GET['kode_barang'])? $_GET['kode_barang']:'';
$query = mysqli_query($link_db, "SELECT * FROM tbl_barang WHERE kode_barang='$kode_barang'");
$p = mysqli_fetch_array($query);
?>
<img src="images/<?php echo $p['foto']; ?>" width="100px" height="100px"><br>
Nama : <?php echo $p['nama_barang']; ?><br>
Jenis Barang : <?php echo $p['jenis_barang']; ?><br>
Harga : <?php echo $p['harga']; ?><br>
Deskripsi : <?php echo $p['deskripsi']; ?><br>
</body>
</html>