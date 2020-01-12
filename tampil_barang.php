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
	<td>Foto Barang</td>
	<td>Nama Barang</td>
	<td>Jenis Barang</td>
	<td>Harga</td>
	<td>Deskripsi</td>
	<td>Stock</td>
	<td>Action</td>
</tr>
<?php
$query = mysqli_query($link_db, "SELECT * FROM tbl_barang");
while ($data=mysqli_fetch_array($query)){
?>
<tr>
	<td><img src="images/<?php echo $data['foto'];?>" width="50px" height="50px"></td>
	<td><?php echo $data['nama_barang']; ?></td>
	<td><?php echo $data['jenis_barang']; ?></td>
	<td><?php echo $data['harga']; ?></td>
	<td><?php echo $data['deskripsi']; ?></td>
	<td><?php echo $data['stock']; ?></td>
	<td><a href="tambah_stock.php?kode_barang=<?php echo $data['kode_barang']; ?>"><button>Tambah Stock</button></a>||<a href="form_editbarang.php?kode_barang=<?php echo $data['kode_barang']; ?>"><button>Edit</button></a>||<a href="delete_barang.php?kode_barang=<?php echo $data['kode_barang']; ?>"><button>Delete</button></a></td>
</tr>
<?php
}
?>
</table>
</body>
</html>