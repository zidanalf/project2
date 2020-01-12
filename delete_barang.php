<?php
include 'koneksi.php';
$kode_barang = isset($_GET['kode_barang'])? $_GET['kode_barang']:'';

$query = mysqli_query($link_db, "DELETE FROM tbl_barang WHERE kode_barang='$kode_barang'");
if ($query) {
	echo "<script>alert('Berhasil Delete Barang')</script>";
	echo "<meta http-equiv='refresh' content='0 url=tampil_barang.php'>";
}
?>