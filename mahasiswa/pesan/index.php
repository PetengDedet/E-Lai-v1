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
	<body style="padding-top:85px;text-shadow: 0px 0px 1px #909090 !important;background:#eee;">
<!--DOSEN-->
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
					  <a href="../soal" class="list-group-item">
					    <h4 class="list-group-item-heading"><span class="glyphicon glyphicon-file"></span> Soal</h4>
					  </a>
					  <a href="../nilai" class="list-group-item">
					    <h4 class="list-group-item-heading"><span class="glyphicon glyphicon-list-alt"></span> Nilai</h4>
					  </a>
					</div>
				</div>
				<div class="col-md-9 col-xs-12" style="background:#fff;padding:20px;">
					<legend>Soal</legend>
							<?php
								include '../../fungsi/fungsi.php';
								sambung2();
							?>
					<ol class="breadcrumb">
					  <li><a href="../">Mahasiswa</a></li>
					  <li class="active">Pesan</li>
					</ol>
	<!--MOdal-->				
					<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					  <div class="modal-dialog modal-lg">
					    <div class="modal-content">
					      <div class="modal-header">
      					    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      					    <h4 class="modal-title" id="myModalLabel">Pesan Baru</h4>
      					  </div>
      					  <div class="modal-body">
      					    <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
						<div class="form-group">
  						  <label for="dosen" class="col-sm-2 control-label">Kepada</label>
  						  <div class="col-sm-10">
  						    <select name="dosen" class="form-control input-sm">
								<?php 
									$ruang = $_SESSION['ruang'];
									$caridosen = mysql_query("SELECT * FROM view_distribusi WHERE ruang_id='$ruang'");
									if (mysql_num_rows($caridosen)>0) {
										while ($hdosen = mysql_fetch_array($caridosen)) {?>
											<option value="<?php echo $hdosen['DOSEN_KODE']; ?>"><?php echo $hdosen['DOSEN_NAMA']; ?></option>
								<?php		
										}
									}
								?>
							</select>
  						  </div>
  						</div>
						<div class="form-group">
							<label for="subjek" class="col-sm-2 control-label">Subjek</label>
							<div class="col-sm-10">
								<input type="text" name="subjek" class="form-control input-sm">
							</div>
						</div>
						<div class="form-group">
							<label for="lampiran" class="col-sm-2 control-label">Lampiran (Optional)</label>
							<div class="col-sm-10">
								<input type="file" name="lampiran">
							</div>
						</div>
						<div class="form-group">
							<label for="isi" class="col-sm-2 control-label"></label>
							<div class="col-sm-10">
								<textarea id="isi" name="isi"></textarea><br><script type="text/javascript">CKEDITOR.replace('isi',{extraPlugins: 'codesnippet',codeSnippet_theme: 'default'});</script>
							</div>
						</div>
      					  </div>
      					  <div class="modal-footer">
      					    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      					    <button type="submit" name="kirim" class="btn btn-primary"><span class="glyphicon glyphicon-send"></span> Kirim</button>
      					  </div>
					    </div>
					  </div>
					 </form>
					</div>
	<!--modal-->	<?php 
						if (isset($_POST['kirim'])) {
							$dsn = anti_injection($_POST['dosen']);
							$subjek = anti_injection($_POST['subjek']);
							$isi = anti_injection($_POST['isi']);
							$lampiran 	= $_FILES['lampiran']['tmp_name'];
							$namalampiran = $_FILES['lampiran']['name'];
							$ukuranlampiran = $_FILES['lampiran']['size'];
							$tipelampiran = $_FILES['lampiran']['type'];
							$targetlampiran = "../../lampiran/".$subjek.$_SESSION['id'].$namalampiran;
							if (empty($lampiran)) {
								mysql_query("INSERT INTO pesan(pesan_id,pesan_subjek,pesan_isi,dosen_kode,mahasiswa_npm,pesan_lampiran)VALUES('','$subjek','$isi','$dsn','$_SESSION[id]','')");
								header("location:index.php");
							}
							else{
								move_uploaded_file($lampiran,$targetlampiran);
								mysql_query("INSERT INTO pesan(pesan_id,pesan_subjek,pesan_isi,dosen_kode,mahasiswa_npm,pesan_lampiran)VALUES('','$subjek','$isi','$dsn','$_SESSION[id]','$targetlampiran')");
								header("location:index.php");	
							}
						}
					?>
					<div class="btn-group"><button class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="glyphicon glyphicon-envelope"></span> Pesan Baru</button><a href="cetakpesan.php" class="btn btn-warning"><span class="glyphicon glyphicon-print"></span> Cetak</a></div><br><br>
					<?php 
						#baris per halaman
						$bph = 10;
						#cek $_GET halaman
						if (isset($_GET['hal'])) {
							$halke = $_GET['hal'];
						}
						else{
							$halke=1;
						}
						$offset = ($halke-1)*$bph;
						$sesid = $_SESSION['id'];
						$qtopik = mysql_query("SELECT pesan.*,dosen.dosen_nama FROM pesan LEFT JOIN dosen ON pesan.dosen_kode=dosen.dosen_kode WHERE mahasiswa_npm='$sesid' ORDER BY pesan_tgl_kirim DESC LIMIT $offset,$bph");
						$jtopik = mysql_num_rows($qtopik);
						if ($jtopik>0) {?>
						<table class="table table-striped table-hover">
						<thead>
							<th>No</th>
							<th>Subjek</th>
							<th>Tgl</th>
							<th>Dari</th>
							<th>Isi</th>
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
									<td><?php echo htmlspecialchars_decode(substr($htopik['PESAN_ISI'],0,50)); ?></td>
									<td><a href="pesan.php?id=<?php echo $htopik['PESAN_ID']; ?>"><span class="glyphicon glyphicon-share-alt"></span></a></td>
								</tr>
						<?php
							$no++;		
							}
						}
						else{	?>

							<div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span>Belum Ada Pesan</div>
						<?php 
						}
						$hitungtopik = mysql_query("SELECT COUNT(*) AS jtotaltopik FROM pesan WHERE mahasiswa_npm='$_SESSION[id]'");
						$arhitungtopik = mysql_fetch_array($hitungtopik);
						$ambilkeyarray = $arhitungtopik['jtotaltopik'];
						$jhal = ceil($ambilkeyarray/$bph);?>
						<tr>
							<td colspan="6"><center><ul class="pagination pagination-sm" style="margin:0px;">
							<?php	
								if ($halke>1) {?>
									<li><a href="<?php $_SERVER['PHP_SELF'] ?>?t=<?php echo $topikid;?>&hal=<?php echo ($halke-1); ?>">&laquo;</a></li>
							<?php
								}
								for ($hal=1; $hal <= $jhal ; $hal++) { 
									if ((($hal >= $halke - 3) && ($hal <= $halke + 3)) || ($hal == 1) || ($hal == $jhal)) {
										if (($tamhal == 1) && ($hal != 2))  echo "<li class='disabled'><a href='#'>...</a></li>";
              							if (($tamhal != ($jhal - 1)) && ($hal == $jhal))  echo "<li class='disabled'><a href='#'>...</a></li>";
              							if ($hal == $halke) echo "<li class='active'><a href='#'>".$hal."</a></li>";
              							else echo "<li><a href='".$_SERVER['PHP_SELF']."?t=".$topikid."&hal=".$hal."'>".$hal."</a></li>";
              							$tamhal = $hal;
									}
								}
								if ($halke < $jhal){ echo "<li><a href='".$_SERVER['PHP_SELF']."?t=".$topikid."&hal=".($halke+1)."'>&raquo;</a></li>";}
							?>
							</ul></center></td>
						</tr>
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