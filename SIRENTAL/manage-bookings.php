<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
{	
header('location:index.php');
}
else{
if(isset($_REQUEST['eid']))
{
$eid=intval($_GET['eid']);
$oid=intval($_GET['oid']);
$status="2";
$sql = "UPDATE transaksi SET status=:status WHERE  vehicleid=:eid and idorder=:oid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':eid',$eid, PDO::PARAM_STR);
$query-> bindParam(':oid',$oid, PDO::PARAM_STR);
$query -> execute();
$msg="Booking Sukses Ditolak";
}
if(isset($_REQUEST['aeid']))
	{
$aeid=intval($_GET['aeid']);
$oid=intval($_GET['oid']);
$status=1;
$sql = "UPDATE transaksi SET status=:status WHERE vehicleid=:aeid and idorder=:oid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':aeid',$aeid, PDO::PARAM_STR);
$query-> bindParam(':oid',$oid, PDO::PARAM_STR);
$query -> execute();
$msg="Booking Sukses Dikonfirmasi";
}
 ?>
<html lang="en">
<head>
	<title>SIRENTAL | BOOKING PADA SAYA  </title>
</head>
<body>
	<?php include('includes/header.php');?>
<div class="card text-center">
 	<div class="card-header">
    <h5>Booking Pada Mobil Saya</h5>
 	</div>
  		<div class="card-body">
    	<h5 class="card-title"><?php echo htmlentities($result->FullName);?></p></h5>
    	<p class="card-text"><?php echo htmlentities($result->Address);?></p>
  		</div>
	<?php if($error){{echo "<script>alert('Status Gagal Diubah');</script>";} } 
			else if($msg){echo "<script>alert('Status Telah Diubah');</script>";}?>
<table id="zctb" cellspacing="0" width="100%">
<thead>
	<tr>
		<th>#</th>
		<th>Email Pemesan</th>
		<th>Kendaraan</th>
		<th>Tanggal Mulai Sewa</th>
		<th>Tanggal Selsai Sewa</th>
		<th>Status</th>
		<th>Tanggal Order</th>
		<th>Action</th>
	</tr>
</thead>
<tbody>
<?php 
	$useremail=$_SESSION['login'];
	$sql = "Select transaksi.*,merk.merk, tblvehicles.id, tblvehicles.namamobil from transaksi join tblvehicles ON transaksi.vehicleid=tblvehicles.id JOIN merk ON tblvehicles.merk=merk.id where tblvehicles.email= '$useremail'  ";
	$query = $dbh -> prepare($sql);
	$query->execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);
	$cnt=1;
		if($query->rowCount() > 0)
		{
		foreach($results as $result){?>	
	<tr>
		<td><?php echo htmlentities($cnt);?></td>
		<td><?php echo htmlentities($result->email);?></td>
		<td><a href="edit-vehicle.php?id=<?php echo htmlentities($result->vid);?>"><?php echo htmlentities($result->merk);?> , <?php echo htmlentities($result->namamobil);?></td>
		<td><?php echo htmlentities($result->tglmulai);?></td>
		<td><?php echo htmlentities($result->tglselsai);?></td>
		<td><?php 
			if($result->status==0)
			{
				echo htmlentities('Belum Ada Status');
			} else if ($result->status==1) {
				echo htmlentities('Dikonfirmaasi');
			}
 			else{
 				echo htmlentities('Dibatalkan');
 			}
		?></td>
		<td><?php echo htmlentities($result->tglorder);?></td>
		<td><a href="manage-bookings.php?aeid=<?php echo htmlentities($result->id);?>&oid=<?php echo htmlentities($result->idorder);?>" onclick="return confirm('Apakah Anda yakin menyetujui bookingan ini?')"> Konfirmasi</a> /
		<a href="manage-bookings.php?eid=<?php echo htmlentities($result->id);?>&oid=<?php echo htmlentities($result->idorder);?>" onclick="return confirm('Apakah Anda Yakin Ingin Menolak Booking ini?')"> Tolak Booking</a>
		</td>
	</tr>
<?php $cnt=$cnt+1; }} ?>
</tbody>
</table>
<section>
<nav class="navbar fixed-bottom navbar-light bg-light">
  <a class="navbar-brand" >Final Project Web</a>
</nav>
</section>
</body>
</html>
<?php } ?>
