<?php
##
# File Name : index.php
# Dir 		: /dosen/nilai
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
					  <a href="../bahasan" class="list-group-item">
					    <h4 class="list-group-item-heading"><span class="glyphicon glyphicon-bullhorn"></span> Bahasan</h4>
					  </a>
					  <a href="../soal" class="list-group-item">
					    <h4 class="list-group-item-heading"><span class="glyphicon glyphicon-file"></span> Soal</h4>
					  </a>
					  <a href="#" class="list-group-item active" style="border-left:5px #333 solid;">
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
					  <li class="active">Nilai</li>
					</ol>
					<form method="GET" class="form-inline" action="<?php echo $_SERVER['PHP_SELF']; ?>">
						<div class="form-group">
							<select name="dist" class="form-control">
								<option></option>
								<?php
									$qn = mysql_query("SELECT * FROM view_distribusi WHERE dosen_kode='$_SESSION[id]' AND semester_status='Aktif' AND tahunakademik_status='Aktif'");
									if (mysql_num_rows($qn)>0) {
										while ($n = mysql_fetch_array($qn)) {?>
												<option value="<?php echo $n['distribusi_id']; ?>"><?php echo $n['matakuliah_string']." Ruang ".$n['ruang_string']." ".$n['KAMPUS_STRING']; ?></option>
								<?php										
										}
									}
									else{?>
											<option>Anda belum mendapat distribusi mengajar</option>
								<?php
									}
								?>
							</select>
							<button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-th-list"></span> Tampilkan</button>
						</div>
					</form>
					<?php
						if (isset($_GET['dist'])) {
							$qnn=mysql_query("SELECT * FROM view_soal WHERE distribusi_id='$_GET[dist]' AND soal_status='Aktif' ORDER BY soal_id");
							if (mysql_num_rows($qnn)>0) {?>
								<br />
								<br />
								<table class="table table-condensed table-hover table-striped">
									<thead>
										<tr>
											<th>No</th>
											<th>Judul</th>
											<th>Jenis</th>
											<th>Mata Kuliah</th>
											<th>Konsentrasi</th>
											<th>Kampus</th>
											<th>Ruang</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
							<?php
								$no=1;
								while ($nn=mysql_fetch_array($qnn)) {?>
							
									<tr>
										<td><?php echo $no; ?></td>
										<td><?php echo $nn['soal_judul'];?></td>
										<td><?php echo $nn['soal_jenis'];?></td>
										<td><?php echo $nn['matakuliah_string'];?></td>
										<td><?php echo $nn['KONSENTRASI_STRING'];?></td>
										<td><?php echo $nn['KAMPUS_STRING'];?></td>
										<td><?php echo $nn['ruang_string'];?></td>
										<td><a href="pnilai.php?id=<?php echo $nn['soal_id']; ?>" class="btn btn-xs btn-default" target="_blank"><span class="glyphicon glyphicon-print"></span></a> <a href="lnilai.php?id=<?php echo $nn['soal_id']; ?>" class="btn btn-xs btn-default" target="_blank"><span class="glyphicon glyphicon-eye-open"></span></a></td>
									</tr>		
							<?php	
									$no++;
								}
							?>
								</tbody>
								</table>
							<?php
							}
							else{
							?>
							<br />
							<br />
							<br />
							<div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span> Belum ada nilai masuk</div>
					<?php		
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