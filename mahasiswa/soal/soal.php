<?php
##
# File Name : soal.php
# Dir 		: /mahasiswa/soal
# Owner 	: Mahasiswa
#
#
#
#
session_start();
#ambil topik_id dari $_GET
$sid = $_GET['s'];
#ambil session id
$sesidd = $_SESSION['ruang'];
if ($_SESSION["level"]== "Mahasiswa") {
	
	include"../../fungsi/fungsi.php";
	sambung2();
	$cektopik = mysql_query("SELECT * FROM view_soal WHERE soal_id='$sid'");
	$artopik = mysql_fetch_array($cektopik);
	$jtopik = mysql_num_rows($cektopik);
	if (($jtopik < 1)||($artopik['soal_status']=='Tidak Aktif')) {
		echo "Soal tidak ditemukan <a href='index.php'>Kembali</a>";
	}
	else{
		if ($artopik['ruang_id']==$sesidd) {?>
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
	<body style="padding-top:20px;padding-bottom:20px;text-shadow: 0px 0px 1px #909090 !important;background:#eee;">
<!--DOSEN-->	
		<div class="container" style="">
			<div class="row">
				<div class="col-md-1"></div>
				<form action="cor.php"  method="POST" name="jawaban">
				<div class="col-md-10" style="background:#fff;padding:20px;">
					<center>
						<img src="../../img/logo-amik.jpg" class="img-rounded" width="120"> <h3>AKADEMI MANAJEMEN INFORMATIKA DAN KOMPUTER IBRAHIMY</h3>
						<h4>Panitia <?php if ($artopik['soal_jenis']=='UTS') { echo "Ujian Tengah Semester";} elseif($artopik['soal_jenis']=='UH'){echo 'Ulangan Harian';}else{echo 'Ujian Akhir Semester';} ?></h4>
						<legend></legend>
					</center>
								<table class="table table-striped table-bordered">
									<thead>
										<th>Jenis Soal</th>
										<th>Mata Kuliah</th>
										<th>Ruang</th>
										<th>Kampus</th>
									</thead>
									<tr>
										<td><?php echo $artopik['soal_jenis'] ;?></td>
										<td><?php echo $artopik['matakuliah_string']; ?></td>
										<td><?php echo $artopik['ruang_string']; ?></td>
										<td><?php echo $artopik['KAMPUS_STRING']; ?></td>
									</tr>
								</table>
								<br>
								<input type="hidden" name="soal_id" value="<?php echo $artopik['soal_id']; ?>">
								<?php $qpertanyaan = mysql_query("SELECT * FROM view_pertanyaan WHERE soal_id='$artopik[soal_id]'");
									  $jpertanyaan = mysql_num_rows($qpertanyaan);
									  if ($jpertanyaan>0) {
									  	$no=1;
										while ($dpertanyaan = mysql_fetch_array($qpertanyaan)) {
								 				
								 ?>
									
									
								<div class="panel-group" id="accordion">
  									<div class="panel panel-default">
  									  <div class="panel-heading" style="background:#fff;">
  									      <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $no;?>">#<?php echo $no; ?> <span class="caret"></span></a>
  									      <P><?php echo htmlspecialchars_decode($dpertanyaan['pertanyaan_string']); ?></P>
  									      <input type="hidden" name="per<?php echo $no; ?>" value="<?php echo $dpertanyaan['pertanyaan_id']; ?>">
  									  </div>
  									  <div id="<?php echo $no; ?>" class="panel-collapse collapse">
  									    <div class="panel-body">
					    					<div class="btn-group-vertical" data-toggle="buttons">
											  <label class="btn btn-default">
											    <input type="radio" name="j['<?php echo $dpertanyaan['pertanyaan_id'];?>']" id="collapseA" value="A"><strong class="pull-left">A.  &nbsp;</strong> <span class="pull-left"><?php echo $dpertanyaan['pertanyaan_pil_a']; ?></span><br>
											  </label>
											  <label class="btn btn-default">
											    <input type="radio" name="j['<?php echo $dpertanyaan['pertanyaan_id'];?>']" id="collapseB" value="B"><strong class="pull-left">B.  &nbsp;</strong> <span class="pull-left"><?php echo $dpertanyaan['pertanyaan_pil_b']; ?></span><br>
											  </label>
											  <label class="btn btn-default">
											    <input type="radio" name="j['<?php echo $dpertanyaan['pertanyaan_id'];?>']" id="collapseC" value="C"><strong class="pull-left">C.  &nbsp;</strong> <span class="pull-left"><?php echo $dpertanyaan['pertanyaan_pil_c']; ?></span><br>
											  </label>
											  <label class="btn btn-default">
											  	<input type="radio" name="j['<?php echo $dpertanyaan['pertanyaan_id'];?>']" id="collapseD" value="D"><strong class="pull-left">D.  &nbsp;</strong> <span class="pull-left"><?php echo $dpertanyaan['pertanyaan_pil_d']; ?></span><br>
											  </label>
											  <label class="btn btn-default">
											  	<input type="radio" name="j['<?php echo $dpertanyaan['pertanyaan_id'];?>']" id="collapseE" value="E"><strong class="pull-left">E.  &nbsp;</strong> <span class="pull-left"><?php echo $dpertanyaan['pertanyaan_pil_e']; ?></span><br>
											  </label>
											</div>
  									    </div>
  									  </div>
  									</div>
								</div>									
								<?php
										$no++;
										}
										$jumlahper = $no-1;
									}
									
								?>
							<input type="hidden" name="jumlahper" value="<?php echo $jumlahper; ?>">
							<button class="btn btn-primary" type="submit" name="kirj"><span class="glyphicon glyphicon-send"></span> Kirim</button>
						</form>
						<br>
						<br>
					<ol class="breadcrumb">
					  <li><a href="../">Mahasiswa</a></li>
					  <li><a href="index.php">Soal</a></li>
					  <li class="active"><?php echo $artopik['topik_judul']; ?></li>
					</ol>
				</div>
				<div class="col-md-1"></div>		
			</div>
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
elseif ($_SESSION["level"]=="Dosen") {
	$sesruang = $_SESSION['id'];	
	include"../../fungsi/fungsi.php";
	sambung2();
	$cektopik = mysql_query("SELECT * FROM view_soal WHERE soal_id='$sid'");
	$artopik = mysql_fetch_array($cektopik);
	$jtopik = mysql_num_rows($cektopik);
	if ($jtopik < 1) {
		echo "Soal tidak ditemukan <a href='index.php'>Kembali</a>";
	}
	else{
		if ($artopik['DOSEN_KODE']==$sesruang) {
			header("location:../../dosen/soal/soal.php?s=$sid");
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