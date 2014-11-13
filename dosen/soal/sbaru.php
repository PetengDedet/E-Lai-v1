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
					  <a href="../bahasan" class="list-group-item active" style="border-left:5px #333 solid;">
					    <h4 class="list-group-item-heading"><span class="glyphicon glyphicon-bullhorn"></span> Bahasan</h4>
					  </a>
					  <a href="../soal" class="list-group-item active">
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
					<form class="form-horizontal" role="form" action="" name="formsoal" method="POST" enctype="multipart/form-data">
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
					  				$qdis = "SELECT * FROM view_distribusi WHERE dosen_kode=$sid AND TAHUNAKADEMIK_STATUS='Aktif' AND SEMESTER_STATUS='Aktif'";
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
					  	<td></td>
					  	<td><label for="mulai" class="control-label">Mulai</label><input type="date" name="mulai" class="form-control"><label for="akhir" name="akhir" class="control-label">Berakhir pada</label><input type="date" class="form-control"></td>
					  </tr>
					  <tr>
					  	<td><label for="password" class="control-label">Password Aktifasi</label></td>
					  	<td><input type="password" name="password" class="form-control"></td>
					  </tr>
					  <tr>
					  	<td colspan="2">
					  	<ul class="nav nav-tabs nav-justified">
					  	<li><a href="#ttt1" data-toggle="tab"><span class="badge">1</span></a></li>
					  	<?php for ($lo=2; $lo <=10 ; $lo++) { 
					  	?>
						  <li><a href="#ttt<?php echo $lo; ?>" data-toggle="tab"><span class="badge"><?php echo $lo; ?></span></a></li>
						<?php } ?>
					  	</ul>
					  	<div class="tab-content">
					  	<div class="tab-pane active" id="ttt1">
						  	<table class="table">
						  		<tr>
						  			<th>Pertanyaan 1</th>
						  			<td><textarea id="pertanyaansatu" name="pertanyaansatu"></textarea><script type="text/javascript">CKEDITOR.replace('pertanyaansatu',{extraPlugins: 'codesnippet',codeSnippet_theme: 'default'});</script></td>
						  		</tr>
						  		<tr>
						  			<th>Kunci</th>
						  			<th>Pilihan</th>
						  		</tr>
						  		<tr>
						  			<td>A <input type="radio" name="kunci1" value="A"></td>
						  			<td><input type="text" name="pila1" class="form-control"></td>
						  		</tr>
						  		<tr>
						  			<td>B <input type="radio" name="kunci1" value="B"></td>
						  			<td><input type="text" name="pilb1" class="form-control"></td>
						  		</tr>
						  		<tr>
						  			<td>C <input type="radio" name="kunci1" value="C"></td>
						  			<td><input type="text" name="pilc1" class="form-control"></td>
						  		</tr>
						  		<tr>
						  			<td>D <input type="radio" name="kunci1" value="D"></td>
						  			<td><input type="text" name="pild1" class="form-control"></td>
						  		</tr>
						  		<tr>
						  			<td>E <input type="radio" name="kunci1" value="E"></td>
						  			<td><input type="text" name="pile1" class="form-control"></td>
						  		</tr>
						  	</table>
						  </div>
						<!-- Tab panes -->
						<?php for ($loo=2; $loo <=10 ; $loo++) { 
									# code...
								?>
						  <div class="tab-pane" id="ttt<?php echo $loo; ?>">
						  	<table class="table">
						  		<tr>
						  			<th>Pertanyaan <?php echo $loo; ?></th>
						  			<td><textarea id="pertanyaan<?php echo $loo; ?>" name="pertanyaan<?php echo $loo; ?>"></textarea><script type="text/javascript"> <?php echo "CKEDITOR.replace('pertanyaan".$loo."',{extraPlugins: 'codesnippet',codeSnippet_theme: 'default'});"; ?></script></td>
						  		</tr>
						  		<tr>
						  			<th>Kunci</th>
						  			<th>Pilihan</th>
						  		</tr>
						  		<tr>
						  			<td>A <input type="radio" name="kunci[<?php echo $loo; ?>]" value="A"></td>
						  			<td><input type="text" name="pila[<?php echo $loo; ?>]" class="form-control"></td>
						  		</tr>
						  		<tr>
						  			<td>B <input type="radio" name="kunci[<?php echo $loo; ?>]" value="B"></td>
						  			<td><input type="text" name="pilb[<?php echo $loo; ?>]" class="form-control"></td>
						  		</tr>
						  		<tr>
						  			<td>C <input type="radio" name="kunci[<?php echo $loo; ?>]" value="C"></td>
						  			<td><input type="text" name="pilc[<?php echo $loo; ?>]" class="form-control"></td>
						  		</tr>
						  		<tr>
						  			<td>D <input type="radio" name="kunci[<?php echo $loo; ?>]" value="D"></td>
						  			<td><input type="text" name="pild[<?php echo $loo; ?>]" class="form-control"></td>
						  		</tr>
						  		<tr>
						  			<td>E <input type="radio" name="kunci[<?php echo $loo; ?>]" value="E"></td>
						  			<td><input type="text" name="pile[<?php echo $loo; ?>]" class="form-control"></td>
						  		</tr>
						  	</table>
						  </div>
						  <?php
						  		}
						  ?>
						</div>  
					  <tr>
					    <td></td>
					    <td>
					      <button type="submit" class="btn btn-large btn-primary pull-right" name="kirim"><span class="glyphicon glyphicon-send"></span> Kirim</button>
					    </td>
					  </tr>
					</table>
					</form>
					<?php
						if (isset($_POST['kirim'])) {
							echo $loo;
							#$judul 		= anti_injection($_POST['judul']);
							#$distribusi = anti_injection($_POST['distribusi']);
							#$solid 		= anti_injection(md5(md5($judul.$distribusi.$_SESSION[id].date(DdFmYhis))));
							#
							#if (empty($judul)) {
							#	echo "<div class='alert alert-warning'>Judul harus terisi</div>";
							#}
							#elseif (empty($distribusi)) {
							#	echo "<div class='alert alert-warning'>Judul harus terisi</div>";
							#}
							#else{
#
							#}
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