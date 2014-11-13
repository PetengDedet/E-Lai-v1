<?php
##
# File Name : index.php
# Dir 		: /mahasiswa/soal
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
							<?php
								include '../../fungsi/fungsi.php';
								sambung2();
							?>
					<ol class="breadcrumb">
					  <li><a href="../">Mahasiswa</a></li>
					  <li class="active">Soal</li>
					</ol>
					<br />
					<br />
					<div class="list-group">
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
						$sesid = $_SESSION['ruang'];
						$qtopik = mysql_query("SELECT * FROM view_soal WHERE ruang_id='$sesid' AND SEMESTER_STATUS='Aktif' AND TAHUNAKADEMIK_STATUS='Aktif' AND soal_status='Aktif' AND soal_id NOT IN(SELECT soal_id FROM nilai WHERE mahasiswa_npm='$sesm') LIMIT $offset,$bph");
						$jtopik = mysql_num_rows($qtopik);
						if ($jtopik>0) {
							$no = 1;
							while ($htopik = mysql_fetch_array($qtopik)) {
						?>
								<a class="list-group-item" href="soal.php?s=<?php echo $htopik['soal_id']; ?>">
									<h4><?php  echo $htopik['soal_judul'];?><small> <?php echo $htopik['matakuliah_string']; ?> | <?php echo $htopik['KONSENTRASI_STRING'];?></small></h4>
									<p>
									   <?php echo "Ruang : ".$htopik['ruang_string']." ".$htopik['KAMPUS_STRING'];?>
									</p>
									<p>
										<?php echo "Status : ".$htopik['soal_status']; ?>
									</p>
									<p>
										<?php  echo "Jenis : <b>".$htopik['soal_jenis']."</b>";?>
									</p>
								</a>
						<?php
							$no++;		
							}
						}
						else{	?>

							<div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span> Tidak Ada soal aktif</div>
						<?php 
						}
						$hitungtopik = mysql_query("SELECT COUNT(*) AS jtotaltopik FROM view_soal WHERE dosen_kode='$_SESSION[id]'");
						$arhitungtopik = mysql_fetch_array($hitungtopik);
						$ambilkeyarray = $arhitungtopik['jtotaltopik'];
						$jhal = ceil($ambilkeyarray/$bph);?>
					
					</div>
					<ul class="pagination pull-right">
					<?php	
						if ($halke>1) {?>
							<li><a href="<?php $_SERVER['PHP_SELF'] ?>?hal=<?php echo ($halke-1); ?>"><< Sebelumnya </a></li>
					<?php
						}
						for ($hal=1; $hal <= $jhal ; $hal++) { 
							if ((($hal >= $halke - 3) && ($hal <= $halke + 3)) || ($hal == 1) || ($hal == $jhal)) {
								if (($tamhal == 1) && ($hal != 2))  echo "<li class='disabled'><a href='#'>...</a></li>";
              					if (($tamhal != ($jhal - 1)) && ($hal == $jhal))  echo "<li class='disabled'><a href='#'>...</a></li>";
              					if ($hal == $halke) echo "<li class='active'><a href='#'>".$hal."</a></li>";
              					else echo "<li><a href='".$_SERVER['PHP_SELF']."?hal=".$hal."'>".$hal."</a></li>";
              					$tamhal = $hal;
							}
						}
						if ($halke < $jhal){ echo "<li><a href='".$_SERVER['PHP_SELF']."?hal=".($halke+1)."'>Selanjutnya >></a></li>";}
					?>
					</ul>
				</div>
	</body>
</html>
<?php
	}
else{
	header("location:../../login");
}
?>