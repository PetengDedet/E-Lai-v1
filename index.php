<?php
session_start();
if (!isset($_SESSION['username'])) {
	die(header('location:login'));
}
if ($_SESSION["level"]== "Admin") {
	header("location:admin");
}
elseif ($_SESSION["level"]== "Dosen") {
	header("location:dosen");
}
elseif ($_SESSION["level"] == "Mahasiswa") {
	header("location:mahasiswa");
}
else{
	header("location:login");
}
?>
