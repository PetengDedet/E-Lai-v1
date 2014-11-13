<?php
##
# File Name : index.php
# Dir 		: /admin/matakuliah
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
					  <a href="../semester" class="list-group-item">
					    <h4 class="list-group-item-heading"><span class="glyphicon glyphicon-folder-close"></span> Semester</h4>
					  </a>
					  <a href="../tahunakademik" class="list-group-item">
					    <h4 class="list-group-item-heading"><span class="glyphicon glyphicon-calendar"></span> Tahun Akademik</h4>
					  </a>
					  <a href="#" class="list-group-item active" style="border-left:5px #333 solid;">
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
					<legend>Mata Kuliah</legend>
					<?php
						include '../../fungsi/fungsi.php';
						sambung2();	
					?>
					<!--TAB HEAD -->
					<ul class="nav nav-pills nav-justified">
						<li class="active"><a href="#distribusi" data-toggle="tab">Distribusi Mata Kuliah</a></li>
						<li><a href="#tabelmk" data-toggle="tab">Data Mata Kuliah</a></li>
						<li><a href="#inputmk" data-toggle="tab">Input Mata Kuliah</a></li>
					</ul>
					<!--TAB CONTENT -->
					<div class="tab-content">
						<div class="tab-pane active" id="distribusi">
	<!--DISTRIBUSI -->		<br><br>
							<form class="form-horizontal" role="form" action="" name="formdis" method="POST">
								<div class="form-group">
									<label for="disru" class="col-sm-2 control-label">Ruang</label>
									<div class="col-sm-10 col-md-5">
										<select name="disru" class="form-control">
											<option value=""></option>
											<?php
												$ambilru = mysql_query("SELECT ruang.*,kampus.* FROM ruang LEFT JOIN kampus ON ruang.kampus_kode=kampus.kampus_kode ORDER BY kampus_string");
												while ($dapatru = mysql_fetch_array($ambilru)) {?>
													<option value="<?php echo $dapatru['RUANG_ID']; ?>"><?php echo $dapatru['RUANG_STRING']; ?>(<?php echo $dapatru['KAMPUS_STRING'];?>)</option>
											<?php		
												}
											?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="dismk" class="col-sm-2 control-label">Mata Kuliah</label>
									<div class="col-sm-10 col-md-5">
										<select name="dismk" class="form-control">
											<option value=""></option>
											<?php
												$ambilmk = mysql_query("SELECT * FROM matakuliah ORDER BY matakuliah_string");
												while ($dapatmk = mysql_fetch_array($ambilmk)) {?>
													<option value="<?php echo $dapatmk['MATAKULIAH_KODE']; ?>"><?php echo $dapatmk['MATAKULIAH_STRING']; ?></option>
											<?php		
												}
											?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="disdsn" class="col-sm-2 control-label">Dosen</label>
									<div class="col-sm-10 col-md-5">
										<select name="disdsn" class="form-control">
											<option value=""></option>
											<?php
												$ambildsn = mysql_query("SELECT * FROM dosen ORDER BY dosen_nama");
												while ($dapatdsn = mysql_fetch_array($ambildsn)) {?>
													<option value="<?php echo $dapatdsn['DOSEN_KODE']; ?>"><?php echo $dapatdsn['DOSEN_NAMA']; ?></option>
											<?php		
												}
											?>
										</select>
									</div>
								</div>								
								<div class="form-group">
									<label for="dissem" class="col-sm-2 control-label">Semester</label>
									<div class="col-sm-10 col-md-5">
										<select name="dissem" class="form-control">
											<option value=""></option>
											<?php
												$ambilsem = mysql_query("SELECT * FROM semester ORDER BY semester_string");
												while ($dapatsem = mysql_fetch_array($ambilsem)) {?>
													<option value="<?php echo $dapatsem['SEMESTER_ID']; ?>"><?php echo $dapatsem['SEMESTER_STRING']; ?></option>
											<?php		
												}
											?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="disth" class="col-sm-2 control-label">Tahun Akademik</label>
									<div class="col-sm-10 col-md-5">
										<select name="disth" class="form-control">
											<option value=""></option>
											<?php
												$ambilth = mysql_query("SELECT * FROM tahunakademik ORDER BY tahunakademik_id");
												while ($dapatth = mysql_fetch_array($ambilth)) {?>
													<option value="<?php echo $dapatth['TAHUNAKADEMIK_ID']; ?>"><?php echo $dapatth['TAHUNAKADEMIK_STRING']; ?></option>
											<?php		
												}
											?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-10 col-md-5">
										<button type="submit" name="dissim" class="btn btn-lg btn-default pull-right"><span class="glyphicon glyphicon-credit-card"></span> Distribusikan</button>
									</div>
								</div>
							</form>
							<?php
								if (isset($_POST['dissim'])) {
									$disru  = anti_injection($_POST['disru']);
									$dismk  = anti_injection($_POST['dismk']);
									$disdsn = anti_injection($_POST['disdsn']);
									$dissem = anti_injection($_POST['dissem']);
									$disth  = anti_injection($_POST['disth']);
									$disar  = array($disru => 1,$dismk => 2,$dissem => 3,$disth => 4,$disdsn => 5);
									if (!empty($disar[''])) {
										echo "<div class='alert alert-warning'>Semua pilihan harus terisi</div>";
									}
									else{
										$discek = mysql_query("SELECT * FROM distribusi WHERE ruang_id='$disru' AND matakuliah_kode='$dismk'");
										$dislih = mysql_num_rows($discek);
										if ($dislih > 0) {
											echo "<div class='alert alert-warning'>Mata Kuliah $dismk Sudah ada di ruang $disru </div>";
										}
										else{
											mysql_query("INSERT INTO distribusi(ruang_id,semester_id,tahunakademik_id,dosen_kode,matakuliah_kode) VALUES('$disru','$dissem','$disth','$disdsn','$dismk')");
										}
									}
								}
							?>
						</div>
						<div class="tab-pane" id="tabelmk"><br>
							<table class="table table-hover table-striped table-responsive">
								<thead>
									<tr>
										<th>No.</th>
										<th>Kode</th>
										<th>Mata Kuliah</th>
										<th>Konsentrasi</th>
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

										$qmhs = "SELECT matakuliah.*,konsentrasi.* FROM matakuliah LEFT JOIN konsentrasi ON matakuliah.konsentrasi_id=konsentrasi.konsentrasi_id ORDER BY konsentrasi_string DESC LIMIT $offset,$bph";
										$hmhs = mysql_query($qmhs) or die(mysql_error());
										$jmhs = mysql_num_rows($hmhs);
										if ($jmhs>0) {
											$no=1;
											while ($smhs = mysql_fetch_array($hmhs)) {
									?>
											<tr>
												<td><?php echo $no;?></td>
												<td><?php echo $smhs['MATAKULIAH_KODE'];?></td>
												<td><?php echo $smhs['MATAKULIAH_STRING'];?></td>
												<td><?php echo $smhs['KONSENTRASI_STRING'];?></td>
												<td><a class="btn btn-danger btn-xs" href="delmk.php?kd=<?php echo $smhs['MATAKULIAH_KODE'];?>"><span class="glyphicon glyphicon-trash"></span></a> <a class="btn btn-warning btn-xs" href="editmk.php?kd=<?php echo $smhs['MATAKULIAH_KODE'];?>"><span class="glyphicon glyphicon-edit"></span></a></td>
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
								$qdt 	= "SELECT COUNT(*) AS hdt FROM matakuliah";
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
						<div class="tab-pane" id="inputmk"><br>
							<form class="form-horizontal" role="form" action="" name="formk" method="POST" enctype="multipart/form-data">
							  <div class="form-group has-success">
							    <label for="KODE" class="col-sm-2 control-label">Kode MK</label>
							    <div class="col-sm-10  col-md-3">
							      <input type="text" class="form-control" id="KODE" placeholder="MP01" name="kode">
							    </div>
							    <span class="help-block">Kode Mata Kuliah harus terisi dan berjumlah 4 digit.</span>
							  </div>
							  <div class="form-group">
							    <label for="Nama" class="col-sm-2 control-label">Nama Mata Kuliah</label>
							    <div class="col-sm-10 col-md-5">
							      <input type="text" class="form-control" id="Nama" placeholder="" name="nama">
							    </div>
							  </div>
							  <div class="form-group">
							  	<label for="Konsentrasi" class="col-sm-2 control-label">Konsentrasi</label>
							  	<div class="col-sm-10 col-md-5">
							  		<select name="konsentrasi" class="form-control">
							  			<option value=""></option>
							  			<?php 
							  				##Query ruang
							  				$qruang = "SELECT * FROM konsentrasi ORDER BY konsentrasi_string";
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
									$kode 		 = anti_injection($_POST['kode']);
									$nama 		 = anti_injection($_POST['nama']);
									$konsentrasi 		 = anti_injection($_POST['konsentrasi']);
									#jika terisi
									if (empty($kode)) {
										echo "<div class='alert alert-warning'>Kode Mata Kuliah tidak boleh kosong</div>";
									}
									elseif (strlen($kode)<> 4) {
										echo "<div class='alert alert-warning'>Kode Mata Kuliah tidak boleh lebih atau kurang dari 4 digit</div>";
									}
									elseif (empty($nama)) {
										echo "<div class='alert alert-warning'>Nama tidak boleh kosong</div>";
									}
									elseif (empty($konsentrasi)) {
										echo "<div class='alert alert-warning'>Pilih Konsentrasi</div>";
									}
									else{
										$cnpm = "SELECT matakuliah_kode FROM matakuliah WHERE matakuliah_kode='$kode'";
										$enpm = mysql_query($cnpm);
										$dnpm = mysql_num_rows($enpm);
										if ($dnpm>0) {
											echo "<div class='alert alert-danger'>Kode Mata Kuliah <b>$kode</b> sudah ada di database <br />Apakah anda ingin <a href='editmk.php?kd=$kode' class='alert-link'>menyunting</a>nya?</div>";
										}
										else{
										mysql_query("INSERT INTO matakuliah (matakuliah_kode,matakuliah_string,konsentrasi_id) VALUES ('$kode','$nama','$konsentrasi')");
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