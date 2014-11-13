<?php
##
# File Name : inbox.php
# Dir 		: /mahasiswa/pesan
# Owner 	: Mahasiswa
#
#
#
#
session_start();
if ($_SESSION["level"]== "Mahasiswa") {
	$sesm = $_SESSION['id'];
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo $_SESSION['level']; ?> | E-learning</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../../css/lumen.css">
		<script type="text/javascript" src="../../js/jquery-2.0.3.min.js"></script>
		<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../../ck/ckeditor.js"></script>

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
				      	<a href="../" class="navbar-brand">E-Learning</a>
				    </div>
				    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation" >
				      <ul class="nav navbar-nav navbar-right">
					    <li class="dropdown">
					      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span><img src="<?php echo $_SESSION['gambar']; ?>" class="img-circle" width="30" height="30"></span> <?php echo $_SESSION['nama']; ?> <b class="caret"></b></a>
					      <ul class="dropdown-menu" style="">
					        <li><a href="../profil"><span class="glyphicon glyphicon-user"></span> - Profil</a></li>
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
					<legend>Pesan Baru</legend>
							<?php
								include '../../fungsi/fungsi.php';
								sambung2();
							?>
					<ol class="breadcrumb">
					  <li><a href="../">Mahasiswa</a></li>
					  <li><a href="index.php">Pesan</a></li>
					  <li class="active">Pesan Baru</li>
					</ol>
					<div class="btn-group"><a href="inbox.php" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-inbox"></span> Inbox</a></div>
					<br>
					<br>
					<form action="" method="POST" class="form-horizontal">
						<div class="form-group">
  						  <label for="dosen" class="col-sm-2 control-label">Kepada</label>
  						  <div class="col-sm-10">
  						    <select name="dosen" class="form-control input-sm">
					<?php 
						$ruang = $_SESSION['ruang'];
						$caridosen = mysql_query("SELECT * FROM view_distribusi WHERE ruang_id='$ruang'");
						if (mysql_num_rows($caridosen)>0) {
							while ($hdosen = mysql_fetch_array($caridosen)) {?>
								<option value="<?php echo $hdosen['DOSEN_KODE']; ?>"><?php echo $hdosen['DOSEN_NAMA']; ?></option>
					<?php		
							}
						}
					?>
						</select>
  						  </div>
  						</div>

						<div class="form-group">
							<label for="subjek" class="col-sm-2 control-label">Subjek</label>
							<div class="col-sm-10">
								<input type="text" name="subjek" class="form-control input-sm">
							</div>
						</div>
						<div class="form-group">
							<label for="lampiran" class="col-sm-2 control-label">Lampiran (Optional)</label>
							<div class="col-sm-10">
								<input type="file" name="lampiran">
							</div>
						</div>
						<div class="form-group">
							<label for="isi" class="col-sm-2 control-label"></label>
							<div class="col-sm-10">
								<textarea id="isi" name="isi"></textarea><br><script type="text/javascript">CKEDITOR.replace('isi',{extraPlugins: 'codesnippet',codeSnippet_theme: 'default'});</script>
							</div>
						</div>		
						<button class="btn btn-primary pull-right" type="submit" name="kirim"><span class="glyphicon glyphicon-send"></span> Kirim</button>
					</form>
					<?php 
						if (isset($_POST['kirim'])) {
							$dsn = anti_injection($_POST['dosen']);
							$subjek = anti_injection($_POST['subjek']);
							$isi = anti_injection($_POST['isi']);
							mysql_query("INSERT INTO pesan(pesan_id,pesan_subjek,pesan_isi,dosen_kode,mahasiswa_npm,pesan_lampiran)VALUES('','$subjek','$isi','$dsn','$_SESSION[id]','')");
							header("location:index.php");
						}
					?>
				</div>
	</body>
</html>
<?php
	}
else{
	header("location:../../login");
}
?>