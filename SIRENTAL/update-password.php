
<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
if(isset($_POST['update']))
  {
$password=md5($_POST['password']);
$newpassword=md5($_POST['newpassword']);
$email=$_SESSION['login'];
  $sql ="SELECT Password FROM tblusers WHERE EmailId=:email and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update tblusers set Password=:newpassword where EmailId=:email";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
$msg="Your Password succesfully changed";
}
else {
 echo "<script>alert('Password Anda Salah');</script>";
}
}

?>
  <!DOCTYPE HTML>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("Password Baru dan Confirm Password TIDAK SAMA !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>
  
</head>
<body>

<?php include('includes/header.php');?>

<?php 
$useremail=$_SESSION['login'];
$sql = "SELECT * from tblusers where EmailId='$useremail'";
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
  </div>
<br><br>
          
 
          <div class="container">
           <div class="row">
<div class="col-md-12" >
<div class="card">
	<div class="card-header">
	 <h5>Pengaturan Profil</h5>
	</div>
	<div class="card-body">
<form name="chngpwd" method="post" onSubmit="return valid();">

	
<?php if($error){?><div><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
else if($msg){echo "<script>alert('Profil Berhasil Diubah');</script>";}?>
 <div class="form-group row">         
<label class="col-sm-2 col-form-label">Password Saat Ini</label>
	<div class="col-sm-10">
<input  class="form-control" id="password" name="password"  type="password" required>
	</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Password Baru</label>
	<div class="col-sm-10">
<input  class="form-control" id="newpassword" type="password" name="newpassword" required>
	</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Konfirmasi Password</label>
<div class="col-sm-10">
<input  class="form-control" id="confirmpassword" type="password" name="confirmpassword"  required>
</div>      
</div>
<div class="form-group row">
<div class="col-sm-10">
<input class="btn btn-primary" type="submit" value="Update" name="update" id="update">
</div>
</div>
          </form>


</div>
</div>
</div>
</div> 
</div>

<section>
<nav class="navbar fixed-bottom navbar-light bg-light">
  <a class="navbar-brand" >Final Project Web</a>
</nav>
</section>
</body>
</html>
<?php }}} ?>