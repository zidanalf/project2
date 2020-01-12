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
$bukti_pembayaran = isset($_GET['bukti_pembayaran'])? $_GET['bukti_pembayaran']:'';
?>
<img src="images/<?php echo $bukti_pembayaran; ?>">
</body>
</html>