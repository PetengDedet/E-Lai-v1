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
								<tbody>
									<tr>
										<td>KODE</td>
										<td><input type="text" class="form-control" id="KODE" name="kode" placeholder="<?php echo $da['MATAKULIAH_KODE']; ?>" disabled></td>
									</tr>
									<tr>
										<td>Nama</td>
										<td><input type="text" class="form-control" id="Nama" name="nama" value="<?php echo $da['MATAKULIAH_STRING']; ?>"></td>
									</tr>
									<tr>
										<td>Prodi</td>
										<td>
											<select name="konsentrasi" class="form-control">
							  					<option value=""></option>
							  					<?php 
							  						##Query ruang
							  						$qruang = "SELECT * FROM konsentrasi ORDER BY konsentrasi_id";
							  						$eruang = mysql_query($qruang);
							  						$jruang = mysql_num_rows($eruang);
							  						if ($jruang>0) {
							  							while ($hruang = mysql_fetch_array($eruang)) {
							  						?>		
							  							<option value="<?php echo $hruang[KONSENTRASI_ID]; ?>"><?php echo $hruang['KONSENTRASI_STRING'];?></option>
							  					
							  					<?php		}
							  						}
							  						else {
							  							echo "<option>Maaf, query kosong, atau query bermasalah</option>";
							  						}
							  					?>
							  				</select>
							  			</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="panel-footer">
								<button type="submit" class="btn btn-default" name="batal"><span class="glyphicon glyphicon-remove"></span> Batal</button> <button type="submit" class="btn btn-primary pull-right" name="simpan"><span class="glyphicon glyphicon-check"></span> Simpan</button>
						</form>
						<br><br>
							<?php 
					if (isset($_POST['simpan'])) {
						if (empty($_POST['nama'])) {
							echo "<div class='alert alert-warning'>Nama tidak boleh kosong</div>";
						}
						elseif (empty($_POST['konsentrasi'])) {
							echo "<div class='alert alert-warning'>Pilih Prodi</div>";
						}
						else{
							$nama  = anti_injection($_POST['nama']);
							$konsentrasi = anti_injection($_POST['konsentrasi']);
							mysql_query("UPDATE matakuliah SET matakuliah_string='$nama',konsentrasi_id='$konsentrasi' WHERE matakuliah_kode='$kode'");
							echo "<meta http-equiv=refresh content=0;URL=index.php>";
						}
					
				?>
						</div>
					</div>
				</div>
		
				
				<div class="col-md-3"></div>

			<?php }
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