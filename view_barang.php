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
<form action="proses_keranjang.php" method="post">
<?php
$username = $_SESSION['username'];
$kode_barang = isset($_GET['kode_barang'])? $_GET['kode_barang']:'';
$query = mysqli_query($link_db, "SELECT * FROM tbl_barang WHERE kode_barang='$kode_barang'");
$p=mysqli_fetch_array($query);
?>
<br>
<br>
<img src="images/<?php echo $p['foto']; ?>" width="200" height="200"><br>
<?php echo $p['nama_barang']; ?><br>
Rp. <?php echo $p['harga']; ?>,-<br>
Stock : <?php echo $p['stock']; ?><br>
<input type="hidden" name="username" value="<?php echo $username; ?>">
<input type="hidden" name="kode_barang" value="<?php echo $kode_barang; ?>">
<input type="hidden" name="nama_barang" value="<?php echo $p['nama_barang']; ?>">
<input type="hidden" name="foto" value="<?php echo $p['foto']; ?>">
<input type="hidden" name="harga" value="<?php echo $p['harga']; ?>">
Jumlah Pesanan : <input type="text" name="jumlah_barang"><br> <input type="submit" name="troli" value="Masukkan Troli"> <input type="submit" name="belanjasekarang" value="Belanja Sekarang"><br>
Deskripsi Produk : <?php echo $p['deskripsi']; ?><br>
</form>
</body>
</html>