<?php 
session_start();
include('includes/config.php');
error_reporting(0);
if(isset($_POST['submit']))
{
$tglmulai=$_POST['tglmulai'];
$tglselesai=$_POST['tglselesai']; 
$useremail=$_SESSION['login'];
$status=0;
$vhid=$_GET['vhid'];
$sql="INSERT INTO  transaksi(email,vehicleid,tglmulai,tglselsai,status) VALUES('$useremail','$vhid','$tglmulai','$tglselesai','$status')";
$query = $dbh->prepare($sql);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Booking Sukses.');</script>";
}
else 
{
echo "<script>alert('Coba Lagi');</script>";
}
}
?>

<!DOCTYPE HTML>
<html>
<head>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">

<title>SIRENTAK | Informasi Kendaraan</title>
<?php include('includes/header.php');?>
<?php 
$vhid=intval($_GET['vhid']);
$sql = "SELECT tblvehicles.*,merk.merk,merk.id as bid  from tblvehicles join merk on merk.id=tblvehicles.merk where tblvehicles.id='$vhid'";
$query = $dbh -> prepare($sql);

$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
$_SESSION['brndid']=$result->bid;  
?>  
	<section id="listing_img_slider">
  <div><img src="img/upload/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="image" width="900" height="560"></div>
  <div><img src="img/upload/<?php echo htmlentities($result->Vimage2);?>" class="img-responsive" alt="image" width="900" height="560"></div>
  <div><img src="img/upload/<?php echo htmlentities($result->Vimage3);?>" class="img-responsive" alt="image" width="900" height="560"></div>
  <div><img src="img/upload/<?php echo htmlentities($result->Vimage4);?>" class="img-responsive"  alt="image" width="900" height="560"></div>
  <?php if($result->Vimage5=="")
{

} else {
  ?>
  <div><img src="img/upload/<?php echo htmlentities($result->Vimage5);?>" class="img-responsive" alt="image" width="900" height="560"></div>
  <?php } ?>
</section>
<section>

	<div class="container gray-bg" >
           <div class="row">
<div class="col" >
<div class="card">
	<div class="card-header">
        <h2 class="display-2"><?php echo htmlentities($result->merk);?> , <?php echo htmlentities($result->namamobil);?></h2>
	</div>
<div class="card-body">
<div class="form-group row">
<label class="col-sm-4 col-form-label" ><h4>Spesifikasi Mobil </label></h4>
	</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label" >Nama Mobil</label>
	<div class="col-sm-10">
  <li class="list-group-item"><?php echo htmlentities($result->merk);?> , <?php echo htmlentities($result->namamobil);?></li>
	</div>
     </div> 
	<div class="form-group row">
<label class="col-sm-2 col-form-label" >Bahan Bakar</label>
		<div class="col-sm-10">
  <li class="list-group-item"><?php echo htmlentities($result->bahanbakar);?></li>
		</div>
     </div> 
	<div class="form-group row">
<label class="col-sm-2 col-form-label" >Tahun Pembuatan</label>
			<div class="col-sm-10">
  <li class="list-group-item"><?php echo htmlentities($result->tahun);?></li>
		</div>
     </div> 
	<div class="form-group row">
<label class="col-sm-2 col-form-label" >Kapasitas Kursi</label>
				<div class="col-sm-10">
  <li class="list-group-item"><?php echo htmlentities($result->kapasitas);?> Kursi</li>
		</div>
     </div> 
	<div class="form-group row">
<label class="col-sm-2 col-form-label" >Harga Sewa</label>
					<div class="col-sm-10">
  <li class="list-group-item">Rp. <?php echo htmlentities($result->harga);?> Per Hari</li>
		</div>
     </div> 
<div class="form-group row">
<label class="col-sm-2 col-form-label" >Transmisi Mobil</label>
				<div class="col-sm-10">
  <li class="list-group-item">Transmisi <?php echo htmlentities($result->transmisi);?> </li>
		</div>
     </div> 
</ul>
	</div>
     </div>   
<div class="card-body">
<div class="form-group row">
<label class="col-sm-4 col-form-label" ><h4>Informasi Pemilik Mobil </label></h4>
	</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label" >Nama Pemilik / Nama Perusahaan</label>
	<div class="col-sm-10">
  <li class="list-group-item"><?php echo htmlentities($result->namapemilik);?></li>
	</div>
     </div> 
	<div class="form-group row">
<label class="col-sm-2 col-form-label" >Nomor Telpon</label>
		<div class="col-sm-10">
  <li class="list-group-item"><?php echo htmlentities($result->telp);?></li>
		</div>
     </div> 
 </div>
<div class="card-body">
<div class="form-group row">
<label class="col-sm-4 col-form-label" ><h4>Syarat Sewa Mobil </label></h4>
</div></div>
<div class="form-group row">
<div class="col-sm-8" >
<ul class="list-group">

 <?php if($result->sim==1)
{ ?>  <li class="list-group-item">
		
<?php echo  htmlentities ("Harus Memiliki Surat Izin Mengemudi");
?>

<?php } ?></li>
  <?php if($result->ktp==1)
{?> <li class="list-group-item">
<?php
	echo  htmlentities ("Harus Memiliki Kartu Tanda Penduduk");
?>

<?php } ?></li></li>
   <?php if($result->kartukredit==1)
{ ?>  <li class="list-group-item">
		
<?php echo  htmlentities ("Harus Memiliki Kartu Kredit");
?>

<?php } ?></li></li>
  <?php } ?></li></li>
   <?php if($result->sosmed==1)
{ ?>  <li class="list-group-item">
		
<?php echo  htmlentities ("Harus Memiliki Akun Sosial Media");
?>
<?php } ?></li></li>
        
	<li class="list-group-item" ><?php echo htmlentities($result->syaratkhusus);?></li>
 
</ul>
</div></div></div></div></div></div>
<?php } ?>
<br>
  <div class="container">
           <div class="row">
<div class="col-md-12" >
<div class="card">
	<div class="card-header">
	 <h5>Sewa Mobil</h5>
	</div>
	<div class="card-body">
	<form method="post">
 <div class="form-group row">         
<label class="col-sm-2 col-form-label">Tanggal Mulai Sewa</label>
	<div class="col-sm-10">
		<input class="form-control" type="date" name="tglmulai" id="tglmulai" required value="<?php echo $tglmulai; ?>"><?php echo $tglmulai; ?>
	 </div></div>
		
	<div class="form-group row">         
<label class="col-sm-2 col-form-label">Tanggal Selesai Sewa</label>
		<div class="col-sm-10">
		<input type="date" class="form-control"s name="tglselesai" required id="tglselesai" value="<?php echo $tglselesai; ?>"><?php echo $tglselesai; ?>	</div></div></div></div>
          <?php if($_SESSION['login'])
              {?>
              <div>
               <center> <input class="btn btn-primary" type="submit"  name="submit" value="Pesan Sekarang"></center>
              </div>
		<?php echo $tglmulai, $tglselesai; ?>
              <?php } else { ?>
<center><a href="#loginform" class="btn btn-primary" type="submit" data-toggle="modal" data-dismiss="modal">Login Dulu Ya </a></center>

              <?php } ?>
          </form>
        </div></div></div></div></div>
       
</section>

<?php include('includes/login.php');?>
<?php include('includes/registration.php');?>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 

<script src="assets/js/owl.carousel.min.js"></script>

<section>
<nav class="navbar fixed-bottom navbar-light bg-light">
  <a class="navbar-brand" >Final Project Web</a>
</nav>
</section>
</body>
</html>