<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
if(isset($_POST['updateprofile']))
  {
$name=$_POST['fullname'];
$mobileno=$_POST['mobilenumber'];
$dob=$_POST['dob'];
$adress=$_POST['address'];
$city=$_POST['city'];
$country=$_POST['country'];
$email=$_SESSION['login'];
$sql="update tblusers set FullName=:name,ContactNo=:mobileno,dob=:dob,Address=:adress,City=:city,Country=:country where EmailId=:email";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':mobileno',$mobileno,PDO::PARAM_STR);
$query->bindParam(':dob',$dob,PDO::PARAM_STR);
$query->bindParam(':adress',$adress,PDO::PARAM_STR);
$query->bindParam(':city',$city,PDO::PARAM_STR);
$query->bindParam(':country',$country,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->execute();
$msg= "Profil Telah Di Perbarui";
}

?>
  <!DOCTYPE HTML>
<html lang="en">
<head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<title>SIRENTAL | PROFIL</title>
</head>
<body>
<?php include('includes/header.php');?>
<?php 
$useremail=$_SESSION['login'];
$sql = "SELECT * from tblusers where EmailId=:useremail";
$query = $dbh -> prepare($sql);
$query -> bindParam(':useremail',$useremail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>
<div class="card text-center">
  <div class="card-header">
    <h5>PROFIL PENGGUNA</h5>
  </div>
  <div class="card-body">
    <h5 class="card-title"><?php echo htmlentities($result->FullName);?></p></h5>
    <p class="card-text"><?php echo htmlentities($result->Address);?></p>

  </div>
  <div class="card-footer text-muted">
   <?php  
 if($msg){echo "<script>alert('Profil Berhasil Diubah');</script>";}?>
          <form  method="post">
           <div>
              <label >Tanggal Daftar -</label>
             <?php echo htmlentities($result->RegDate);?>
            </div>
             <?php if($result->UpdationDate!=""){?>
            <div>
              <label >Terakhir Update -</label>
             <?php echo htmlentities($result->UpdationDate);?>
            </div>
            <?php } ?>
  </div>
</div>
     
   
         
          <div class="container">
           <div class="row">
<div class="col-md-12" >
<div class="card">
	<div class="card-header">
	 <h5>Pengaturan Profil</h5>
	</div>
	<div class="card-body">
	<div class="form-group row">
              <label for="nama" class="col-sm-2 col-form-label" >Nama Lengkap</label>
		<div class="col-sm-10">
              <input  class="form-control" name="fullname" value="<?php echo htmlentities($result->FullName);?>" id="fullname" type="text"  required>
           </div>
	</div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Email </label>
			<div class="col-sm-10">
              <input class="form-control" value="<?php echo htmlentities($result->EmailId);?>" name="emailid" id="email" type="email" required readonly>
            </div>
		</div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Nomor Telpon</label>
			<div class="col-sm-10">
              <input class="form-control" name="mobilenumber" value="<?php echo htmlentities($result->ContactNo);?>" id="phone-number" type="text" required>
            </div>
            </div>
	<div class="form-group row">
              <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
			<div class="col-sm-10">
              <input class="form-control" value="<?php echo htmlentities($result->dob);?>" name="dob" placeholder="dd/mm/yyyy" id="birth-date" type="date">
            </div>
            </div>
			<div class="form-group row">
              <label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-10">
              <textarea class="form-control" name="address" rows="4" ><?php echo htmlentities($result->Address);?></textarea>
            </div>
            </div>
		<div class="form-group row">
              <label class="col-sm-2 col-form-label" >Negara</label>
			<div class="col-sm-10">
              <input class="form-control" id="country" name="country" value="<?php echo htmlentities($result->Country);?>" type="text">
            </div>
           </div>
		<div class="form-group row">
              <label class="col-sm-2 col-form-label">Kota</label>
		<div class="col-sm-10">
              <input class="form-control" id="city" name="city" value="<?php echo htmlentities($result->City);?>" type="text">
          </div>
		</div>
		<br>
            <?php }} ?>
           <div class="form-group row">
		<div class="col-sm-10">
           
              <center><button class="btn btn-primary" type="submit" name="updateprofile" >Simpan Perubahan</button></center>
          </form>
  </div></div>
</div></div> </div></div></div>
<section>
<nav class="navbar fixed-bottom navbar-light bg-light">
  <a class="navbar-brand" >Final Project Web</a>
</nav>
</section>
</body>
</html>
<?php } ?>