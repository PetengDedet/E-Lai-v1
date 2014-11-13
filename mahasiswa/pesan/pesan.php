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
					<legend>Pesan</legend>
							<?php
								include '../../fungsi/fungsi.php';
								sambung2();
							?>
					<ol class="breadcrumb">
					  <li><a href="../">Mahasiswa</a></li>
					  <li><a href="index.php">Pesan</a></li>
					  <li class="active">Inbox</li>
					</ol>
					<?php 
						$pesanid = $_GET['id'];
						$ambilpesan = mysql_query("SELECT pesan.*,dosen.dosen_nama FROM pesan LEFT JOIN dosen ON pesan.dosen_kode=dosen.dosen_kode WHERE pesan_id=$pesanid");
						if (mysql_num_rows($ambilpesan)>0) {
							$hpesan = mysql_fetch_array($ambilpesan);?>
							<div class="panel panel-default">
								<div class="panel-body">
								<form class="form-horizontal" method="POST" action="" role="form">
								 	<div class="col-sm-6">	
								 		<table class="table">
								 			<tr>
								 				<td><strong>Dari</strong></td>
								 				<td><?php echo $hpesan['DOSEN_KODE']; ?></td>
								 			</tr>
								 			<tr>
								 				<td><strong>Subjek</strong></td>
								 				<td><?php echo $hpesan['PESAN_SUBJEK']; ?></td>
								 			</tr>
								 			<tr>
								 				<td><strong>Waktu</strong></td>
								 				<td><?php echo $hpesan['PESAN_TGL_KIRIM']; ?></td>
								 			</tr>
								 			<?php if (($hpesan['PESAN_LAMPIRAN']<>'') || ($hpesan['PESAN_LAMPIRAN']<>'NULL')) {?>
								 			<tr>
								 				<td>Lampiran</td>
								 				<td>
								 					<a href="<?php echo $hpesan['PESAN_LAMPIRAN'];?>"><?php echo substr($hpesan['PESAN_LAMPIRAN'],15,255);?></a>
													<script type="text/javascript" src="https://apis.google.com/js/platform.js"></script>
													<div class="g-savetodrive"
														 data-src="<?php echo $hpesan['PESAN_LAMPIRAN'];?>"
														 data-filename="<?php echo substr($hpesan['PESAN_LAMPIRAN'],15,255);?>"
														 data-sitename="E-Learning Amiki">
													</div>
								 				</td>
								 			</tr>
								 			<?php }?>
								 		</table>
								 	</div>
								 	<div class="col-md-10">
								 		<tablec class="table">
								 			<tr>
								 				<td><blockquote><p><?php echo htmlspecialchars_decode($hpesan['PESAN_ISI']); ?></p></blockquote></td>
								 			</tr>
								 		</table>
								 	</div>
								</div>
								<div class="panel-footer">
									<textarea id="balas" name="balas"></textarea><script type="text/javascript">CKEDITOR.replace('balas',{extraPlugins: 'codesnippet',codeSnippet_theme: 'default'});</script>
								</div>
							</div>
							<button type="submit" class="btn btn-large btn-primary pull-right" name="kirim"><span class="glyphicon glyphicon-send"></span> Kirim</button>
							</form>
							<?php 
								if (isset($_POST['kirim'])) {
									$subj = $hpesan['PESAN_SUBJEK'];
									$mhs = $_SESSION['id'];
									$isi = anti_injection($_POST['balas']);
									mysql_query("INSERT INTO pesan(pesan_id,pesan_subjek,pesan_isi,pesan_lampiran,mahasiswa_npm,dosen_kode)VALUES('','$subj','$isi','','$mhs','$hpesan[DOSEN_KODE]')");
									header("location:index.php");
								}
							?>
					<?php		
						}
						else{
							echo "<div class='alert alert-success'><span class='glyphicon glyphicon-ok'></span> Tidak ada pesan</div>";
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