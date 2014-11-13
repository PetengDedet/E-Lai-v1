<?php
##
# File Name : soalbaru.php
# Dir 		: /dosen/soal
# Owner 	: Dosen
#
#
#
#
session_start();
if ($_SESSION["level"]== "Dosen") {
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo $_SESSION['level']; ?> | E-learning</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../../css/lumen.css">
		<link rel="stylesheet" type="text/css" href="../../css/bootstrap-datetimepicker.css">
		<script type="text/javascript" src="../../js/jquery.js"></script>
		<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../../js/moment.js"></script>
		<script type="text/javascript" src="../../js/bootstrap-datetimepicker.js"></script>
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
					  <a href="../soal" class="list-group-item active" style="border-left:5px #333 solid;">
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
					  <li><a href="../">Dosen</a></li>
					  <li><a href="index.php">Soal</a></li>
					  <li class="active">Soal Baru</li>
					</ol>
					<form class="form-horizontal" role="form" action="" name="formsoal" method="POST">
					 <table class="table">
					  <tr>
					    <td>
					    	<label for="judul" class="control-label">Judul Soal</label>
						</td> 
					    <td>
					      <input type="text" class="form-control" id="judul" placeholder="judul.." name="judul">
					    </td>
					  </tr>
					  <tr>
					  	<td>
					  		<label for="distribusi" class="control-label">Distribusi</label>
					  	</td>
					  	<td>
					  		<select name="distribusi" class="form-control">
					  			<option value=""></option>
					  			<?php 
					  				##Query ruang
					  				$sid = $_SESSION['id'];
					  				$qdis = "SELECT * FROM view_distribusi WHERE dosen_kode='$sid' AND TAHUNAKADEMIK_STATUS='Aktif' AND SEMESTER_STATUS='Aktif'";
					  				$edis = mysql_query($qdis);
					  				$jdis = mysql_num_rows($edis);
					  				if ($jdis>0) {
					  					while ($hdis = mysql_fetch_array($edis)) {
					  				?>		
					  					<option value="<?php echo $hdis[distribusi_id]; ?>"><?php echo $hdis['matakuliah_string'];?> | Ruang <?php echo $hdis['ruang_string'];echo " ~> ".$hdis['KAMPUS_STRING']; ?></option>
					  			
					  			<?php		}
					  				}
					  				else {
					  					echo "<option>Maaf, query kosong, atau query bermasalah</option>";
					  				}
					  			?>
					  		</select>
					  	</td>							  
					  </tr>
					   <tr>
					    <td>
					    	<label for="jenis" class="control-label">Jenis Soal</label>
						</td> 
					    <td>
					    	<div class="btn-group" data-toggle="buttons">
							  <label class="btn btn-primary">
							    <input type="radio" name="jenis" id="option1" value="UH"> UH
							  </label>
							  <label class="btn btn-primary">
							    <input type="radio" name="jenis" id="option2" value="UTS"> UTS
							  </label>
							  <label class="btn btn-primary">
							    <input type="radio" name="jenis" id="option3" value="UAS"> UAS
							  </label>
							</div>
					    </td>
					  </tr>
					 <tr>
					 	<td><label for="password" class="control-label">Password Aktifasi</label></td>
					 	<td><input type="text" name="password" class="form-control"></td>
					 </tr>
					 <tr>
					    <td></td>
					    <td>
					      <button type="submit" class="btn btn-large btn-primary pull-right" name="kirim"><span class="glyphicon glyphicon-send"></span> Kirim</button>
					    </td>
					  </tr>
						<?php  function tanggal($yaum){
								$fil = substr($yaum,6,4);
								return $fil;
								}
								$ghghgh = tanggal($_POST['mulai']);
								echo $ghghgh;
						?>
					</table>
					</form>
					<?php
						if (isset($_POST['kirim'])) {
							$judul = anti_injection($_POST['judul']);
							$distribusi = anti_injection($_POST['distribusi']);
							$jenis = anti_injection($_POST['jenis']);
							$password = anti_injection(sha1($_POST['password']));
							if (empty($judul)) {
								echo "<div class='alert alert-warning'>Isikan judul terlebih dahulu</div>";
							}
							elseif (empty($distribusi)) {
								echo "<div class='alert alert-warning'>Pilih distribusi</div>";
							}
							elseif (empty($jenis)) {
								echo "<div class='alert alert-warning'>Pilih jenis ujian</div>";
							}
							elseif (empty($password)) {
								echo "<div class='alert alert-warning'>Password Aktifasi harus terisi</div>";
							}
							else{
								mysql_query("INSERT INTO soal(soal_id,soal_judul,soal_jenis,distribusi_id,soal_password)VALUES('','$judul','$jenis','$distribusi','$password')");
								header("location:index.php");
							}
							
						}

					?>
				</div>
	</body>
</html>

<?php
	}
else{
	header("location:../../login");
}
?>