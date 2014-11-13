<?php
session_start();
if (!isset($_SESSION['username'])) {
	die(header('location:../../'));
}
$kd = $_GET['kd'];
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
				<div class="col-md-4"></div>
				<div class="col-md-4 col-xs-12" style="">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4>Edit data Kampus</h4>
						</div>
						<div class="panel-body">
						<?php 
							  include_once"../../fungsi/fungsi.php";
							  sambung2();
							  $ca = mysql_query("SELECT * FROM kampus WHERE kampus_kode='$kd'");
							  $da = mysql_fetch_array($ca);
						 ?>
						 <form action="" method="POST">
							<table class="table table-hover table-striped table-responsive">
								<tbody>
									<tr>
										<td><b>Kode</b></td>
										<td><input type="text" name="kodekampus" value="<?php echo $da['KAMPUS_KODE']; ?>" class="form-control"></td>
									</tr>
									<tr>
										<td><b>Nama</b></td>
										<td><input type="text" name="namakampus" value="<?php echo $da['KAMPUS_STRING']; ?>" class="form-control"></td>
									</tr>
									<tr>
										<td><b>Alamat</b></td>
										<td><textarea row="5" class="form-control" name="alamat"><?php echo $da['KAMPUS_ALAMAT']; ?></textarea></td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="panel-footer">
								<button type="submit" class="btn btn-danger" name="batal"><span class="glyphicon glyphicon-remove"></span> Batal</button> <button type="submit" class="btn btn-success pull-right" name="simpan"><span class="glyphicon glyphicon-ok"></span> Simpan</button>
							</form>
						</div>
					</div>
				</div>
				<?php 
					if (isset($_POST['simpan'])) {

						$kodekampus = anti_injection($_POST['kodekampus']);
						$namakampus = anti_injection($_POST['namakampus']);
						$alamat 	= anti_injection($_POST['alamat']);
						$edit 	= "UPDATE kampus SET kampus_kode='$kodekampus',kampus_string='$namakampus',kampus_alamat='$alamat' WHERE kampus_kode='$da[KAMPUS_KODE]'";
						$ekse 	= mysql_query($edit);
						if ($ekse) {
							header('location:../kampus');
						}
						else{
							echo "Terjadi Kesalahan".mysql_error();
						}
					}
					if (isset($_POST['batal'])) {
						header('location:../kampus');
					}
				?>
				<div class="col-md-4"></div>

			<?php }
				elseif ($_SESSION['level']=='Dosen' || $_SESSION['level']== 'Mahasiswa') {
					header('location:../../');
					exit();
				}
				else{
					header('location:../../');
				exit();
				}
			 ?>
	</body>
</html>