<?php 
session_start();
include('includes/config.php');
error_reporting(0);
?>

<html>
<head>
<title>SIRENTAL</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="assets/css/main.css" type="text/css">
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
</head>
<body>
	<?php include('includes/header.php');?>
<div class="jumbotron jumbotron-fluid" align="center">
	<div class="container">
		<h1 class="display-4">SIRENTAL Surabaya </h1>
		<p class="lead">Selamat datang, Sewa atau Menyewakan mobil di SIRENTAL aja  </p>
	<?php   
      if(strlen($_SESSION['login'])==0)
	  {	
    ?>
     	<div class="login_btn"> <a href="#loginform" class="btn btn-primary " data-toggle="modal" data-dismiss="modal">Login / Daftar</a> </div>
    <?php 
      } else { 
      	echo "Selamat Datang di Website SIRENTAL";
      } 
      ?>
	</div>
</div>
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
     <img src="img/upload/home_1.png" class="d-block w-100" alt="">
     <div class="carousel-caption d-none d-md-block">
       
       <p>SEWA MOBIL? <span>#SirentalAja</span></p>
     </div>
    </div>
    <div class="carousel-item">
      <img src="img/upload/home_2.png" class="d-block w-100" alt="">
      <div class="carousel-caption d-none d-md-block">
       
       <p>Selamat datang di wessite SIRENTAL, Kami menyediakan banyak pilihan kendaraan untuk disewa. Pilihlah sesuai kebutuhanmu, dijamin pasti puas. Atau ingin menyewakan kendaraanmu? di SIRENTAL juga bisa kok</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/upload/home_3.png" class="d-block w-100" alt="">
      <div class="carousel-caption d-none d-md-block">
       <h3>SEWA MOBIL? <span>#SirentalAja</span></h3>
      
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
     <section id="team" class="team section-bg">
     <div class="container" data-aos="fade-up">
     <div class="section-title">
       <h2>Beberapa Kendaraan Kami</h2>
     </div> 
 <?php 
		 $sql = "SELECT tblvehicles.namamobil,merk.merk,tblvehicles.harga,tblvehicles.transmisi,tblvehicles.bahanbakar,tblvehicles.tahun,tblvehicles.id,tblvehicles.kapasitas,tblvehicles.namapemilik,tblvehicles.Vimage1 from tblvehicles join merk on merk.id=tblvehicles.merk";
		 $query = $dbh -> prepare($sql);
		 $query->execute();
		 $results=$query->fetchAll(PDO::FETCH_OBJ);
		 $cnt=1;
		 if($query->rowCount() > 0){ 
?> 
<div class="row">        
<?php 
		foreach($results as $result){  
 ?>
	<div class="col-lg-4 col-md-6" gray-bg>
		<div class="member" data-aos="fade-up" data-aos-delay="100">
			<div class="pic">
			<img width="350"  height="350" href="detail.php?vhid=<?php echo htmlentities($result->id);?>" src="img/upload/<?php echo htmlentities($result->Vimage1);?>" class="img-fluid" alt=""></div>
				<div class="member-info">
				<h4><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"> 
				<?php echo htmlentities($result->merk);?> , <?php echo htmlentities($result->namamobil);?>
 				</a></h4>
				<span>Bahan Bakar : <?php echo htmlentities($result->bahanbakar);?></span>
					<div class="social">
					<small class="text-muted"><?php echo htmlentities($result->transmisi);?></small>
					</div>
				</div>
		</div>
	</div>

	<?php } ?>
</div>    
	<?php }?>
	</div>
	</section>   

    <?php include('includes/login.php');?>
    <?php include('includes/registration.php');?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script> 
<section>
<nav class="navbar fixed-bottom navbar-light bg-light">
  <a class="navbar-brand" >Final Project Web</a>
</nav>
</section>
 </body>
</html>