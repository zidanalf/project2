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

<table border="1">
<tr>
	<td>Username</td>
	<td>Nama</td>
	<td>Email</td>
	<td>No Handphone</td>
	<td>Jenis Kelamin</td>
	<td>Level</td>
	<td>Status</td>
	<td>Action</td>
</tr>
<?php
$query = mysqli_query($link_db, "SELECT * FROM tbl_user WHERE level='pelanggan'");
while ($data=mysqli_fetch_array($query)){
	$username = $data['username'];
	$status = $data['status'];
?>
<tr>
	<td><?php echo $username; ?></td>
<?php 
$query2 = mysqli_query($link_db, "SELECT * FROM tbl_profile WHERE username='$username'");
$p = mysqli_fetch_array($query2);
?>
	<td><?php echo $p['nama']; ?></td>
	<td><?php echo $p['email']; ?></td>
	<td><?php echo $p['no_tlp']; ?></td>
	<td><?php echo $p['jenis_kelamin']; ?></td>
	<td><?php echo $data['level']; ?></td>
	<?php
if ($status=='terblokir') {
	$st = '<font color="red"> Terblokir </font>';
	$f = 'Batalkan Blokir';
}else{
	$st = '<font color="black"> Aman </font>';
	$f = 'Blokir';
}
?>
	<td><?php echo $st; ?></td>
	<td><a href="proses_blokir.php?username=<?php echo $username; ?>&status=<?php echo $f; ?>&level=<?php echo $data['level']; ?>"><button><?php echo $f; ?></button></a></td>
</tr>
<?php
}
?>
</table>
</body>
</html>