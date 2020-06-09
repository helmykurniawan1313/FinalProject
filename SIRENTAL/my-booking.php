<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>SIRENTAL | BOOKING SAYA</title>
    <link rel="stylesheet" href="assets/css/main.css" type="text/css">
</head>
<body>
<?php include('includes/header.php');?>
<div class="card text-center">
  <div class="card-header">
    <h5>Booking Saya</h5>
  </div>
	<div class="card-body">
    <h5 class="card-title"><?php echo htmlentities($result->FullName);?></p></h5>   
	</div>

      <?php 
        $useremail=$_SESSION['login'];
        $sql = "SELECT * from tblusers where EmailId=:useremail";
        $query = $dbh -> prepare($sql);
        $query -> bindParam(':useremail',$useremail, PDO::PARAM_STR);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query->rowCount() > 0){
          foreach($results as $result){ 
      ?>
<a href="manage-bookings.php" class="btn btn-primary" >Pesanan Booking di Mobil Saya</a>
</div>
        <?php 
            $useremail=$_SESSION['login'];
            $sql = "SELECT tblvehicles.Vimage1 as Vimage1,tblvehicles.merk, tblvehicles.namamobil, tblvehicles.id as vid,merk.merk,transaksi.tglmulai,transaksi.tglselsai,transaksi.status  from transaksi join tblvehicles on transaksi.vehicleid=tblvehicles.id join merk on merk.id=tblvehicles.merk where transaksi.email=:useremail";
            $query = $dbh -> prepare($sql);
            $query-> bindParam(':useremail', $useremail, PDO::PARAM_STR);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            $cnt=1;
            if($query->rowCount() > 0){
        ?>
<div class="row">
<?php foreach($results as $result){?> 
	<div class="col-lg-4 col-md-6">
    	<div class="card">
        	<div> 
            	<a href="vehical-details.php?vhid=<?php echo htmlentities($result->vid);?>">
                <img class="card-img-top" src="img/upload/<?php echo htmlentities($result->Vimage1);?>" alt="image"></a> 
            </div>
       <div class="card-body">
       	<h6><a href="vehical-details.php?vhid=<?php echo htmlentities($result->vid);?>"><?php echo htmlentities($result->merk);?> , <?php echo htmlentities($result->namamobil);?></a></h6>
        <p class="card-text">
        <b>Tanggal Mulai:</b><?php echo htmlentities($result->tglmulai);?>
        <br/>
        <b>Tanggal Selesai:</b> <?php echo htmlentities($result->tglselsai);?></p>
		   
         	<?php if($result->status==1){ ?>
            	<a href="#">Dikonfirmasi</a>        
            <?php } else if($result->status==2) { ?>
                <a href="#">Dibatalkan</a>   
            <?php } else { ?>
                <a href="#">Belum Dikonfirmasi</a>
            <?php } ?>
       </div>
       </div>
	</div>
            <?php } } ?>
</div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script> 
   <section>
<nav class="navbar fixed-bottom navbar-light bg-light">
  <a class="navbar-brand" >Final Project Web</a>
</nav>
</section>
  </body> 
</html>
<?php }}} ?>