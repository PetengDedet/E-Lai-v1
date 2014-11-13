<?php
##
# File Name : index.php
# Dir 		: /mahasiswa/profil
# Owner 	: Mahasiswa
#
#
#
#
session_start();
if ($_SESSION["level"]== "Mahasiswa") {
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo $_SESSION['level']; ?> | E-learning</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../../css/lumen.css">
		<script type="text/javascript" src="../../js/jquery-2.0.3.min.js"></script>
		<script type="text/javascript" src="../../js/bootstrap.min.js"></script>

	</head>
	<body style="padding-top:85px;text-shadow: 0px 0px 1px #909090 !important;background:#eee;">
<!--DOSEN-->
		<div class="container">
			<div class="row clearfix">
				<header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner" style="">
				  <div class="container">
				    <div class="navbar-header" style="">
				      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
				      	<a href="index.php" class="navbar-brand">E-Learning</a>
				    </div>
				    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation" >
				      <ul class="nav navbar-nav navbar-right">
					    <li class="dropdown">
					      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span><img src="<?php echo $_SESSION['gambar']; ?>" class="img-circle" width="30" height="30"></span> <?php echo $_SESSION['nama']; ?> <b class="caret"></b></a>
					      <ul class="dropdown-menu" style="">
					        <li><a href="#"><span class="glyphicon glyphicon-user"></span> - Profil</a></li>
					        <li><a href="../pesan"><span class="glyphicon glyphicon-envelope"></span> - Pesan</a></li>
					        <li class="divider"></li>
					        <li><a href="../../logout.php">- Logout <span class="glyphicon glyphicon-log-out"></span></a></li>
					      </ul>
					    </li>
				      </ul>
				    </nav>
				  </div>
				</header>
			</div>
		</div>		
		<div class="container" style="">
			<div class="row">
				<div class="col-md-3 col-xs-12">
					<div class="list-group">
					  <a href="../bahasan" class="list-group-item">
					    <h4 class="list-group-item-heading"><span class="glyphicon glyphicon-bullhorn"></span> Bahasan</h4>
					  </a>
					  <a href="../soal" class="list-group-item">
					    <h4 class="list-group-item-heading"><span class="glyphicon glyphicon-file"></span> Soal</h4>
					  </a>
					  <a href="../nilai" class="list-group-item">
					    <h4 class="list-group-item-heading"><span class="glyphicon glyphicon-list-alt"></span> Nilai</h4>
					  </a>
					</div>
				</div>
				<div class="col-md-9 col-xs-12" style="background:#fff;padding:20px;">
					<legend>Profil</legend>
					<ul class="media-list">
					  <li class="media">
					    <a class="pull-left" href="#">
					      <img class="media-object" src="<?php echo $_SESSION['gambar']; ?>" alt="<?php echo $_SESSION['gambar'];?>" width="120">
					    </a>
					    <div class="media-body">
					      <h4 class="media-heading"><?php echo $_SESSION['nama']; ?></h4>
					      <?php 
					      		include"../../fungsi/fungsi.php";
					      		sambung2();
					      		$am=mysql_query("SELECT * FROM view_mahasiswa WHERE mahasiswa_npm='$_SESSION[id]'");
					      		$yy=mysql_fetch_array($am);
					       ?>
								<h5>NPM / Username :  <?php echo $yy['mahasiswa_npm'];?></h5>
								<h5>Ruang :  <?php echo $yy['ruang_string'];?></h5>
								<h5>Kampus :  <?php echo $yy['KAMPUS_STRING'];?></h5> 
					    </div>
					  </li>
					</ul>

				</div>
			</div>
		</div>

	</body>
</html>
<?php
	}
else{
	header("location:../../login");
}
?>