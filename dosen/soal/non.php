<?php 
session_start();
if ($_SESSION['level']=="Dosen") {
	$ses = $_SESSION['id'];
	$soalid= $_GET['s'];
	include '../../fungsi/fungsi.php';
	sambung2();
	$ceksoal = mysql_query("SELECT * FROM view_soal WHERE soal_id='$soalid'");
	$jumsoal = mysql_num_rows($ceksoal);
	if ($jumsoal==1) {
		$arso = mysql_fetch_array($ceksoal);
		if ($arso['DOSEN_KODE']==$ses) {?>
			<html>
				<head>
					<link rel="stylesheet" type="text/css" href="../../css/lumen.css">
				</head>
				<body>
					<div class="container">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="panel panel-danger">
								<div class="panel-heading">
									Aktifkan soal
								</div>
								<div class="panel-body">
									<table class="tabel table-striped table-condensed">
										<thead>
											<th>Judul</th>
											<th>Mata Kuliah</th>
											<th>Jenis Soal</th>
											<th>Ruang</th>
											<th>Kampus</th>
											<th>Semester</th>
											<th>Tahun Akademik</th>
										</thead>		
										<tr>
											<td><?php echo $arso['soal_judul']; ?></td>
											<td><?php echo $arso['matakuliah_string'];?></td>
											<td><?php echo $arso['soal_jenis']; ?></td>
											<td><?php echo $arso['ruang_string']; ?></td>
											<td><?php echo $arso['KAMPUS_STRING']; ?></td>
											<td><?php echo $arso['SEMESTER_HITUNGAN']; ?></td>
											<td><?php echo $arso['TAHUNAKADEMIK_STRING']; ?></td>
										</tr>
									</table>
								</div>
								<div class="panel-footer">
									<?php 
										$cekjumper = mysql_query("SELECT * FROM view_pertanyaan WHERE soal_id='$arso[soal_id]'");
										$num = mysql_num_rows($cekjumper);
										if ($num>0) {
									?>		
										<form name="ak" action="" method="POST">
										<a class="btn btn-default pull-left" href="soal.php?s=<?php echo $arso['soal_id']; ?>">Batal</a>
										<button type="submit" name="aktif" class="btn btn-success pull-right">Nonaktifkan</button>
									<?php
										}
										else{
											echo "<a href='soal.php?s=".$arso['soal_id']."'>Masukkan</a> beberapa pertanyaan sebelum mengaktifkan soal ini";
										}
									?>
									</form>
									<?php if (isset($_POST['aktif'])) {
										mysql_query("UPDATE soal SET soal_status='Tidak Aktif' WHERE soal_id='$soalid'");
										header("location:soal.php?s=".$soalid);
									} ?>
								</div>
							</div>
						</div>
						<div class="col-md-2"></div>

					</div>
				</body>
			</html>


<?php		}
		else{
			header("location:index.php");
		}
	}
}
else{
	header("location:../../");
}
?>