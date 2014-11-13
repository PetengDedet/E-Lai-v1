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
							<div class="panel panel-success">
								<div class="panel-heading">
									Edit Pertanyaan
								</div>
								<form name="" action="" method="POST">
								<div class="panel-body">
									<textarea name="perisi" id="perisi"><?php echo $arper['pertanyaan_string']; ?></textarea><script type="text/javascript">CKEDITOR.replace('perisi',{extraPlugins: 'codesnippet',codeSnippet_theme: 'default'});</script>
								<br />
								<table class="table">
									<tr>
										<div class="col">
  										  <div class="input-group">
  										    <span class="input-group-addon">
  										      A <input type="radio" name="kunci" value="A">
  										    </span>
  										    <input type="text" class="form-control" name="pila" value="<?php echo $arper['pertanyaan_pil_a']; ?>">
  										  </div><!-- /input-group -->
  										</div><!-- /.col-lg-6 --><br>
  										<div class="col">
  										  <div class="input-group">
  										    <span class="input-group-addon">
  										      B <input type="radio" name="kunci" value="B">
  										    </span>
  										    <input type="text" class="form-control" name="pilb" value="<?php echo $arper['pertanyaan_pil_b']; ?>">
  										  </div><!-- /input-group -->
  										</div><!-- /.col-lg-6 --><br>
  										<div class="col">
  										  <div class="input-group">
  										    <span class="input-group-addon">
  										      C <input type="radio" name="kunci" value="C">
  										    </span>
  										    <input type="text" class="form-control" name="pilc" value="<?php echo $arper['pertanyaan_pil_c']; ?>">
  										  </div><!-- /input-group -->
  										</div><!-- /.col-lg-6 --><br>
  										<div class="col">
  										  <div class="input-group">
  										    <span class="input-group-addon">
  										      D <input type="radio" name="kunci" value="D">
  										    </span>
  										    <input type="text" class="form-control" name="pild" value="<?php echo $arper['pertanyaan_pil_d']; ?>">
  										  </div><!-- /input-group -->
  										</div><!-- /.col-lg-6 --><br>
  										<div class="col">
  										  <div class="input-group">
  										    <span class="input-group-addon">
  										      E <input type="radio" name="kunci" value="E">
  										    </span>
  										    <input type="text" class="form-control" name="pile" value="<?php echo $arper['pertanyaan_pil_e']; ?>">
  										  </div><!-- /input-group -->
  										</div><!-- /.col-lg-6 -->
									</tr>
								</table>
								</div>
								<div class="panel-footer">
									<a href="soal.php?s=<?php echo $arper['soal_id']; ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Batal</a>
									<button type="submit" class="btn btn-success pull-right" name="simpan"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
								</div>
							</form>
							<?php

								if (isset($_POST['simpan'])) {
									$pertanyaan = anti_injection($_POST['perisi']);
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
										mysql_query("UPDATE pertanyaan SET pertanyaan_string='$pertanyaan',pertanyaan_pil_a='$pila',pertanyaan_pil_b='$pilb',pertanyaan_pil_c='$pilc',pertanyaan_pil_d='$pild',pertanyaan_pil_e='$pile',pertanyaan_kunci='$kunci' WHERE pertanyaan_id='$arper[pertanyaan_id]'") or die(mysql_error());
										header("location:soal.php?s=".$arper['soal_id']);
									}
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