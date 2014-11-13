<?php
##
# File Name : index.php
# Dir 		: /admin/semester
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
					  <a href="#" class="list-group-item active" style="border-left:5px #333 solid;">
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
					  <a href="../nilai" class="list-group-item">
					    <h4 class="list-group-item-heading"><span class="glyphicon glyphicon-list-alt"></span> Nilai</h4>
					  </a>
					</div>
				</div>
				<div class="col-md-9 col-xs-12" style="background:#fff;padding:20px;">
					<legend>Semester</legend>
					<?php
						include '../../fungsi/fungsi.php';
						sambung2();	
					?>
					<center>
						<br>
						<br>
						<form method="POST" action="">
							<input type="hidden">
							<?php 
								$tingak = mysql_query("SELECT * FROM semester WHERE semester_hitungan='Ganjil' AND semester_status='Aktif'");
								if (mysql_num_rows($tingak)>0) {?>
								<div class="form-group">
									<p>
									  <button type="submit" class="btn btn-primary btn-lg" name="genapin"><span class="glyphicon glyphicon-star"></span> Aktifkan Semester Genap</button>
									  <button type="submit" class="btn btn-default btn-lg" disabled="disabled"><span class="glyphicon glyphicon-star"></span> Aktifkan Semester Ganjil</button>
									</p>
							  	</div>
							<?php 
								}
								else{ ?>
								<div class="form-group">
									<p>
									  <button type="submit" class="btn btn-default btn-lg" disabled="disabled"><span class="glyphicon glyphicon-star"></span> Aktifkan Semester Genap</button>
									  <button type="submit" class="btn btn-primary btn-lg" name="ganjilin"><span class="glyphicon glyphicon-star"></span> Aktifkan Semester Ganjil</button>
									</p>
								</div>
							<?php
								}
							?>
						</form>
						<?php
							if (isset($_POST['genapin'])) {
								mysql_query("UPDATE semester SET semester_status='Aktif' WHERE semester_hitungan='Genap'");
								mysql_query("UPDATE semester SET semester_status='Tidak Aktif' WHERE semester_hitungan='Ganjil'");
								echo "<meta http-equiv=refresh content=0;URL=index.php>";
							}
							if (isset($_POST['ganjilin'])) {
								mysql_query("UPDATE semester SET semester_status='Aktif' WHERE semester_hitungan='Ganjil'");								
								mysql_query("UPDATE semester SET semester_status='Tidak Aktif' WHERE semester_hitungan='Genap'");
								echo "<meta http-equiv=refresh content=0;URL=index.php>";
							}
						?>
						<div class="col-md-1"></div>
						<div class="col-md-10">	
							<table class="table table-hover table-responsive" style="align:center;">
								<thead>
									<tr style="background:#eee;text-align:center;">
										<th style="text-align:center;">Semester</th>
										<th style="text-align:center;">Genap/Ganjil</th>
										<th style="text-align:center;">Status</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										$qsemester = mysql_query("SELECT * FROM semester ORDER BY semester_string");
										while ($dsemester = mysql_fetch_array($qsemester)) {?>
										<tr class="<?php if ($dsemester['SEMESTER_STATUS']=='Aktif') {echo 'info';}else{echo 'active';} ?>">
											<td style="text-align:center;"><?php echo $dsemester['SEMESTER_STRING']; ?></td>
											<td style="text-align:center;"><?php echo $dsemester['SEMESTER_HITUNGAN']; ?></td>
											<td style="text-align:center;"><?php echo $dsemester['SEMESTER_STATUS']; ?></td>
										</tr>
									<?php		
										}
									?>
								</tbody>
							</table>
						</div>
						<div class="col-md-1"></div>
					</center>
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