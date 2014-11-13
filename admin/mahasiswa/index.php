<?php
##
# File Name : index.php
# Dir 		: /admin/mahasiswa
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
					  <a href="#" class="list-group-item active" style="border-left:5px #333 solid;">
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
					  <a href="../semester" class="list-group-item">
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
					<legend>Mahasiswa</legend>
					<?php
						include '../../fungsi/fungsi.php';
						sambung2();	
								if (isset($_POST['simpan'])) {
									$npm 		 = anti_injection($_POST['npm']);
									$nama 		 = anti_injection($_POST['nama']);
									$password 	 = anti_injection(md5($_POST['password']));
									$ruang 		 = anti_injection($_POST['ruang']);
									#jika terisi
									if (empty($npm)) {
										echo "<div class='alert alert-warning'>NPM tidak boleh kosong</div>";
									}
									elseif (!is_numeric($npm)){
										echo "<div class='alert alert-warning'>NPM harus berupa angka</div>";
									}
									elseif (strlen($npm)<> 10) {
										echo "<div class='alert alert-warning'>NPM tidak boleh lebih atau kurang dari 10 digit</div>";
									}
									elseif (empty($nama)) {
										echo "<div class='alert alert-warning'>Nama tidak boleh kosong</div>";
									}
									elseif (empty($password)) {
										echo "<div class='alert alert-warning'>Password tidak boleh kosong</div>";
									}
									elseif (empty($ruang)) {
										echo "<div class='alert alert-warning'>Pilih ruang</div>";
									}
									elseif (!empty($_FILES['gambar']['tmp_name'])){								
										#code upload
										$lokasigambar 	= $_FILES['gambar']['tmp_name'];
										$namagambar 	= $_FILES['gambar']['name'];
										$tipegambar 	= $_FILES['gambar']['type'];
										$ukurangambar 	= $_FILES['gambar']['size'];
										$targetfile 	= "../../img/mhs/".$npm.".jpg";
										$cnpm = "SELECT mahasiswa_npm FROM mahasiswa WHERE mahasiswa_npm='$npm'";
										$enpm = mysql_query($cnpm);
										$dnpm = mysql_num_rows($enpm);
										if ($dnpm>0) {
											echo "<div class='alert alert-danger'>NPM <b>$npm</b> sudah ada di database <br />Apakah anda ingin <a href='editmhs.php?npm=$npm' class='alert-link'>menyunting</a>nya?</div>";
										}
										else{
										move_uploaded_file($lokasigambar,$targetfile);
										mysql_query("INSERT INTO mahasiswa (mahasiswa_npm,mahasiswa_nama,mahasiswa_password,ruang_id,mahasiswa_gambar) VALUES ('$npm','$nama','$password','$ruang','$targetfile')");
										echo "<meta http-equiv=refresh content=0;URL=index.php>";
										
										}
									}
									else{
										$cnpm = "SELECT mahasiswa_npm FROM mahasiswa WHERE mahasiswa_npm='$npm'";
										$enpm = mysql_query($cnpm);
										$dnpm = mysql_num_rows($enpm);
										if ($dnpm>0) {
											echo "<div class='alert alert-danger'>NPM <b>$npm</b> sudah ada di database <br />Apakah anda ingin <a href='editmhs.php?npm=$npm' class='alert-link'>menyunting</a>nya?</div>";
										}
										else{
										mysql_query("INSERT INTO mahasiswa (mahasiswa_npm,mahasiswa_nama,mahasiswa_password,ruang_id,mahasiswa_gambar) VALUES ('$npm','$nama','$password','$ruang','')");
										echo "<meta http-equiv=refresh content=0;URL=index.php>";
										
										}
									}
								}
							?>
							<form class="form-horizontal" role="form" action="" name="formmhs" method="POST" enctype="multipart/form-data">
							  <div class="form-group has-success">
							    <label for="NPM" class="col-sm-2 control-label">NPM</label>
							    <div class="col-sm-10  col-md-3">
							      <input type="text" class="form-control" id="NPM" placeholder="2000041000" name="npm">
							    </div>
							    <span class="help-block">NPM harus berisi angka dan berjumlah 10 digit.</span>
							  </div>
							  <div class="form-group">
							    <label for="Nama" class="col-sm-2 control-label">Nama Lengkap</label>
							    <div class="col-sm-10 col-md-5">
							      <input type="text" class="form-control" id="Nama" placeholder="Muhammad Ikhwan Maftuh" name="nama">
							    </div>
							  </div>
							  <div class="form-group">
							    <label for="Password" class="col-sm-2 control-label">Password</label>
							    <div class="col-sm-10 col-md-5">
							      <input type="password" class="form-control" id="Password" placeholder="Password" name="password">
							    </div>
							  </div>
							  <div class="form-group">
							  	<label for="Ruang" class="col-sm-2 control-label">Ruang</label>
							  	<div class="col-sm-10 col-md-5">
							  		<div class="btn-group-vertical" data-toggle="buttons">
							  			<?php 
							  				##Query ruang
							  				$qruang = "SELECT ruang.*,kampus.* FROM ruang LEFT JOIN kampus ON ruang.kampus_kode=kampus.kampus_kode ORDER BY KAMPUS_STRING DESC";
							  				$eruang = mysql_query($qruang);
							  				$jruang = mysql_num_rows($eruang);
							  				if ($jruang>0) {
							  					while ($hruang = mysql_fetch_array($eruang)) {
							  							if($hruang['KAMPUS_KODE']=='SKJ1'){?>
										  					<label class="btn btn-primary">
										  					  <input type="radio" name="ruang" id="option1" value="<?php echo $hruang['RUANG_ID']; ?>"> <?php echo $hruang['RUANG_STRING']." (".$hruang['KAMPUS_STRING'].")"; ?>
										  					</label>
							  			<?php
							  							}
							  							elseif ($hruang['KAMPUS_KODE']=='KOTA') {?>
										  					<label class="btn btn-success">
										  					  <input type="radio" name="ruang" id="option1" value="<?php echo $hruang['RUANG_ID']; ?>"> <?php echo $hruang['RUANG_STRING']." (".$hruang['KAMPUS_STRING'].")"; ?>
										  					</label>
							  			<?php
							  							}
							  							elseif ($hruang['KAMPUS_KODE']=='GNTG') {?>
										  					<label class="btn btn-warning">
										  					  <input type="radio" name="ruang" id="option1" value="<?php echo $hruang['RUANG_ID']; ?>"> <?php echo $hruang['RUANG_STRING']." (".$hruang['KAMPUS_STRING'].")"; ?>
										  					</label>
							  			<?php
							  							}
							  							elseif ($hruang['KAMPUS_KODE']=='BLTK') {?>
										  					<label class="btn btn-danger">
										  					  <input type="radio" name="ruang" id="option1" value="<?php echo $hruang['RUANG_ID']; ?>"> <?php echo $hruang['RUANG_STRING']." (".$hruang['KAMPUS_STRING'].")"; ?>
										  					</label>
							  			<?php
							  							}
							  							else{?>
										  					<label class="btn btn-default">
										  					  <input type="radio" name="ruang" id="option1" value="<?php echo $hruang['RUANG_ID']; ?>"> <?php echo $hruang['RUANG_STRING']." (".$hruang['KAMPUS_STRING'].")"; ?>
										  					</label>
										<?php
							  							}
							  					}
							  				}
							  				else {
							  					echo "<option>Maaf, query kosong, atau query bermasalah</option>";
							  				}
							  			?>
									</div>
							  	</div>							  
							  </div>
							  <div class="form-group">
							  	<label for="Gambar" class="col-sm-2 control-label">Gambar</label>
							  	<div class="col-sm-10 col-md-5">
							  		<input type="file" name="gambar">
							  	</div>
							  </div>
							  <div class="form-group">
							    <div class="col-sm-offset-2 col-sm-10">
							      <button type="submit" class="btn btn-large btn-success" name="simpan"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
							    </div>
							  </div>
							</form>	
								<legend></legend>
							<table class="table table-hover table-striped table-responsive" id="table">
								<thead>
									<tr>
										<th><input type="checkbox" name="semua"></th>
										<th>No.</th>
										<th>NPM</th>
										<th>Nama</th>
										<th>Ruang</th>
										<th>Kampus</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
					
									<?php
										include_once"../../fungsi/fungsi.php";
										sambung2();
										#Baris per halaman
										$bph  = 10;
										#cek get hal
										if (isset($_GET['hal'])) {
											$halno = $_GET['hal'];
										}
										else  {$halno = 1;}
										$offset = ($halno-1)*$bph;

										$qmhs = "SELECT * FROM view_mahasiswa ORDER BY mahasiswa_npm DESC LIMIT $offset,$bph";
										$hmhs = mysql_query($qmhs) or die(mysql_error());
										$jmhs = mysql_num_rows($hmhs);
										if ($jmhs>0) {
											$no=1;
											while ($smhs = mysql_fetch_array($hmhs)) {
									?>
											<tr>
												<td><input type="checkbox" name="<?php echo $smhs['mahasiswa_npm']; ?>"></td>
												<td><?php echo $no;?></td>
												<td><?php echo $smhs['mahasiswa_npm'];?></td>
												<td><?php echo $smhs['mahasiswa_nama'];?></td>
												<td><?php echo $smhs['ruang_string'];?></td>
												<td><?php echo $smhs['KAMPUS_STRING'];?></td>
												<td><a class="btn btn-danger btn-xs" href="delmhs.php?npm=<?php echo $smhs['mahasiswa_npm'];?>"><span class="glyphicon glyphicon-trash"></span></a> <a class="btn btn-warning btn-xs" href="editmhs.php?npm=<?php echo $smhs['mahasiswa_npm'];?>"><span class="glyphicon glyphicon-edit"></span></a></td>
											</tr>
									<?php
											$no++;
											}
										}
										else{ echo mysql_error();}
									?>
					
									<tr><td colspan="7">
							<?php 
								#menghitung jumlah data mahasiswa
								$qdt 	= "SELECT COUNT(*) AS hdt FROM mahasiswa";
								$eqdt 	= mysql_query($qdt);
								$aqdt 	= mysql_fetch_array($eqdt);
								$hsdt 	= $aqdt['hdt'];
								#tentukan jumlah halaman yang perlu dibuat
								$jhal 	= ceil($hsdt/$bph);
							?>	<center>
							<ul class="pagination">
							<?php
								#buat navigasi
								if ($halno>1) {
							?>
									<li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?hal=<?php echo ($halno-1); ?>#table"><< Sebelumnya</a></li>
							<?php
								}
								for ($hal=1; $hal <= $jhal ; $hal++) { 
									if ((($hal >= $halno - 3) && ($hal <= $halno + 3)) || ($hal == 1) || ($hal == $jhal)) {
              							if (($tamhal != ($jhal - 1)) && ($hal == $jhal))  echo "<li class='disabled'><a href='#table'>...</a></li>";
              							if ($hal == $halno) echo "<li class='active'><a href='#table'>".$hal."</a></li>";
              							else echo "<li><a href='".$_SERVER['PHP_SELF']."?hal=".$hal."#table'>".$hal."</a></li>";
              							$tamhal = $halno;
									}
								}
								if ($halno < $jhal) echo "<li><a href='".$_SERVER['PHP_SELF']."?hal=".($halno+1)."#table'>Selanjutnya >></a></li>";
							?>
							</ul>
							<center>
						</td>
						</tr>
						</tbody>
					</table>
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