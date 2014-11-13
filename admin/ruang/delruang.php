<?php
session_start();
if (!isset($_SESSION['username'])) {
	die(header('location:../../'));
}
$id = $_GET['id'];
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
							<h4>Hapus data Ruang</h4>
						</div>
						<div class="panel-body">
						<?php 
							  include_once"../../fungsi/fungsi.php";
							  sambung2();
							  $ca = mysql_query("SELECT * FROM view_ruang WHERE ruang_id='$id'");
							  $da = mysql_fetch_array($ca);
						 ?>
						 <form action="" method="POST">
							<table class="table table-hover table-striped table-responsive">
								<tbody>
									<tr>
										<td><b>Kode Ruang</b></td>
										<td><?php echo $da['ruang_id']; ?></td>
									</tr>
									<tr>
										<td><b>Nama Ruang</b></td>
										<td><?php echo $da['ruang_string']; ?></td>
									</tr>
									<tr>
										<td><b>Kode Kampus</b></td>
										<td><?php echo $da['KAMPUS_STRING']; ?></td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="panel-footer">
								<button type="submit" class="btn btn-danger" name="batal"><span class="glyphicon glyphicon-remove"></span> Batal</button> <button type="submit" class="btn btn-success pull-right" name="hapus"><span class="glyphicon glyphicon-ok"></span> Hapus</button>
							</form>
						</div>
					</div>
				</div>
				<?php 
					if (isset($_POST['hapus'])) {
						$del 	= "DELETE FROM ruang WHERE ruang_id='$da[ruang_id]'";
						$ekse 	= mysql_query($del);
						if ($ekse) {
							header('location:../ruang');
						}
						else{
							echo "Terjadi Kesalahan".mysql_error();
						}
					}
					if (isset($_POST['batal'])) {
						header('location:../ruang');
					}
				?>
				<div class="col-md-4"></div>

			<?php }
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