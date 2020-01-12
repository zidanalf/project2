<?php
include 'koneksi.php';

$id = isset($_GET['id'])? $_GET['id']:'';

$query = "DELETE FROM tbl_keranjang WHERE id='$id'";
$sql = mysqli_query($link_db, $query);
if ($sql) {
	echo "<script>alert('Berhasil Hapus!!!')</script>";
	echo "<meta http-equiv='refresh' content='0 url=keranjang.php'>";
}
?>