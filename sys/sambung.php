<?php 
	ob_start();
	$server = "localhost";
	$database="--";
	$username="root";
	$password="q";
###sambung server
	mysql_pconnect($server,$username,$password) or die(mysql_error()."pastikan sever/username/password telah terisi dengan benar");
###pilih database
	mysql_select_db($database) or die(mysql_error()."pastikan database telah dibuat");
?>