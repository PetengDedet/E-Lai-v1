<?php
##
# File Name : topikbaru.php
# Dir 		: /dosen/bahasan
# Owner 	: Dosen
#
#
#
#
session_start();
if ($_SESSION["level"]== "Dosen") {
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
					  <a href="#" class="list-group-item active" style="border-left:5px #333 solid;">
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
					<legend>Bahasan</legend>
							<?php
								include '../../fungsi/fungsi.php';
								sambung2();
							?>
					<ol class="breadcrumb">
					  <li><a href="../">Dosen</a></li>
					  <li><a href="index.php">Bahasan</a></li>
					  <li class="active">Topik Baru</li>
					</ol>
					<form class="form-horizontal" role="form" action="" name="formtopik" method="POST" enctype="multipart/form-data">
					  <div class="form-group">
					    <label for="judul" class="col-sm-2 control-label">Judul</label>
					    <div class="col-sm-10 col-md-8">
					      <input type="text" class="form-control" id="judul" placeholder="judul.." name="judul">
					    </div>
					  </div>
					  <div class="form-group">
					  	<label for="Ruang" class="col-sm-2 control-label">Distribusi</label>
					  	<div class="col-sm-10 col-md-6">
					  		<select name="distribusi" class="form-control">
					  			<option value=""></option>
					  			<?php 
					  				##Query ruang
					  				$sid = $_SESSION['id'];
					  				$qdis = "SELECT * FROM view_distribusi WHERE dosen_kode=$sid AND SEMESTER_STATUS='Aktif' AND TAHUNAKADEMIK_STATUS='Aktif'";
					  				$edis = mysql_query($qdis);
					  				$jdis = mysql_num_rows($edis);
					  				if ($jdis>0) {
					  					while ($hdis = mysql_fetch_array($edis)) {
					  				?>		
					  					<option value="<?php echo $hdis[distribusi_id]; ?>"><?php echo $hdis['matakuliah_string'];?> | Ruang <?php echo $hdis['ruang_string'];echo " ~> ".$hdis['KAMPUS_STRING']; ?></option>
					  			
					  			<?php		}
					  				}
					  				else {
					  					echo "<option>Maaf, query kosong, atau query bermasalah</option>";
					  				}
					  			?>
					  		</select>
					  	</div>							  
					  </div>
					  <div class="form-group">
					  	<label for="lampiran" class="col-sm-2 control-label">Berkas Lampiran</label>
					  	<div class="col-sm-10 col-md-5">
					  		<input type="file" name="lampiran">
					  	</div>
					  </div>
					  <div class="form-group">
					  	<div class="">	
					  		<textarea id="isitopik" name="isi"></textarea><script type="text/javascript">CKEDITOR.replace('isitopik',{extraPlugins: 'codesnippet',codeSnippet_theme: 'default'});</script>
					  	</div>
					  </div>
					  <br>
					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" class="btn btn-large btn-primary pull-right" name="kirim"><span class="glyphicon glyphicon-send"></span> Kirim</button>
					    </div>
					  </div>
					</form>
					<?php
						if (isset($_POST['kirim'])) {
							$judul 		= anti_injection($_POST['judul']);
							$distribusi = anti_injection($_POST['distribusi']);
							$isi 		= anti_injection($_POST['isi']);
							$lampiran 	= $_FILES['lampiran']['tmp_name'];
							if (empty($lampiran)) {
								if (empty($judul)) {
								echo "<div class='alert alert-warning'>Judul tidak boleh kosong</div>";
								}
								elseif (empty($distribusi)) {
									echo "<div class='alert alert-warning'>Distribusi tidak boleh kosong</div>";
								}
								elseif (empty($isi)) {
									echo "<div class='alert alert-warning'>Isi tidak boleh kosong</div>";
								}
								else{
									mysql_query("INSERT INTO topik(topik_judul,distribusi_id,topik_isi,topik_tgl_kirim)VALUES('$judul','$distribusi','$isi',NOW())") or die(mysql_error());
									header("location:index.php");								
								}
							}
							elseif (empty($judul)) {
								echo "<div class='alert alert-warning'>Judul tidak boleh kosong</div>";
							}
							elseif (empty($distribusi)) {
								echo "<div class='alert alert-warning'>Distribusi tidak boleh kosong</div>";
							}
							elseif (empty($isi)) {
								echo "<div class='alert alert-warning'>Isi tidak boleh kosong</div>";
							}
							else {
									$namalampiran = $_FILES['lampiran']['name'];
									$ukuranlampiran = $_FILES['lampiran']['size'];
									$tipelampiran = $_FILES['lampiran']['type'];
									$targetlampiran = "../../lampiran/".$judul.$distribusi.$namalampiran;
									move_uploaded_file($lampiran,$targetlampiran);
									mysql_query("INSERT INTO topik(topik_judul,distribusi_id,topik_isi,topik_tgl_kirim,topik_lampiran)VALUES('$judul','$distribusi','$isi',NOW(),'$targetlampiran')") or die(mysql_error());
									header("location:index.php");
							}
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