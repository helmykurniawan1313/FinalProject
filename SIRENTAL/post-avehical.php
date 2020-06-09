<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
	{	
header('location:index.php');
}
else{ 

if(isset($_POST['submit']))
  {
$namamobil=$_POST['namamobil'];
$merk=$_POST['merk'];
$useremail=$_SESSION['login'];
$namapemilik=$_POST['namapemilik'];
$telp=$_POST['telp'];
$harga=$_POST['harga'];
$bahanbakar=$_POST['bahanbakar'];
$transmisi=$_POST['transmisi'];
$tahun=$_POST['tahun'];
$kapasitas=$_POST['kapasitas'];

$vimage1=$_FILES['img1']['name'];
$vimage2=$_FILES['img2']['name'];
$vimage3=$_FILES['img3']['name'];
$vimage4=$_FILES['img4']['name'];
$vimage5=$_FILES['img5']['name'];
$ktp=$_POST['ktp'];
$sim=$_POST['sim'];
$kartukredit=$_POST['kartukredit'];
$sosmed=$_POST['sosmed'];
$syaratkhusus=$_POST['syaratkhusus'];
move_uploaded_file($_FILES['img1']['tmp_name'],'img/upload/'.$_FILES['img1']['name']);
move_uploaded_file($_FILES['img2']['tmp_name'],'img/upload/'.$_FILES['img2']['name']);
move_uploaded_file($_FILES['img3']['tmp_name'],'img/upload/'.$_FILES['img3']['name']);
move_uploaded_file($_FILES['img4']['tmp_name'],'img/upload/'.$_FILES['img4']['name']);
move_uploaded_file($_FILES['img5']['tmp_name'],'img/upload/'.$_FILES['img5']['name']);

$sql="INSERT INTO tblvehicles(namamobil, merk, email, namapemilik, telp, harga, bahanbakar, transmisi, tahun, kapasitas, Vimage1, Vimage2, Vimage3, Vimage4, Vimage5, ktp, sim, kartukredit, sosmed, syaratkhusus) VALUES ('$namamobil','$merk','$useremail','$namapemilik','$telp','$harga','$bahanbakar','$transmisi','$tahun','$kapasitas','$vimage1','$vimage2','$vimage3','$vimage4','$vimage5','$ktp','$sim','$kartukredit','$sosmed','$syaratkhusus')";
$query = $dbh->prepare($sql);
$query->execute();


$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Mobil telah terpublikasi";
}
else 
{
error_reporting(E_ALL && ~E_NOTICE);
}
}
	?>
<!doctype html>
<html>

<head>
<title>SIRENTAL POST</title>
</head>

<body>
	<?php include('includes/header.php');?>
<br><br>
<section>
	 <div class="container gray-bg" >
           <div class="row">
<div class="col-md-12" >
<div class="card">
	<div class="card-header">
	 <h5>Masukkan Detail Kendaraan Yang Ingin Anda Sewakan</h5>
	</div>
	<div class="card-body">
<?php if($error){?><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){echo "<script>alert('Mobil Telah Terpublish');</script>"; ?> <?php }?>

<form method="post" enctype="multipart/form-data">
<div class="form-group row">
<label class="col-sm-2 col-form-label" >Nama Mobil</label>
<div class="col-sm-10">
<input class="form-control" type="text" name="namamobil" required>
</div>
</div>
	<div class="form-group row">
<label class="col-sm-2 col-form-label" >Pilih Merk</label>
<div class="col-sm-10">
<select class="form-control" name="merk" required>
<option value=""> Select </option>
<?php $ret="select id,merk from merk";
$query= $dbh -> prepare($ret);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
foreach($results as $result)
{
?>
<option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->merk);?></option>
<?php }} ?>

</select>
</div>
</div>
	<div class="form-group row">									
<label class="col-sm-2 col-form-label" >Nama/Perusahaan Pemilik Mobil</label>
	<div class="col-sm-10">
<input class="form-control" type="text" name="namapemilik" required>
</div>
</div>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label">Nomor Telpon</label>
		<div class="col-sm-10">
<input class="form-control" type="text" name="telp" required>
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Harga Sewa per Hari</label>
	<div class="col-sm-10">
<input class="form-control" type="text" name="harga"  required>
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Pilih Jenis Bahan Bakar</label>
	<div class="col-sm-10">
<select class="form-control" name="bahanbakar" required>
<div class="form-group row">
<option value=""> Select </option>
<option value="Bensin">Bensin</option>
<option value="Solar">Solar</option>
<option value="Dex">Dex</option>
</select>
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label"> Pilih Jenis Transmisi</label>
	<div class="col-sm-10">
<select class="form-control" name="transmisi" required>
<option value=""> Select </option>
<option value="Otomatis">Otomatis</option>
<option value="Manual">Manual</option>
</select>
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Tahun Pembuatan Kendaraan</label>
	<div class="col-sm-10">
<input class="form-control" type="text" name="tahun"  required>
	</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Kapasitas Penumpang</label>
	<div class="col-sm-10">
<input class="form-control" type="text" name="kapasitas"required>
</div>
</div>

<h4><b>Upload Gambar Kendaraanmu</b></h4>
<div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Gambar</label>
	<div class="col-sm-10">
 <span style="color:red">*</span><input class="form-control" type="file" name="img1" required>
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Gambar</label><div class="col-sm-10"><span style="color:red">*</span><input class="form-control" type="file" name="img2" required>
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Gambar</label><div class="col-sm-10"><span style="color:red">*</span><input class="form-control" type="file" name="img3" required>
</div>
</div>


<div class="form-group row">
<label class="col-sm-2 col-form-label">Gambar</label><div class="col-sm-10"><span style="color:red">*</span><input class="form-control" type="file" name="img4" required>
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Gambar</label><div class="col-sm-10"><input class="form-control" type="file" name="img5">
</div>
</div>
<div class="form-group row">
<div>Syarat Penyewaan Mobil </div>
<div class="col-sm-10">

</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label" for="sim"> Memiliki SIM A </label>
<div class="col-sm-1">
<input class="form-control" type="checkbox" id="sim" name="sim" value="1">

</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label" for="ktp"> Memiliki KTP </label>
<div class="col-sm-1">
<input class="form-control" type="checkbox" id="ktp" name="ktp" value="1">

</div>
</div>
<div class="form-group row">
	<label class="col-sm-2 col-form-label" for="ktp"> Memiliki Kartu Kredit </label>
	<div class="col-sm-1">
<input class="form-control" type="checkbox" id="kartukredit" name="kartukredit" value="1">

	</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label" for="sosmed"> Memiliki Akun Sosial Media </label>
<div class="col-sm-1">
<input class="form-control" type="checkbox" id="sosmed" name="sosmed" value="1">
	</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label" >Syarat dan Ketentuan khusus dari pemilik untuk penyewa mobil</label>
<div class="col-sm-10">
	<textarea class="form-control" name="syaratkhusus" cols="50" rows="5" required></textarea>
	</div>
</div>
<div class="form-group row">
<div class="col-sm-10">
<center><button class="btn btn-primary" type="reset">Batal</button>
<button class="btn btn-primary" name="submit" type="submit">Simpan dan Post</button></center>
	</div>
</div>												
</form>
	</div>
</div>	</div></div></div></div></div>
</section>
<section>
<nav class="navbar fixed-bottom navbar-light bg-light">
  <a class="navbar-brand" >Final Project Web</a>
</nav>
</section>
</body>
</html>
<?php } ?>