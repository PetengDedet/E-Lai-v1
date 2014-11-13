<?php 
session_start();
if ($_SESSION['level']=="Dosen") {
	$ses = $_SESSION['id'];
	$gid= $_GET['id'];
	include '../../fungsi/fungsi.php';
	sambung2();
	$cekper = mysql_query("SELECT * FROM view_pertanyaan WHERE pertanyaan_id='$gid'");
	$jumper = mysql_num_rows($cekper);
	if ($jumper==1) {
		$arper = mysql_fetch_array($cekper);
		if ($arper['DOSEN_KODE']==$ses) {?>
			<html>
				<head>
					<link rel="stylesheet" type="text/css" href="../../css/lumen.css">
		<script type="text/javascript" src="../../js/jquery-2.0.3.min.js"></script>
		<script type="text/javascript" src="../../ck/ckeditor.js"></script>
				</head>
				<body style="padding-top:70px;">
					<div class="container">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<form action="" method="POST">
								<div class="panel panel-default">
									<div class="panel-heading">
										<?php echo htmlspecialchars_decode($arper['pertanyaan_string']); ?><br>
									</div>
									<div class="panel-body">
										<p>A. <?php echo $arper['pertanyaan_pil_a']; ?></p>
										<p>B. <?php echo $arper['pertanyaan_pil_b']; ?></p>
										<p>C. <?php echo $arper['pertanyaan_pil_c']; ?></p>
										<p>D. <?php echo $arper['pertanyaan_pil_d']; ?></p>
										<p>E. <?php echo $arper['pertanyaan_pil_e']; ?></p>
									</div>
									<div class="panel-footer">
										<p><?php echo $arper['pertanyaan_kunci']; ?></p>
										<p><a href="soal.php?s=<?php echo $arper['soal_id']; ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Batal</a><button class="btn btn-danger pull-right" name="hapus" type="submit"><span class="glyphicon glyphicon-remove"></span> Hapus</button></p>
									</div>
								</div>
							</form>
							<?php

								if (isset($_POST['hapus'])) {
									mysql_query("DELETE FROM pertanyaan WHERE pertanyaan_id='$arper[pertanyaan_id]'");
									header("location:soal.php?s=".$arper['soal_id']);
								}
							 ?>
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