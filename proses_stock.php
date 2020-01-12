<?php
include 'koneksi.php';

$kode_barang = isset($_POST['kode_barang'])? $_POST['kode_barang']:'';
$stock = isset($_POST['stock'])? $_POST['stock']:'';
$query2 = mysqli_query($link_db, "SELECT * FROM tbl_barang WHERE kode_barang='$kode_barang'");
$p = mysqli_fetch_array($query2);
$stockdb = $p['stock'];

$hasil = $stockdb+$stock;
$query = mysqli_query($link_db, "UPDATE tbl_barang SET stock='$hasil' WHERE kode_barang='$kode_barang'");
if ($query) {
	echo "<script>alert('Berhasil Total Stock Menjadi $hasil')</script>";
	echo "<meta http-equiv='refresh' content='0 url=tampil_barang.php'>";
}
?>