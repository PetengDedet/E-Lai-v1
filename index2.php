<?php
session_start();
if (!isset($_SESSION['username'])) {
	die(header('location:login'));
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo $_SESSION['level']; ?> | E-learning</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/lumen.css">
		<script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>

	</head>
	<body style="padding-top:70px;text-shadow: 0px 0px 1px #909090 !important;">
		<div class="container">
			<div class="row clearfix">
				<div class="col-md-12">
				<header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner" style="">
				  <div class="container">
				    <div class="navbar-header" style="">
				      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
				      	<a href="index.php" class="navbar-brand"><span class="glyphicon glyphicon-home"></span></a>
				    </div>
				    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation" >
				      <ul class="nav navbar-nav navbar-right">  
					    <li class="dropdown">
					      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span><img src="img/p.jpg" class="img-circle" width="30" height="30"></span> <?php echo $_SESSION["nama"]; ?> <b class="caret"></b></a>
					      <ul class="dropdown-menu">
					        <li><a href="#"><span class="glyphicon glyphicon-cog"></span> -Settings</a></li>
					        <li><a href="#"><span class="glyphicon glyphicon-tower"></span> -Admin</a></li>
					        <li><a href="#"><span class="glyphicon glyphicon-info-sign"></span> -Manual</a></li>
					        <li class="divider"></li>
					        <li><a href="logout.php">- Logout <span class="glyphicon glyphicon-log-out"></span></a></li>
					      </ul>
					    </li>
				      </ul>
				    </nav>
				  </div>
				</header>
				</div>
				<div class"row">
					<div class="col-lg-12 col-md-12 col-xs-12">

						<div class="col-md-2 col-xs-12" style="border-right:1px #36c solid;">
						<?php
							echo "username anda : ".$_SESSION['username'];
							echo "<br/>";
							echo "level anda: ".$_SESSION['level'];
							echo "<br/>";
							echo "nama anda: ".$_SESSION['nama'];
						 ?>
						</div>
						<div class="col-md-9 col-xs-12" style="border-right:1px #fc0 solid;">
								akjhdkas
						</div>
					</div>
				</div>
			</div>
		</div>	
	</body>
</html>