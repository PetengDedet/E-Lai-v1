<?php
##
# File Name : soal.php
# Dir 		: /dosen/soal
# Owner 	: Dosen
#
#
#
#
session_start();
#ambil topik_id dari $_GET
$sid = $_GET['s'];
#ambil session id
$sesidd = $_SESSION['id'];
if ($_SESSION["level"]== "Dosen") {
	
	include"../../fungsi/fungsi.php";
	sambung2();
	$cektopik = mysql_query("SELECT * FROM view_soal WHERE soal_id='$sid'");
	$artopik = mysql_fetch_array($cektopik);
	$jtopik = mysql_num_rows($cektopik);
	if ($jtopik < 1) {
		echo "Soal tidak ditemukan <a href='index.php'>Kembali</a>";
	}
	else{
		if ($artopik['DOSEN_KODE']==$sesidd) {?>
			<!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo $_SESSION['level']; ?> | E-learning</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../../css/lumen.css">
		<script type="text/javascript" src="../../js/jquery-2.0.3.min.js"></script>
		<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../../ck/ckeditor.js"></script>

	</head>
	<body style="padding-top:85px;text-shadow: 0px 0px 1px #909090 !important;background:#eee;">
<!--DOSEN-->
		<div class="container">
			<div class="row clearfix">
				<header class="navbar navbar-default navbar-fixed-top bs-docs-nav" role="banner" style="">
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
					      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span><img src="<?php echo $_SESSION['gambar']; ?>" class="img-circle" width="30" height="30"></span> <?php echo $_SESSION['nama']; ?> <b class="caret"></b></a>
					      <ul class="dropdown-menu" style="">
					        <li><a href="../profil"><span class="glyphicon glyphicon-user"></span> - Profil</a></li>
					        <li><a href="../pesan"><span class="glyphicon glyphicon-envelope"></span> - Pesan</a></li>
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
					  <a href="../bahasan" class="list-group-item">
					    <h4 class="list-group-item-heading"><span class="glyphicon glyphicon-bullhorn"></span> Bahasan</h4>
					  </a>
					  <a href="#" class="list-group-item active" style="border-left:5px #333 solid;">
					    <h4 class="list-group-item-heading"><span class="glyphicon glyphicon-file"></span> Soal</h4>
					  </a>
					  <a href="../nilai" class="list-group-item">
					    <h4 class="list-group-item-heading"><span class="glyphicon glyphicon-list-alt"></span> Nilai</h4>
					  </a>
					</div>
				</div>
				<div class="col-md-9 col-xs-12" style="background:#fff;padding:20px;">
					<legend>Soal</legend>
					<ol class="breadcrumb">
					  <li><a href="../">Dosen</a></li>
					  <li><a href="index.php">Soal</a></li>
					  <li class="active"><?php echo $artopik['soal_judul']; ?></li>
					</ol>
						<a href="soalbaru.php" class="btn btn-primary" ><span class="glyphicon glyphicon-pencil"></span> Buat Soal Baru</a><br><br>
							<table class="table table-bordered">
								<th style="color:#fff;" class="info"><center><?php echo $artopik['soal_judul']; ?></center></th>
								<tr>
									<td>
									<table class="table table-striped table-bordered">
										<thead>
											<th>Jenis Soal</th>
											<th>Mata Kuliah</th>
											<th>Ruang</th>
											<th>Kampus</th>
											<th>Aksi</th>
										</thead>
										<tr>
											<td><?php echo $artopik['soal_jenis'] ;?></td>
											<td><?php echo $artopik['matakuliah_string']; ?></td>
											<td><?php echo $artopik['ruang_string']; ?></td>
											<td><?php echo $artopik['KAMPUS_STRING']; ?></td>
											<td><?php if ($artopik['soal_status']=='Tidak Aktif') {?>
															<a class="btn btn-primary btn-sm" href="aktif.php?s=<?php echo $artopik['soal_id']; ?>">Aktifkan</a>
												<?php 
														}
														else{
												?>
															<a href="non.php?s=<?php echo $artopik['soal_id']; ?>" class="btn btn-danger btn-sm">Nonaktifkan</a>
														<?php
															}
														?>
											</td>
										</tr>
									</table>
									<br>
								<?php $qpertanyaan = mysql_query("SELECT * FROM view_pertanyaan WHERE soal_id='$artopik[soal_id]'");
									  $jpertanyaan = mysql_num_rows($qpertanyaan);
									  if ($jpertanyaan>0) {
									  	$no=1;
										while ($dpertanyaan = mysql_fetch_array($qpertanyaan)) {
								 				
								 ?>
									<div class="panel panel-default">
										<div class="panel-heading">
											<?php echo htmlspecialchars_decode($dpertanyaan['pertanyaan_string']); ?><br>
											<a class="btn btn-xs btn-warning" href="editper.php?id=<?php echo $dpertanyaan['pertanyaan_id']; ?>">Edit</a>
											<a class="btn btn-xs btn-danger" href="delper.php?id=<?php echo $dpertanyaan['pertanyaan_id']; ?>">Hapus</a>
										</div>
										<div class="panel-body">
											<p>A. <?php echo $dpertanyaan['pertanyaan_pil_a']; ?></p>
											<p>B. <?php echo $dpertanyaan['pertanyaan_pil_b']; ?></p>
											<p>C. <?php echo $dpertanyaan['pertanyaan_pil_c']; ?></p>
											<p>D. <?php echo $dpertanyaan['pertanyaan_pil_d']; ?></p>
											<p>E. <?php echo $dpertanyaan['pertanyaan_pil_e']; ?></p>
										</div>
										<div class="panel-footer">
											<p><?php echo $dpertanyaan['pertanyaan_kunci']; ?></p>
										</div>
									</div>
								</div>
								<?php
										$no++;
										}
									}
								?>
									</td>
								</tr>

								<!-- Kolom komentar -->
								<tr>
									<form method="POST" action="">
									<td>
										<center>
											<label>
												<h4>Pertanyaan</h4>
											</label><br>
										</center>
										<textarea id="pertanyaan" name="pertanyaan"></textarea>
										<script type="text/javascript">CKEDITOR.replace('pertanyaan',{extraPlugins: 'codesnippet',codeSnippet_theme: 'default'});</script> <br>
										
										<div class="col">
  										  <div class="input-group">
  										    <span class="input-group-addon">
  										      A <input type="radio" name="kunci" value="A">
  										    </span>
  										    <input type="text" class="form-control" name="pila">
  										  </div><!-- /input-group -->
  										</div><!-- /.col-lg-6 --><br>
  										<div class="col">
  										  <div class="input-group">
  										    <span class="input-group-addon">
  										      B <input type="radio" name="kunci" value="B">
  										    </span>
  										    <input type="text" class="form-control" name="pilb">
  										  </div><!-- /input-group -->
  										</div><!-- /.col-lg-6 --><br>
  										<div class="col">
  										  <div class="input-group">
  										    <span class="input-group-addon">
  										      C <input type="radio" name="kunci" value="C">
  										    </span>
  										    <input type="text" class="form-control" name="pilc">
  										  </div><!-- /input-group -->
  										</div><!-- /.col-lg-6 --><br>
  										<div class="col">
  										  <div class="input-group">
  										    <span class="input-group-addon">
  										      D <input type="radio" name="kunci" value="D">
  										    </span>
  										    <input type="text" class="form-control" name="pild">
  										  </div><!-- /input-group -->
  										</div><!-- /.col-lg-6 --><br>
  										<div class="col">
  										  <div class="input-group">
  										    <span class="input-group-addon">
  										      E <input type="radio" name="kunci" value="E">
  										    </span>
  										    <input type="text" class="form-control" name="pile">
  										  </div><!-- /input-group -->
  										</div><!-- /.col-lg-6 -->
									</td>
								</tr>
							</table>
							<button type="submit" class="btn btn-large btn-primary pull-right" name="kirim"><span class="glyphicon glyphicon-send"></span> Kirim</button>
							</form>
							<br>
							<?php

								if (isset($_POST['kirim'])) {
									$pertanyaan = anti_injection($_POST['pertanyaan']);
									$pila 		= anti_injection($_POST['pila']);				
									$pilb 		= anti_injection($_POST['pilb']);				
									$pilc 		= anti_injection($_POST['pilc']);				
									$pild 		= anti_injection($_POST['pild']);				
									$pile 		= anti_injection($_POST['pile']);				
									$kunci 		= anti_injection($_POST['kunci']);													
									if (empty($pertanyaan)) {
										echo "<div class='row'><div class='alert alert-warning'>Pertanyaan tidak boleh kosong</div></div>";
									}
									elseif (empty($pila) || empty($pilb) || empty($pilc) || empty($pild) || empty($pile)) {
										echo "<div class='row'><div class='alert alert-warning'>Semua pilihan harus terisi</div></div>";
									}
									elseif (empty($kunci)) {
										echo "<div class='row'><div class='alert alert-warning'>Pilih kunci jawaban</div></div>";
									}
									else{
										mysql_query("INSERT INTO pertanyaan(pertanyaan_id,pertanyaan_string,pertanyaan_pil_a,pertanyaan_pil_b,pertanyaan_pil_c,pertanyaan_pil_d,pertanyaan_pil_e,pertanyaan_kunci,soal_id)VALUES('','$pertanyaan','$pila','$pilb','$pilc','$pild','$pile','$kunci','$artopik[soal_id]')") or die(mysql_error());
										echo "<meta http-equiv=refresh content=0; URL=".$_SERVER['PHP_SELF'].">";
									}
								}
							 ?>
						<br>
						<br>
					<ol class="breadcrumb">
					  <li><a href="../">Dosen</a></li>
					  <li><a href="index.php">Bahasan</a></li>
					  <li class="active"><?php echo $artopik['topik_judul']; ?></li>
					</ol>
				</div>
	</body>
</html>

<?php
	
		}
		else{
			header("location:index.php");
		}
	}
}
elseif ($_SESSION["level"]=="Mahasiswa") {
	$sesruang = $_SESSION['ruang'];	
	include"../../fungsi/fungsi.php";
	sambung2();
	$cektopik = mysql_query("SELECT * FROM view_soal WHERE soal_id='$sid'");
	$artopik = mysql_fetch_array($cektopik);
	$jtopik = mysql_num_rows($cektopik);
	if ($jtopik < 1) {
		echo "Soal tidak ditemukan <a href='index.php'>Kembali</a>";
	}
	else{
		if ($artopik['ruang_id']==$sesruang) {
			header("location:../../mahasiswa/soal/soal.php?s=$sid");
		}
		else{
			header("location:index.php");
		}
	}
}	
else{
	header("location:../../login");
}
?>