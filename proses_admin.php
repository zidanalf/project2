<?php
include 'koneksi.php';

$username = isset($_POST['username'])? $_POST['username']:'';
$nama = isset($_POST['nama'])? $_POST['nama']:'';
$email = isset($_POST['email'])? $_POST['email']:'';
$no_tlp = isset($_POST['no_tlp'])? $_POST['no_tlp']:'';
$jenis_kelamin = isset($_POST['jenis_kelamin'])? $_POST['jenis_kelamin']:'';
$password = isset($_POST['password'])? $_POST['password']:'';
$password2 = isset($_POST['password2'])? $_POST['password2']:'';

if ($password==$password2) {
	$query = mysqli_query($link_db, "INSERT INTO tbl_user (username, password, level, status) VALUES ('$username', '$password', 'admin', 'tidak terblokir')");
	if ($query) {
		$query2 = mysqli_query($link_db, "INSERT INTO tbl_profile (username, nama, email, no_tlp, jenis_kelamin) VALUES ('$username', '$nama', '$email', '$no_tlp', '$jenis_kelamin')");
		if ($query2) {
			echo "<script>alert('Admin Berhasil Dibuat')</script>";
			echo "<meta http-equiv='refresh' content='0 url=index.php'>";
		}
	}else{
		echo "<script>alert('Gagal!!! Username Sudah Digunakan')</script>";
		echo "<meta http-equiv='refresh' content='0 url=register_admin.php'>";
	}
}else{
	echo "<script>alert('Gagal!!! Password Tidak Sesuai')</script>";
	echo "<meta http-equiv='refresh' content='0 url=register_admin.php'>";
}
?>