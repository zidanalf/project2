<?php
include 'koneksi.php';

$username = isset($_GET['username'])? $_GET['username']:'';
$status = isset($_GET['status'])? $_GET['status']:'';
$level = isset($_GET['level'])? $_GET['level']:'';
if ($level=='admin') {
	if ($status=='Batalkan Blokir') {
		$query = mysqli_query($link_db, "UPDATE tbl_user SET status='tidak terblokir' WHERE username='$username'");
		if ($query) {
			echo "<script>alert('Berhasil Membuka Blokir $username')</script>";
			echo "<meta http-equiv='refresh' content='0 url=tampil_admin.php'>";
		}
	}else if ($status=='Blokir') {
		$query2 = mysqli_query($link_db, "UPDATE tbl_user SET status='terblokir' WHERE username='$username'");
		if ($query2) {
			echo "<script>alert('Berhasil Memblokir $username')</script>";
			echo "<meta http-equiv='refresh' content='0 url=tampil_admin.php'>";
		}
	}
}else if ($level=='pelanggan') {
	if ($status=='Batalkan Blokir') {
		$query = mysqli_query($link_db, "UPDATE tbl_user SET status='tidak terblokir' WHERE username='$username'");
		if ($query) {
			echo "<script>alert('Berhasil Membuka Blokir $username')</script>";
			echo "<meta http-equiv='refresh' content='0 url=tampil_pelanggan.php'>";
		}
	}else if ($status=='Blokir') {
		$query2 = mysqli_query($link_db, "UPDATE tbl_user SET status='terblokir' WHERE username='$username'");
		if ($query2) {
			echo "<script>alert('Berhasil Memblokir $username')</script>";
			echo "<meta http-equiv='refresh' content='0 url=tampil_pelanggan.php'>";
		}
	}
}

?>