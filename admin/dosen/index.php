<?php
##
# File Name : index.php
# Dir 		: /admin/dosen
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
					  <a href="#" class="list-group-item active" style="border-left:5px #333 solid;">
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
					<legend>Dosen</legend>
					<?php
						include '../../fungsi/fungsi.php';
						sambung2();	
					?>
					<!--TAB HEAD -->
					<ul class="nav nav-pills nav-justified">
						<li class="active"><a href="#tabeldosen" data-toggle="tab">Data Dosen</a></li>
						<li><a href="#inputdosen" data-toggle="tab">Input Dosen</a></li>
					</ul>
					<!--TAB CONTENT -->
					<div class="tab-content">
						<div class="tab-pane active" id="tabeldosen"><br>
							<table class="table table-hover table-striped table-responsive">
								<thead>
									<tr>
										<th>No.</th>
										<th>Kode Dosen</th>
										<th>Nama</th>
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

										$qmhs = "SELECT * FROM dosen ORDER BY dosen_kode DESC LIMIT $offset,$bph";
										$hmhs = mysql_query($qmhs) or die(mysql_error());
										$jmhs = mysql_num_rows($hmhs);
										if ($jmhs>0) {
											$no=1;
											while ($smhs = mysql_fetch_array($hmhs)) {
									?>
											<tr>
												<td><?php echo $no;?></td>
												<td><?php echo $smhs['DOSEN_KODE'];?></td>
												<td><?php echo $smhs['DOSEN_NAMA'];?></td>
												<td><a class="btn btn-danger btn-xs" href="deldosen.php?kd=<?php echo $smhs['DOSEN_KODE'];?>"><span class="glyphicon glyphicon-trash"></span></a> <a class="btn btn-warning btn-xs" href="editdosen.php?kd=<?php echo $smhs['DOSEN_KODE'];?>"><span class="glyphicon glyphicon-edit"></span></a></td>
											</tr>
									<?php
											$no++;
											}
										}
										else{ echo mysql_error();}
									?>
					
								</tbody>
							</table>
							<?php 
								#menghitung jumlah data mahasiswa
								$qdt 	= "SELECT COUNT(*) AS hdt FROM dosen";
								$eqdt 	= mysql_query($qdt);
								$aqdt 	= mysql_fetch_array($eqdt);
								$hsdt 	= $aqdt['hdt'];
								#tentukan jumlah halaman yang perlu dibuat
								$jhal 	= ceil($hsdt/$bph);
							?>	
							<ul class="pagination pull-right">
							<?php
								#buat navigasi
								if ($halno>1) {
							?>
									<li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?hal=<?php echo ($halno-1); ?>"><< Sebelumnya</a></li>
							<?php
								}
								for ($hal=1; $hal <= $jhal ; $hal++) { 
									if ((($hal >= $halno - 3) && ($hal <= $halno + 3)) || ($hal == 1) || ($hal == $jhal)) {
										if (($tamhal == 1) && ($hal != 2))  echo "<li class='disabled'><a href='#'>...</a></li>";
              							if (($tamhal != ($jhal - 1)) && ($hal == $jhal))  echo "<li class='disabled'><a href='#'>...</a></li>";
              							if ($hal == $halno) echo "<li class='active'><a href='#'>".$hal."</a></li>";
              							else echo "<li><a href='".$_SERVER['PHP_SELF']."?hal=".$hal."'>".$hal."</a></li>";
              							$tamhal = $hal;
									}
								}
								if ($halno < $jhal) echo "<li><a href='".$_SERVER['PHP_SELF']."?hal=".($halno+1)."'>Selanjutnya >></a></li>";
							?>
							</ul>
						</div>
					<!-- FORM -->
						<div class="tab-pane" id="inputdosen"><br>
							<form class="form-horizontal" role="form" action="" name="formdsn" method="POST" enctype="multipart/form-data">
							  <div class="form-group has-success">
							    <label for="KODEDOSEN" class="col-sm-2 control-label">Kode Dosen</label>
							    <div class="col-sm-10  col-md-3">
							      <input type="text" class="form-control" id="KODEDOSEN" placeholder="2000041000" name="kodedosen">
							    </div>
							    <span class="help-block">Kode dosen harus berisi angka dan berjumlah 10 digit.</span>
							  </div>
							  <div class="form-group">
							    <label for="Nama" class="col-sm-2 control-label">Nama Lengkap</label>
							    <div class="col-sm-10 col-md-5">
							      <input type="text" class="form-control" id="Nama" placeholder="Nama lengkap beserta gelar" name="nama">
							    </div>
							  </div>
							  <div class="form-group">
							    <label for="Password" class="col-sm-2 control-label">Password</label>
							    <div class="col-sm-10 col-md-5">
							      <input type="password" class="form-control" id="Password" placeholder="Password" name="password">
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
							<?php 
								if (isset($_POST['simpan'])) {
									$kodedosen	 = anti_injection($_POST['kodedosen']);
									$nama 		 = anti_injection($_POST['nama']);
									$password 	 = anti_injection(md5($_POST['password']));
									#jika terisi
									if (empty($kodedosen)) {
										echo "<div class='alert alert-warning'>NPM tidak boleh kosong</div>";
									}
									elseif (!is_numeric($kodedosen)){
										echo "<div class='alert alert-warning'>NPM harus berupa angka</div>";
									}
									elseif (strlen($kodedosen)<> 10) {
										echo "<div class='alert alert-warning'>NPM tidak boleh lebih atau kurang dari 10 digit</div>";
									}
									elseif (empty($nama)) {
										echo "<div class='alert alert-warning'>Nama tidak boleh kosong</div>";
									}
									elseif (empty($password)) {
										echo "<div class='alert alert-warning'>Password tidak boleh kosong</div>";
									}
									elseif (!empty($_FILES['gambar']['tmp_name'])){								
										#code upload
										$lokasigambar 	= $_FILES['gambar']['tmp_name'];
										$namagambar 	= $_FILES['gambar']['name'];
										$tipegambar 	= $_FILES['gambar']['type'];
										$ukurangambar 	= $_FILES['gambar']['size'];
										$targetfile 	= "../../img/dosen/".$kodedosen.".jpg";
										$cnpm = "SELECT dosen_kode FROM dosen WHERE dosen_kode='$kodedosen'";
										$enpm = mysql_query($cnpm);
										$dnpm = mysql_num_rows($enpm);
										if ($dnpm>0) {
											echo "<div class='alert alert-danger'>NPM <b>$kodedosen</b> sudah ada di database</div>";
										}
										else{
										move_uploaded_file($lokasigambar,$targetfile);
										mysql_query("INSERT INTO dosen (dosen_kode,dosen_nama,dosen_password,dosen_gambar) VALUES ('$kodedosen','$nama','$password','$targetfile')");
										echo "<meta http-equiv=refresh content=0;URL=index.php>";
										
										}
									}
									else{
										$cnpm = "SELECT dosen_kode FROM dosen WHERE dosen_kode='$kodedosen'";
										$enpm = mysql_query($cnpm);
										$dnpm = mysql_num_rows($enpm);
										if ($dnpm>0) {
											echo "<div class='alert alert-danger'>NPM <b>$kodedosen</b> sudah ada di database</div>";
										}
										else{
										mysql_query("INSERT INTO dosen (dosen_kode,dosen_nama,dosen_password,dosen_gambar) VALUES ('$kodedosen','$nama','$password','')");
										echo "<meta http-equiv=refresh content=0;URL=index.php>";
										
										}
									}
								}
							?>
					
						</div>
					</div>
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