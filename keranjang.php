<?php
include "koneksi.php";
session_start();
if (!isset($_SESSION['username'])){
header ("location:login.php");
}
?>
<?php
$username = $_SESSION['username'];
?>
<html>
<head>
	<title></title>
</head>
<body>
<?php
$query5 = "SELECT * FROM tbl_keranjang WHERE username='$username'";
$sql5 = mysqli_query($link_db, $query5);
$data5 = mysqli_fetch_array($sql5);
$pp = $data5['kode_barang'];
?>
<?php
if ($pp) {
?>
<table border="1">
	<tr>
		<td>No</td>
		<td>Foto Barang</td>
		<td>Kode Barang</td>
		<td>Nama Barang</td>
		<td>Harga Barang</td>
		<td>Jumlah Barang</td>
		<td>Status Stock</td>
		<td>Aksi</td>
		<td>Total</td>
	</tr>
<?php
$no = 1;
$query2 = "SELECT * FROM tbl_keranjang WHERE username='$username'";
$sql2 = mysqli_query($link_db, $query2);
while ($data = mysqli_fetch_array($sql2)) {
?>
	<tr>
		<td><?php echo $no; ?></td>
		<td><img src="images/<?php echo $data['foto']; ?>" width="100" height="100"></td>
		<td><?php echo $data['kode_barang']; ?></td>
		<td><?php echo $data['nama_barang']; ?></td>
		<td><?php echo $data['harga']; ?></td>
		<td><?php echo $data['jumlah_barang']; ?></td>
<?php
$kode_barang = $data['kode_barang'];
$query4 = "SELECT * FROM tbl_barang WHERE kode_barang='$kode_barang'";
$sql4 = mysqli_query($link_db, $query4);
$data4 = mysqli_fetch_array($sql4);
?>
<?php
$stock = $data4['stock'];
$jumlah_barang = $data['jumlah_barang'];
if ($stock >= $jumlah_barang) {
	$tersedia = '<font color="green">STOCK TERSEDIA</font>';
}else{
	$tersedia = '<font color="red">STOCK TIDAK TERSEDIA</font>';
}
?>
		<td><?php echo $tersedia; ?></td>
		<td><a href="hapus_keranjang.php?id=<?php echo $data['id']; ?>">Delete</td>
		<td><?php echo $data['total']; ?></td>
	</tr>
<?php
$no++;
}
?>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
<td><?php
$query3 = "SELECT SUM(total) FROM tbl_keranjang WHERE username='$username'";
$sql3 = mysqli_query($link_db, $query3);
while ($data3 = mysqli_fetch_array($sql3))
{
?>
		<?php echo $data3['SUM(total)']; ?>
<form action="proses_bayar.php" method="post">
	<input type="hidden" name="harga" value="<?php echo $data3['SUM(total)']; ?>">
<?php
}
?>
</td>

	</tr>
</table>
<input type="submit" name="bayar" value="Bayar"> <a href="index.php">Lanjut Berbelanja</a>
</form>
<?php
}else{
	echo "Tidak Ada Data Keranjang Silahkan <a href='index.php'>Berbelanja</a>";
}
?>
</body>
</html>