<?php
include "koneksi.php";

$username = isset($_POST['username'])? $_POST['username']:'';
$kode_barang = isset($_POST['kode_barang'])? $_POST['kode_barang']:'';
$nama_barang = isset($_POST['nama_barang'])? $_POST['nama_barang']:'';
$foto = isset($_POST['foto'])? $_POST['foto']:'';
$harga = isset($_POST['harga'])? $_POST['harga']:'';
$jumlah_barang = isset($_POST['jumlah_barang'])? $_POST['jumlah_barang']:'';

$total = $harga * $jumlah_barang;

$query = mysqli_query($link_db, "INSERT INTO tbl_keranjang (username, kode_barang, nama_barang, foto, harga, jumlah_barang, total) VALUES ('$username', '$kode_barang', '$nama_barang', '$foto', '$harga', '$jumlah_barang', '$total')");
if ($query) {
	echo "<script>alert('Berhasil Masuk Keranjang')</script>";
	echo "<meta http-equiv='refresh' content='0 url=keranjang.php'>";
}
?>