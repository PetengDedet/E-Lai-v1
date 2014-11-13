<?php
##
# File Name : topik.php
# Dir 		: /mahasiswa/bahasan
# Owner 	: Mahasiswa
#
#
#
#
session_start();
#ambil topik_id dari $_GET
$tid = $_GET['t'];
#ambil session id
$sesidd = $_SESSION['ruang'];
$sesidm = $_SESSION['id'];
if ($_SESSION["level"]== "Mahasiswa") {
	
	include"../../fungsi/fungsi.php";
	sambung2();
	$cektopik = mysql_query("SELECT * FROM view_list_topik WHERE topik_id='$tid'");
	$artopik = mysql_fetch_array($cektopik);
	$jtopik = mysql_num_rows($cektopik);
	if ($jtopik < 1) {
		echo "Topik tidak ditemukan <a href='index.php'>Kembali</a>";
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
				<div class="col-md-1"></div>
				<div class="col-md-10 col-xs-12" style="background:#fff;padding:20px;">
					<legend>Topik</legend>
					<ol class="breadcrumb">
					  <li><a href="../">Mahasiswa</a></li>
					  <li><a href="index.php">Bahasan</a></li>
					  <li class="active"><?php echo $artopik['topik_judul']; ?></li>
					</ol>
							<table class="table table-bordered" style="border:0px;">
								<th style="color:#fff;" class="info" colspan="2"><?php echo $artopik['topik_tgl_kirim']; ?></th>
								<tr>
									<td width="20%" class="active">
											<center>
												<img src="<?php echo $artopik['DOSEN_GAMBAR']; ?>" width="75" />
											</center>
											<br>
											<p>
												<strong><?php echo $artopik['DOSEN_NAMA']; ?></strong>
												<?php echo $artopik['matakuliah_string']; ?><br>
												Ruang : <?php echo $artopik['ruang_string']; ?><br>
												<?php echo $artopik['KAMPUS_STRING'];?>
											</p>
									</td>
									<td width="80%"><?php $qq = $artopik['topik_isi']; echo htmlspecialchars_decode($qq); ?></td>
								</tr>
								<?php if ($artopik['topik_lampiran']<>'') {?>
								<tr class="active">
									<td style="color:#fff;" class="active"></td>
									<td>
										<legend>Lampiran</legend>
										<a href="<?php echo $artopik['topik_lampiran'];?>"><?php echo substr($artopik['topik_lampiran'],15,255);?></a>
										<!--<script type="text/javascript" src="https://apis.google.com/js/platform.js"></script>
										<div class="g-savetodrive"
											 data-src="<?php #echo $artopik['topik_lampiran'];?>"
											 data-filename="<?php #echo substr($artopik['topik_lampiran'],15,255);?>"
											 data-sitename="E-Learning Amiki">
										</div>-->
									</td>
								</tr>
								<?php }?>
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
									$topikid = $artopik['topik_id'];
									$qtopik = mysql_query("SELECT * FROM view_komentar WHERE topik_id='$topikid' ORDER BY komentar_tgl_kirim LIMIT $offset,$bph");
									$jtopik = mysql_num_rows($qtopik);
									if ($jtopik>0) {
										$no = 1;
										while ($htopik = mysql_fetch_array($qtopik)) {
								?>
											<?php 
											if ($htopik['komentar_poster_m']=='') {
												# code...
											?>	
												<tr style="padding:6px;">
													<td id="<?php echo $no; ?>" colspan="2" style="color:#fff;" class="info"><?php echo $htopik['komentar_tgl_kirim']; ?><a class="pull-right" href="#<?php echo $no; ?>" style="color:#fff;">#<?php echo $no; ?></a></td>
												</tr>
												<tr>
													<td width="20%" class="active">
															<center>
																<img src="<?php echo $htopik['DOSEN_GAMBAR']; ?>" width="75" />
															</center>
															<br>
															<p><center><?php echo $htopik['DOSEN_NAMA']; ?></center></p>
													</td>
													<td width="80%" style="padding:20px;"><?php $qk = $htopik['komentar_isi']; echo htmlspecialchars_decode($qk); ?></td>
												</tr>									
												<?php 
												}
												else{ ?>
												<tr style="padding:6px;">
													<td id="<?php echo $no; ?>" colspan="2" style="color:#fff;" class="info"><?php echo $htopik['komentar_tgl_kirim']; ?><a class="pull-right" href="#<?php echo $no; ?>" style="color:#fff;">#<?php echo $no; ?></a></td>
												</tr>
												<tr>
													<td width="20%" class="active">
															<center>
																<img src="<?php echo $htopik[mahasiswa_gambar]; ?>" width="75" />
															</center>
															<br>
															<p><center><?php echo $htopik['mahasiswa_nama']; ?></center></p>
													</td>
													<td width="80%"style="padding:20px;"><?php $qk = $htopik['komentar_isi']; echo htmlspecialchars_decode($qk); ?></td>
												</tr>
								<?php 
												}
												$no++;
										}
									}
									$hitungtopik = mysql_query("SELECT COUNT(*) AS jtotaltopik FROM view_komentar WHERE topik_id='$topikid'");
									$arhitungtopik = mysql_fetch_array($hitungtopik);
									$ambilkeyarray = $arhitungtopik['jtotaltopik'];
									$jhal = ceil($ambilkeyarray/$bph);

									?>
								<center><ul class="pagination pagination-sm" style="margin:0px;">
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
							</ul></center>
							<tr>
							<td colspan="2"><center><ul class="pagination pagination-sm" style="margin:0px;">
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
								<!-- Kolom komentar -->
							</table>	
								<!--<tr>
									<td></td>-->
									<form method="POST" action="">
									<!--<td>--><textarea id="balas" name="balas" class="pull-right"></textarea><script type="text/javascript">CKEDITOR.replace('balas',{extraPlugins: 'codesnippet',codeSnippet_theme: 'default'});</script><legend></legend> <button type="submit" class="btn btn-large btn-primary pull-right" name="kirim"><span class="glyphicon glyphicon-send"></span> Kirim</button><!--</td>-->
									</form>
								<!--</tr>
							</table>-->
							<?php

								if (isset($_POST['kirim'])) {
									$isikomentar = anti_injection($_POST['balas']);
									if (empty($isikomentar)) {
										echo "<div class='row'><div class='alert alert-warning'>Silahkan isi komentar </div></div>";
									}
									else{
										mysql_query("INSERT INTO komentar(komentar_id,komentar_isi,komentar_tgl_kirim,komentar_poster_m,topik_id)VALUES('','$isikomentar',NOW(),'$sesidm','$topikid')") or die(mysql_error());
										mysql_query("UPDATE topik SET topik_update=NOW() WHERE topik_id='$topikid'");
										echo "<meta http-equiv=refresh content=0; URL=topik.php?t=".$topikid."&hal=".$hal.">";
									}
								}
							 ?>
							 <br><br><br>
					<ol class="breadcrumb">
					  <li><a href="../">Mahasiswa</a></li>
					  <li><a href="index.php">Bahasan</a></li>
					  <li class="active"><?php echo $artopik['topik_judul']; ?></li>
					</ol>
					<div class="col-md-1"></div>
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
	$cektopik = mysql_query("SELECT * FROM view_list_topik WHERE topik_id='$tid'");
	$artopik = mysql_fetch_array($cektopik);
	$jtopik = mysql_num_rows($cektopik);
	if ($jtopik < 1) {
		echo "Topik tidak ditemukan <a href='index.php'>Kembali</a>";
	}
	else{
		if ($artopik['DOSEN_KODE']==$sesruang) {
			header("location:../../dosen/bahasan/topik.php?t=$tid");
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