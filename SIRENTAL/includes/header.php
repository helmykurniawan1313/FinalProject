<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>    
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<header>
<nav class="navbar navbar-dark  navbar-expand-lg" style="background-color: #0e181d;">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php"> Beranda <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="car-listing.php"> Daftar Mobil </a>
      </li>
    </ul>
      <div class="header_wrap">
        <div style="margin-left: 25px;" class="user_login">
          <ul>
            <li class="dropdown"><a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
              <?php 
              $email=$_SESSION['login'];
              $sql ="SELECT FullName FROM tblusers WHERE EmailId=:email ";
              $query= $dbh -> prepare($sql);
              $query-> bindParam(':email', $email, PDO::PARAM_STR);
              $query-> execute();
              $results=$query->fetchAll(PDO::FETCH_OBJ);
              if($query->rowCount() > 0)
              {
                foreach($results as $result)
                { 
                  echo htmlentities($result->FullName); }}?></a>
              <ul class="dropdown-menu">
                <?php if($_SESSION['login']){?>
                  <li><a href="profile.php">Profil</a></li>
                  <li><a href="update-password.php">Ganti Password</a></li>
                  <li><a href="my-booking.php">Transaksi</a></li>
                  <li><a href="post-avehical.php">Sewakan Mobil</a></li>
                  <li><a href="logout.php">Sign Out</a></li>
                <?php } else { ?>
                  <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Profil</a></li>
                  <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Ganti Password</a></li>
                  <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Transaksi</a></li>
                  <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Sewakan Mobil</a></li>
                  <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Sign Out</a></li>
                <?php } ?>
               </ul>
            </li>
          </ul>
        </div>    
      </div>
  </div>
</nav>

  
</header>