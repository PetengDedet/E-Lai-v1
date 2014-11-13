<?php
##
# File Name : index.php
# Dir 		: /mahasiswa/pesan
# Owner 	: Mahasiswa
#
#
#
#
session_start();
if ($_SESSION["level"]== "Mahasiswa") {
	$sesm = $_SESSION['id'];
?>
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
		<div class="container" style="">
			<div class="row">
				<div class="col-md-1">
					
				</div>
				<div class="col-md-10" style="background:#fff;padding:20px;">
				
				<?php	include"../../fungsi/fungsi.php";
						sambung2();
						$sesid = $_SESSION['id'];
						$qtopik = mysql_query("SELECT pesan.*,dosen.dosen_nama FROM pesan LEFT JOIN dosen ON pesan.dosen_kode=dosen.dosen_kode WHERE mahasiswa_npm='$sesid' ORDER BY pesan_tgl_kirim DESC");
						$jtopik = mysql_num_rows($qtopik);
						if ($jtopik>0) {?>
						<table class="table table-striped table-hover">
						<thead>
							<th>No</th>
							<th>Subjek</th>
							<th>Tgl</th>
							<th>Dari</th>
							<th></th>
						</thead>
						<?php
							$no = 1;
							while ($htopik = mysql_fetch_array($qtopik)) {
						?>
								
								<tr>
									<td><?php echo $no; ?></td>
									<td><a href=""><?php echo $htopik['PESAN_SUBJEK']; ?></a></td>
									<td><?php echo $htopik['PESAN_TGL_KIRIM']; ?></td>
									<td><?php echo $htopik['dosen_nama']; ?></td>
									<td><span class="glyphicon glyphicon-ok"></span></td>
								</tr>
						<?php
							$no++;		
							}
						}
						else{	?>

							<div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span>Belum Ada Pesan</div>
						<?php 
						}?>
					</table>
				</div>
	</body>
</html>
<?php
	}
else{
	header("location:../../login");
}
?>