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
$kode_pesanan = isset($_GET['kode_pesanan'])? $_GET['kode_pesanan']:'';
?>
<form action="proses_resi.php" method="post">
	<input type="hidden" name="kode_pesanan" value="<?php echo $kode_pesanan; ?>">
Input Resi : <input type="number" name="no_resi"> <input type="submit" value="Submit Resi">
</form>
</body>
</html>