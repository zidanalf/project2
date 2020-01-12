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
<form action="edit_barang.php" method="post">
	<input type="hidden" name="kode_barang" value="<?php echo $kode_barang; ?>">
	Nama Barang : <input type="text" name="nama_barang" value="<?php echo $p['nama_barang']; ?>"><br>
	Jenis Barang : <input type="text" name="jenis_barang" value="<?php echo $p['jenis_barang']; ?>"><br>
	Harga : <input type="number" name="harga" value="<?php echo $p['harga']; ?>"><br>
	Deskripsi Barang : <textarea name="deskripsi"><?php echo $p['deskripsi']; ?></textarea>
	<input type="submit" name="Submit">
</form>
</body>
</html>