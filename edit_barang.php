<?php
include 'koneksi.php';

$kode_barang = isset($_POST['kode_barang'])? $_POST['kode_barang']:'';
$nama_barang = isset($_POST['nama_barang'])? $_POST['nama_barang']:'';
$jenis_barang = isset($_POST['jenis_barang'])? $_POST['jenis_barang']:'';
$harga = isset($_POST['harga'])? $_POST['harga']:'';
$deskripsi = isset($_POST['deskripsi'])? $_POST['deskripsi']:'';

$query = mysqli_query($link_db, "UPDATE tbl_barang SET nama_barang='$nama_barang', jenis_barang='$jenis_barang', harga='$harga', deskripsi='$deskripsi' WHERE kode_barang='$kode_barang'");
if ($query) {
	echo "<script>alert('Berhasil!!!')</script>";
	echo "<meta http-equiv='refresh' content='0 url=tampil_barang.php'>";
}
?>