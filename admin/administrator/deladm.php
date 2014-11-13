<?php
session_start();
if (!isset($_SESSION['username'])) {
	die(header('location:../../'));
}
$idadm = $_GET['id'];
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
							<h4>Hapus data Administrator</h4>
						</div>
						<?php 
							  include_once"../../fungsi/fungsi.php";
							  sambung2();
							  $ca = mysql_query("SELECT * FROM administrator WHERE administrator_id='$idadm'");
							  $da = mysql_fetch_array($ca);
						 ?>
						 <form action="" method="POST">
						<div class="panel-body">
							<center><img src="<?php echo $da['administrator_gambar']; ?>" width="200" height="200" class="img-thumbnail" margin><br><br></center>
							<table class="table table-hover table-striped table-responsive">
								<thead>
									<tr>
										<th>ID Administrator</th>
										<th>Nama Lengkap</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><?php echo $da['administrator_id']; ?></td>
										<td><?php echo $da['administrator_nama']; ?></td>
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
						$hap 	= unlink($da['administrator_gambar']);
						$del 	= "DELETE FROM administrator WHERE administrator_id=$da[administrator_id]";
						$ekse 	= mysql_query($del);
						if ($ekse && $hap) {
							header('location:../administrator');
						}
						else{
							header('location:../administrator');
							#echo "Terjadi Kesalahan".mysql_error();
						}
					}
					if (isset($_POST['batal'])) {
						header('location:../administrator');
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