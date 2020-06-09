<?php 
session_start();
include('includes/config.php');
error_reporting(0);
?>
<html lang="en">
<head>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<title>SIRENTAL | Daftar Mobil </title>
</head>
<body>
<?php include('includes/header.php');?>
<div class="jumbotron jumbotron-fluid" align="center">
	<div class="container">
		<h1 class="display-4">SIRENTAL Surabaya </h1>
		<p class="lead">Selamat datang, Sewa atau Menyewakan mobil di SIRENTAL aja  </p>
	</div>
</div>
<section class="listing-page">
  <div class="container">
    <div class="row">
      <div class="col-md-9 col-md-push-3">
        <div class="result-sorting-wrapper">
          <div class="sorting-count">
  <?php 
  $sql = "SELECT id from tblvehicles";
  $query = $dbh -> prepare($sql);
  $query->execute();
  $results=$query->fetchAll(PDO::FETCH_OBJ);
  $cnt=$query->rowCount();
  ?>
  			<p><span>Hasil Pencarian <?php echo htmlentities($cnt);?> </span></p>
 		  </div>
  		</div>

  <?php $sql = "SELECT tblvehicles.*,merk.merk,merk.id as bid  from tblvehicles join merk on merk.id=tblvehicles.merk";
  $query = $dbh -> prepare($sql);
  $query->execute();
  $results=$query->fetchAll(PDO::FETCH_OBJ);
  $cnt=1;
  if($query->rowCount() > 0)
  {
  foreach($results as $result)
  {  ?>
<div class="product-listing-m gray-bg">
    <div class="product-listing-img"><img src="img/upload/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="Image" /> </a> 
    </div>
    <div class="product-listing-content">
   	 	<h5><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->merk);?> , <?php echo htmlentities($result->namamobil);?></a></h5>
    	<p class="list-price">Rp. <?php echo htmlentities($result->harga);?> Per Hari</p>
    <ul>
        <li></i><?php echo htmlentities($result->kapasitas);?> kursi</li>
        <li></i><?php echo htmlentities($result->transmisi);?> </li>
        <li></i><?php echo htmlentities($result->bahanbakar);?></li>
    </ul>
    	<a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>" class="btn">Detail </a>
    </div>
</div>
<?php }} ?>
    </div>
<aside class="col-md-3 col-md-pull-9">
<div class="sidebar_widget">
	<div class="widget_heading">
		<h5> Cari Mobil  </h5>
	</div>
	<div class="sidebar_filter">
		<form action="search-carresult.php" method="post">
		<div class="form-group">
			<select class="form-control" name="merk">
			<option>Pilih Merk</option>
			<?php $sql = "SELECT * from  merk ";
			$query = $dbh -> prepare($sql);
			$query->execute();
			$results=$query->fetchAll(PDO::FETCH_OBJ);
			$cnt=1;
			if($query->rowCount() > 0)
			{
				foreach($results as $result)
			{       ?>  
			<option value="<?php echo htmlentities($result->merk);?>"><?php echo htmlentities($result->merk);?></option>
			<?php }} ?>   
           </select>
       </div>
              <div class="form-group">
                <button type="submit" class="btn btn-block"> Cari Mobil</button>
              </div>
        </form>
   </div>
</div>
<div class="sidebar_widget">
	<div class="widget_heading">
		<h5> Mobil yang barusaja ditambahkan</h5>
	</div>
	<div class="recent_addedcars">
	<ul>
	<?php $sql = "SELECT tblvehicles.*,merk.merk,merk.id as bid  from tblvehicles join merk on merk.id=tblvehicles.merk order by id desc limit 4";
		$query = $dbh -> prepare($sql);
		$query->execute();
		$results=$query->fetchAll(PDO::FETCH_OBJ);
		$cnt=1;
		if($query->rowCount() > 0)
		{
			foreach($results as $result)
			{  ?>

    	<li class="gray-bg">
        <div class="recent_post_img"> <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><img src="img/upload/<?php echo htmlentities($result->Vimage1);?>" alt="image"></a> </div>
        <div class="recent_post_title"> <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->merk);?> , <?php echo htmlentities($result->namamobil);?></a>
        <p class="widget_price">Rp. <?php echo htmlentities($result->harga);?> Per Hari</p>
        </div>
        </li>
         <?php }} ?>     
   </ul>
  </div>
</div>
</aside>
    </div>
  </div>
</section>
<section>
<nav class="navbar fixed-bottom navbar-light bg-light">
  <a class="navbar-brand" >Final Project Web</a>
</nav>
</section>

  <?php include('includes/login.php');?>
  <?php include('includes/registration.php');?>
 <script src="assets/js/jquery.min.js"></script>
 <script src="assets/js/bootstrap.min.js"></script> 
 </body>
</html>
