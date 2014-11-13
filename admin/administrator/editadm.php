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
				<div class="col-md-3"></div>
				<div class="col-md-6 col-xs-12" style="">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4>Sunting data Admin</h4>
						</div>
						<?php 
							  include_once"../../fungsi/fungsi.php";
							  sambung2();
							  $ca = mysql_query("SELECT * FROM administrator WHERE administrator_id='$id'");
							  $da = mysql_fetch_array($ca);
						 ?>
						 <form action="" method="POST" enctype="multipart/form-data">
						<div class="panel-body">
							<center>
								<img src="<?php echo $da['administrator_gambar']; ?>" width="200" height="200" class="img-thumbnail" margin><br>
							</center>
							<table class="table table-hover table-striped table-responsive">
								<tbody>
									<tr>
										<td>Gambar</td>
										<td><input type="file" name="gambar"></td>
									</tr>
									<tr>
										<td>Kode Administrator</td>
										<td><input type="text" class="form-control" id="kodedosen" name="idadmin" placeholder="<?php echo $da['administrator_id']; ?>" disabled></td>
									</tr>
									<tr>
										<td>Nama</td>
										<td><input type="text" class="form-control" id="Nama" name="nama" value="<?php echo $da['administrator_nama']; ?>"></td>
									</tr>
									<tr>
										<td>Passsword</td>
										<td><input type="password" class="form-control" id="Password" placeholder="Password" name="password"></td>
									</tr>	
								</tbody>
							</table>
						</div>
						<div class="panel-footer">
								<button type="submit" class="btn btn-default" name="batal"><span class="glyphicon glyphicon-remove"></span> Batal</button> <button type="submit" class="btn btn-primary pull-right" name="simpan"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
						</form>
						<br><br>
							<?php 
					if (isset($_POST['simpan'])) {
						#jika gambar kosong 
						if (empty($_FILES['gambar']['tmp_name'])) {
							#cek apakah password juga kosong
							if (empty($_POST['password'])) {
								$nama 	= anti_injection($_POST['nama']);
								if (empty($nama)) {
									echo "<div class='alert alert-warning'>Nama tidak boleh kosong</div>";
								}
								else {
									mysql_query("UPDATE administrator SET administrator_nama='$nama' WHERE administrator_id='$id'");
									echo "<meta http-equiv=refresh content=0;URL=index.php>";
								}
							}
							else{
								$nama = anti_injection($_POST['nama']);
								$password = anti_injection(md5($_POST['password']));
								if (empty($nama)) {
									echo "<div class='alert alert-warning'>Nama tidak boleh kosong</div>";
								}
								else {
									mysql_query("UPDATE administrator SET administrator_nama='$nama',administrator_password='$password' WHERE administrator_id='$id'");
									echo "<meta http-equiv=refresh content=0;URL=index.php>";
								}	
							}
						}
					elseif (empty($_POST['password'])) {
							$nama 	= anti_injection($_POST['nama']);
							$lokasigambar = $_FILES['gambar']['tmp_name'];
							$namagambar	  = $_FILES['gambar']['name'];
							$ukurangambar = $_FILES['gambar']['size'];
							$targetfile 	= "../../img/adm/".$id.".jpg";
							if (empty($nama)) {
								echo "<div class='alert alert-warning'>Nama tidak boleh kosong</div>";
							}
							else{
								move_uploaded_file($lokasigambar,$targetfile);
								mysql_query("UPDATE administrator SET administrator_nama='$nama',administrator_gambar='$targetfile' WHERE administrator_id='$id'");
								echo "<meta http-equiv=refresh content=0;URL=index.php>";
							}
					}
					elseif (empty($_POST['nama'])) {
						echo "<div class='alert alert-warning'>Nama tidak boleh kosong</div>";
					}
					else{
						$nama  = anti_injection($_POST['nama']);
						$password = anti_injection(md5($_POST['password']));
						$lokasigambar = $_FILES['gambar']['tmp_name'];
						$namagambar	  = $_FILES['gambar']['name'];
						$ukurangambar = $_FILES['gambar']['size'];
						$targetfile 	= "../../img/adm/".$id.".jpg";
						move_uploaded_file($lokasigambar,$targetfile);
						mysql_query("UPDATE administrator SET administrator_nama='$nama',administrator_gambar='$targetfile',administrator_password='$password' WHERE administrator_id='$id'");
						echo "<meta http-equiv=refresh content=0;URL=index.php>";
					}
					}
					
				?>
						</div>
					</div>
				</div>
		
				
				<div class="col-md-3"></div>

			<?php
			if (isset($_POST['batal'])) {
						header('location:../administrator/');
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