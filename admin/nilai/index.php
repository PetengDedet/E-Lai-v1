<?php
##
# File Name : index.php
# Dir 		: /admin/nilai
# Owner 	: Administrator
#
#
#
#
session_start();
if ($_SESSION["level"]== "Admin") {
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
<!--ADMINISTRATOR-->
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
				      	<a href="../" class="navbar-brand">E-Learning</a>
				    </div>
				    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation" >
				      <ul class="nav navbar-nav navbar-right">
					    <li class="dropdown">
					      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span><img src="<?php echo $_SESSION['gambar']; ?>" class="img-circle" width="30" height="30"></span> <?php echo $_SESSION["nama"]; ?> <b class="caret"></b></a>
					      <ul class="dropdown-menu" style="">
					        <li><a href="../administrator/editadm.php?id=<?php echo $_SESSION['id'];?>"><span class="glyphicon glyphicon-user"></span> - Profil</a></li>
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
					  <a href="../mahasiswa" class="list-group-item">
					    <h4 class="list-group-item-heading"><span class="glyphicon glyphicon-user"></span> Mahasiswa</h4>					  </a>
					  <a href="../dosen" class="list-group-item">
					    <h4 class="list-group-item-heading"><span class="glyphicon glyphicon-briefcase"></span> Dosen</h4>
					  </a>
					  <a href="../administrator" class="list-group-item">
					    <h4 class="list-group-item-heading"><span class="glyphicon glyphicon-tower"></span> Administrator</h4>
					  </a>
					  <a href="../kampus" class="list-group-item">
					    <h4 class="list-group-item-heading"><span class="glyphicon glyphicon-home"></span> Kampus</h4>
					  </a>
					  <a href="../ruang" class="list-group-item">
					    <h4 class="list-group-item-heading"><span class="glyphicon glyphicon-th-large"></span> Ruang</h4>
					  </a>
					  <a href="../semester" class="list-group-item">
					    <h4 class="list-group-item-heading"><span class="glyphicon glyphicon-folder-close"></span> Semester</h4>
					  </a>
					  <a href="../tahunakademik" class="list-group-item">
					    <h4 class="list-group-item-heading"><span class="glyphicon glyphicon-calendar"></span> Tahun Akademik</h4>
					  </a>
					  <a href="../matakuliah" class="list-group-item">
					    <h4 class="list-group-item-heading"><span class="glyphicon glyphicon-book"></span> Mata Kuliah</h4>
					  </a>
					  <a href="../bahasan" class="list-group-item">
					    <h4 class="list-group-item-heading"><span class="glyphicon glyphicon-file"></span> Bahasan</h4>
					  </a>
					  <a href="#" class="list-group-item active" style="border-left:5px #333 solid;">
					    <h4 class="list-group-item-heading"><span class="glyphicon glyphicon-list-alt"></span> Nilai</h4>
					  </a>
					</div>
				</div>
				<div class="col-md-9 col-xs-12" style="background:#fff;padding:20px;">
					<legend>Nilai</legend>
					<?php
						include '../../fungsi/fungsi.php';
						sambung2();	
					?>
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