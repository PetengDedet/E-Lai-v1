<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['nama'])){
		header('location:../');
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Login | E-Learning</title>
		<link rel="stylesheet" type="text/css" href="../css/lumen.css">
		<script type="text/javascript" src="../js/jquery-2.0.3.min.js"></script>
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>		
	</head> 
	<body>
		<div class="container">
			<div class="row clearfix">
				<div class="col-md-12 column">
				</div>
			</div>
			<div class="row clearfix" style="padding-top:50px;">
				<div class="col-lg-4 col-md-4 col-sm-4 column">
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 column">
					<div class="panel panel-default" style="-webkit-box-shadow: 2px 2px 7px 0px rgba(50, 50, 50, 0.36);-moz-box-shadow:2px 2px 7px 0px rgba(50, 50, 50,0.36);box-shadow:2px 2px 7px 0px rgba(50, 50, 50, 0.36);">
						<div class="panel-body" style="">
							<CENTER><img src="../img/logo-amik.jpg" class="img-rounded" width="150"></CENTER>
					
							<!--<script type="text/javascript" src="https://apis.google.com/js/platform.js"></script>
							<div class="g-savetodrive"
								 data-src="img/logo-amik.jpg"
								 data-filename="logo-amiki.jpg"
								 data-sitename="E-Learning Amiki">
							</div>-->
							<form role="form" method="POST" action="" style="padding-top:10px;">
								<div class="form-group">
									<input class="form-control" id="exampleInputEmail1" placeholder="Email" name="username" required="required"/>
								</div>
								<div class="form-group">
									<input class="form-control" id="exampleInputPassword1" type="password" placeholder="Password" name="password" required="required" />
								</div>
								<button type="submit" class="btn btn-primary btn-block" name="login"><span class="glyphicon glyphicon-log-in"></span> Login</button>
							</form>
							<br />
						</div>
						<div class="panel-footer">
							<?php
								include_once"../fungsi/fungsi.php";
								sambung1();
								#***************** akhir koneksi ******************#
								#tekan tombol login
								if(isset($_POST['login'])) {
									$username = anti_injection($_POST['username']);
									$password = anti_injection(md5($_POST['password']));
									##KOSONG?? Y!!
									if (!ctype_alnum($username) OR !ctype_alnum($password)){
										#PERINGATAN
										echo "<div class='alert alert-warning'><center>Username dan Password harus terisi :)</center></div>";
									}
									##KOSONG?? T!!
									else {
										#CARI TABEL MAHASISWA
										$kueri 		= mysql_query("SELECT * FROM mahasiswa WHERE mahasiswa_npm='$username' && mahasiswa_password='$password'");
										$hasilkueri = mysql_num_rows($kueri);
										$ar 		= mysql_fetch_array($kueri);
										##KETEMU?? Y!!
										if($hasilkueri > 0) {
											$_SESSION['id']		  = $ar['MAHASISWA_NPM'];
											$_SESSION['gambar']   = $ar['MAHASISWA_GAMBAR'];
											$_SESSION['username'] = $ar['MAHASISWA_NPM'];
											$_SESSION['level']    = 'Mahasiswa';
											$_SESSION['nama']	  = $ar['MAHASISWA_NAMA'];
											$_SESSION['ruang']	  = $ar['RUANG_ID'];
											header('location:../mahasiswa');
										}
										##KETEMU?? T!!
										else{
											#CARI DI TABEL DOSEN
											$kuerid 	 = mysql_query("SELECT * FROM dosen WHERE dosen_kode='$username' && dosen_password='$password'");
											$hasilkuerid = mysql_num_rows($kuerid);
											$ard 		 = mysql_fetch_array($kuerid);
											##KETEMU?? Y!!
											if ($hasilkuerid > 0) {
												$_SESSION['id']		  = $ard['DOSEN_KODE'];
												$_SESSION['gambar']   = $ard['DOSEN_GAMBAR'];
												$_SESSION['username'] = $ard['DOSEN_KODE'];
												$_SESSION['level']	  = 'Dosen';
												$_SESSION['nama']     = $ard['DOSEN_NAMA'];
												header('location:../dosen');
											}
											##KETEMU?? T!!
											else{
												#CARI DI TABEL ADMINISTRATOR
												 $kueria 	 = mysql_query("SELECT * FROM administrator WHERE administrator_id='$username' && administrator_password='$password'");
												 $hasilkueria = mysql_num_rows($kueria);
												 $ara 		 = mysql_fetch_array($kueria);
												 ##KETEMU?? Y!!
												 if ($hasilkueria > 0) {
													$_SESSION['id']		  = $ara['administrator_id'];
													$_SESSION['gambar']	  = $ara['administrator_gambar'];
												 	$_SESSION['username'] = $ara['administrator_id'];
												 	$_SESSION['level']	  = 'Admin';
												 	$_SESSION['nama']     = $ara['administrator_nama'];
												 	header('location:../admin');
												 }
												 ##KETEMU?? T!!
												 else{ 
												 	echo"<div class='alert alert-danger'><center>Username atau Password salah</center></div>";
												 }
											}											
										}
									}
								}
							?>
						</div>					
					</div>
				</div>
				<div class="col-md-4 column">
				</div>					
			</div>
		</div>	
	</body>
</html>


