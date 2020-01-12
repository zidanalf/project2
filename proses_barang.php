<?php
include 'koneksi.php';

$nama_barang = isset($_POST['nama_barang'])? $_POST['nama_barang']:'';
$jenis_barang = isset($_POST['jenis_barang'])? $_POST['jenis_barang']:'';
$harga = isset($_POST['harga'])? $_POST['harga']:'';
$stock = isset($_POST['stock'])? $_POST['stock']:'';
$deskripsi = isset($_POST['deskripsi'])? $_POST['deskripsi']:'';

$foto = $_FILES['fotos']['name'];
$tmp = $_FILES['fotos']['tmp_name'];
$rand = rand('1111','9999');
$fotobaru = $rand.$foto;
$path = "images/".$fotobaru;

if(move_uploaded_file($tmp, $path)){ 
	echo "<script>alert('Berhasil!!!')</script>";
	echo "<meta http-equiv='refresh' content='0 url=input_barang.php'>";
}
$query = mysqli_query($link_db, "INSERT INTO tbl_barang (nama_barang, jenis_barang, harga, stock, deskripsi, foto) VALUES ('$nama_barang', '$jenis_barang', '$harga', '$stock', '$deskripsi', '$fotobaru')");
if ($query) {
	echo "<script>alert('Berhasil!!!')</script>";
	echo "<meta http-equiv='refresh' content='0 url=input_barang.php'>";
}
?>