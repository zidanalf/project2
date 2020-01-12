<?php
include 'koneksi.php';

$kode_pesanan = isset($_POST['kode_pesanan'])? $_POST['kode_pesanan']:'';
$no_resi = isset($_POST['no_resi'])? $_POST['no_resi']:'';

$query = mysqli_query($link_db, "UPDATE tbl_pembayaran SET no_resi='$no_resi' WHERE kode_pesanan='$kode_pesanan'");
$query2 = mysqli_query($link_db, "UPDATE tbl_pesanan SET status='sudah dibayar' WHERE kode_pesanan='$kode_pesanan'");

if ($query&&$query2) {
	echo "<script>alert('Berhasil Input Resi')</script>";
	echo "<meta http-equiv='refresh' content='0 url=daftar_pembelian.php'>";
}
?>