<?php
##
# File Name : lnilai.php
# Dir 		: /mahasiswa/nilai
# Owner 	: Mahasiswa
#
#
#
#
session_start();
#ambil topik_id dari $_GET
$sid = $_GET['id'];
#ambil session id
$sesidd = $_SESSION['id'];
if ($_SESSION["level"]== "Mahasiswa") {
	
	include"../../fungsi/fungsi.php";
	sambung2();
	$cektopik = mysql_query("SELECT * FROM view_nilai WHERE soal_id='$sid' AND mahasiswa_npm='$_SESSION[id]'");
	$artopik = mysql_fetch_array($cektopik);
	$jtopik = mysql_num_rows($cektopik);
	if ($jtopik < 1) {
		echo "Soal tidak ditemukan <a href='index.php'>Kembali</a>";
	}
	else{
		if ($artopik['mahasiswa_npm']==$sesidd) {?>
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
	<body style="text-shadow: 0px 0px 1px #909090 !important;background:#eee;" onload="window.print()">
<!--DOSEN-->	
		<div class="container" style="">
			<div class="col-md-1"></div>
			<div class="col-md-10" style="background:#fff;padding-top:20px;">
				<div class="media">
				  <a class="pull-left" href="#">
				    <img class="media-object" src="../../img/logo-amik.jpg" alt="logo" width="120">
				  </a>
				  <div class="media-body" style="padding-top:20px;">
				    <h3 class="media-heading">AKADEMI MANAJEMEN INFORMATIKA DAN KOMPUTER IBRAHIMY (AMIKI)</h3>
				    <h4>Panitia <?php if ($artopik['soal_jenis']=='UTS') { echo "Ujian Tengah Semester";} elseif($artopik['soal_jenis']=='UH'){echo 'Ulangan Harian';}else{echo 'Ujian Akhir Semester';} ?></h4>
				  </div>
				</div>
				<br>
				<legend></legend>
				<div class="panel panel-default" style="border:none;">
					<div class="panel-body">
						<table class="table">
							<thead>
								<th style="text-align:center;">Judul</th>
								<th style="text-align:center;">Mata Kuliah</th>
								<th style="text-align:center;">Konsentrasi</th>
								<th style="text-align:center;">Dosen</th>
								<th style="text-align:center;">Kampus</th>
								<th style="text-align:center;">Ruang</th>
								<th style="text-align:center;">Semester</th>
								<th style="text-align:center;">Tahun Akademik</th>
							</thead>
							<tr>
								<td style="text-align:center;"><?php echo $artopik['soal_judul']; ?></td>
								<td style="text-align:center;"><?php echo $artopik['matakuliah_string']; ?></td>
								<td style="text-align:center;"><?php echo $artopik['KONSENTRASI_STRING']; ?></td>
								<td style="text-align:center;"><?php echo $artopik['DOSEN_NAMA']; ?></td>
								<td style="text-align:center;"><?php echo $artopik['KAMPUS_STRING']; ?></td>
								<td style="text-align:center;"><?php echo $artopik['ruang_string']; ?></td>
								<td style="text-align:center;"><?php echo $artopik['SEMESTER_STRING']; ?></td>
								<td style="text-align:center;"><?php echo $artopik['TAHUNAKADEMIK_STRING']; ?></td>
							</tr>
						</table>
						<?php
							$carinilai = mysql_query("SELECT * FROM view_nilai WHERE soal_id='$sid' AND mahasiswa_npm='$_SESSION[id]'");
							$j = mysql_num_rows($carinilai);
							if ($j>0) {
						?>
						<table class="table table-condensed table-bordered table-hover table-striped">
							<thead>
								<th style="text-align:center;">No</th>
								<th style="text-align:center;">NPM</th>
								<th style="text-align:center;">Nama</th>
								<th style="text-align:center;">Benar</th>
								<th style="text-align:center;">Salah</th>
								<th style="text-align:center;">Kosong</th>
								<th style="text-align:center;">Nilai</th>
							</thead>
							<tbody>
							<?php
								$no=1;
								while ($h = mysql_fetch_array($carinilai)) {?>
										<tr style="text-align:center;">
											<td><?php echo $no; ?></td>
											<td><?php echo $h['mahasiswa_npm']; ?></td>
											<td style="text-align:left;"><?php echo $h['mahasiswa_nama']; ?></td>
											<td><?php echo $h['nilai_benar']; ?></td>
											<td><?php echo $h['nilai_salah']; ?></td>
											<td><?php echo $h['nilai_kosong']; ?></td>
											<td><?php echo $h['nilai_persentase']; ?></td>
										</tr>
							<?php			
								$no++;
								}
							?>
							</tbody>
						</table>
						<br>
						<address class="pull-right">
							<center>
							<p>Dosen Pengampu,</p>
							<br><br>
							<legend><h5><?php echo $artopik['DOSEN_NAMA']; ?></h5></legend>
							</center>
						</address>
							<?php 
								}else{echo "<div class='alert alert-warning'><span class='glyphicon glyphicon-exclamation-sign'></span> Belum ada nilai masuk untuk soal ini.</div>";}
							?>
					</div>
				</div>
			</div>
			<div class="col-md-1" style="padding-left:0px;">
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
			header("location:../../dosen/soal/lnilai.php?id=$sid");
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