<?php 
	ob_start();
	## Change these four variable value with yours
	$server = "your database host";
	$database="your database name";
	$username="your database username";
	$password="your database password";
###sambung server
	mysql_pconnect($server,$username,$password) or die(mysql_error()."pastikan sever/username/password telah terisi dengan benar");
###pilih database
	mysql_select_db($database) or die(mysql_error()."pastikan database telah dibuat");
?>
