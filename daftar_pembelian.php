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
<table border="1">
<tr>
	<td>Nama Pembeli</td>
	<td>Nama Barang</td>
	<td>Jumlah Pesanan</td>
	<td>Harga Barang</td>
	<td>Tanggal Pesanan</td>
	<td>Alamat Pembeli</td>
	<td>Total</td>
	<td>Bukti Pembayaran</td>
	<td>No Resi</td>
	<td>Action</td>
</tr>
<?php
$query = mysqli_query($link_db, "SELECT * FROM tbl_pesanan");
while($p = mysqli_fetch_array($query)){
	$username = $p['username'];
	$kode_barang = $p['kode_barang'];
	$kode_pesanan = $p['kode_pesanan'];
?>
<tr>
<?php
$query2 = mysqli_query($link_db, "SELECT * FROM tbl_profile WHERE username='$username'");
$p2 = mysqli_fetch_array($query2);
?>
	<td><?php echo $p2['nama']; ?></td>
<?php
$query3 = mysqli_query($link_db, "SELECT * FROM tbl_barang WHERE kode_barang='$kode_barang'");
$p3 = mysqli_fetch_array($query3);
?>
	<td><a href="detail_barang.php?kode_barang=<?php echo $kode_barang; ?>"><?php echo $p3['nama_barang']; ?></td>
	<td><?php echo $p['jumlah_pesanan']; ?></td>
	<td><?php echo $p['harga_barang']; ?></td>
	<td><?php echo $p['tgl_pembayaran']; ?></td>
<?php
$query4 = mysqli_query($link_db, "SELECT * FROM tbl_alamat WHERE username='$username'");
$p4 = mysqli_fetch_array($query4);
?>
	<td><textarea readonly><?php echo $p4['alamat']; ?></textarea></td>
<?php
$query5 = mysqli_query($link_db, "SELECT * FROM tbl_pembayaran WHERE kode_pesanan='$kode_pesanan'");
$p5 = mysqli_fetch_array($query5);
?>
	<td><?php echo $p5['total_pembayaran']; ?></td>
	<td><a href="bukti_pembayaran.php?bukti_pembayaran=<?php echo $p5['bukti_pembayaran']; ?>">Detail </a></td>
	<td><?php echo $p5['no_resi']; ?></td>
	<td><a href="input_resi.php?kode_pesanan=<?php echo $kode_pesanan; ?>"><button>ACC</button></a></td>
</tr>

<?php	
	}
?>
	</table>
</body>
</html>