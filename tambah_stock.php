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
<form action="proses_stock.php" method="post">
<input type="hidden" name="kode_barang" value="<?php echo $kode_barang; ?>">
Tambah Stock : <input type="number" name="stock"><br>
<input type="submit" name="Update">
</form>
</body>
</html>