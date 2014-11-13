<?php
session_start();
if (!isset($_SESSION['username'])) {
	die(header('location:../../'));
}
$kode = $_GET['kd'];
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
	<body style="padding-top:70px;text-shadow: 0px 0px 1px #909090 !important;background:#eee;">
		<?php if ($_SESSION["level"] == "Admin"){ ?>
<!--ADMINISTRATOR-->
		<div class="container">
			<div class="row clearfix">
			</div>
		</div>		
		<div class="container" style="">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6 col-xs-12" style="">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4>Sunting Mata Kuliah</h4>
						</div>
						<?php 
							  include_once"../../fungsi/fungsi.php";
							  sambung2();
							  $ca = mysql_query("SELECT * FROM matakuliah WHERE matakuliah_kode='$kode'");
							  $da = mysql_fetch_array($ca);
						 ?>
						 <form action="" method="POST" enctype="multipart/form-data">
						<div class="panel-body">
							<table class="table table-hover table-striped table-responsive">
								<thead>
									<tr>
										<th>KODE</th>
										<th>Nama</th>
										<th>Prodi</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><?php echo $da['MATAKULIAH_KODE']; ?></td>
										<td><?php echo $da['MATAKULIAH_STRING']; ?></td>
										<td><?php $cak = mysql_query("SELECT * FROM konsentrasi WHERE konsentrasi_id=$da[KONSENTRASI_ID]");$dak = mysql_fetch_array($cak);  echo $dak['KONSENTRASI_STRING']; ?></td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="panel-footer">
								<button type="submit" class="btn btn-default" name="batal"><span class="glyphicon glyphicon-remove"></span> Batal</button> <button type="submit" class="btn btn-primary pull-right" name="hapus"><span class="glyphicon glyphicon-check"></span> Hapus</button>
						</form>
						<br><br>
						<?php 
							if (isset($_POST['hapus'])) {
								$del 	= mysql_query("DELETE FROM matakuliah WHERE matakuliah_kode='$da[MATAKULIAH_KODE]'");
								header('location:../matakuliah');
							}
							if (isset($_POST['batal'])) {
								header('location:../matakuliah');
							}
						?>
						</div>
					</div>
				</div>
		
				
				<div class="col-md-3"></div>

			<?php
				if (isset($_POST['batal'])) {
						header('location:../matakuliah');
				}
			}
				elseif ($_SESSION['level']=='Dosen' || $_SESSION['level']== 'Mahasiswa') {
					header('location:../../');
				}
				else{
					header('location:../../');
				exit();
				}
			 ?>
	</body>
</html>