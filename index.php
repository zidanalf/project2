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
<?php
$username = $_SESSION['username'];
$query = mysqli_query($link_db, "SELECT * FROM tbl_user WHERE username='$username'");
$p = mysqli_fetch_array($query);
$lvl = $p['level'];
$status = $p['status'];
if ($lvl=='admin') {
	echo "<meta http-equiv='refresh' content='0 url=admin.php'>";
}else if ($lvl=='pelanggan') {
	echo "<meta http-equiv='refresh' content='0 url=pelanggan.php'>";
}else if ($lvl=='developer') {
	echo "<meta http-equiv='refresh' content='0 url=developer.php'>";
}

if ($status=='terblokir') {
	echo "<script>alert('Akun Anda Terblokir')</script>";
	echo "<meta http-equiv='refresh' content='0 url=logout.php'>";
}
 ?>	
</body>
</html>	