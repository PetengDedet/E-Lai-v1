<?php
##
# File Name : cor.php
# Dir 		: /mahasiswa/soal
# Owner 	: Mahasiswa
#
#
#
#
session_start();
#error_reporting(+1);
#ambil topik_id dari $_POST
$sid = $_POST['soal_id'];
$jumper = $_POST['jumlahper'];
#ambil session id
$sesidd = $_SESSION['ruang'];
$sesidm = $_SESSION['id'];
if ($_SESSION["level"]=="Mahasiswa") {
	
	include"../../fungsi/fungsi.php";
	sambung2();
	$ceksoal = mysql_query("SELECT * FROM view_soal WHERE soal_id='$sid'");
	$arsoal = mysql_fetch_array($ceksoal);
	$jsoal = mysql_num_rows($ceksoal);
	if (($jsoal < 1)||($arsoal['soal_status']=='Tidak Aktif')) {
		echo "Soal tidak ditemukan <a href='index.php'>Kembali</a>";
	}
	else{
		if ($arsoal['ruang_id']==$sesidd) {?>

		<?php
			$benar =0;
			$salah =0;
			foreach ($_POST['j'] as $key => $value) {
					#mysql_query("INSERT INTO jawaban(jawaban_string,pertanyaan_id,mahasiswa_npm)VALUES($value,$key,$sesidm)")or die(mysql_error());
					$cari = mysql_query("SELECT * FROM view_pertanyaan WHERE pertanyaan_id=$key");
					while ($ar=mysql_fetch_array($cari)) {
							$kunci = $ar['pertanyaan_kunci'];
					}
					if ($value==$kunci) {
					$benar++;
					}
					else{
					$salah++;
				}
			}
			$tidakdijawab = $jumper-$benar-$salah;
			$persen = $benar/$jumper;
			$hasil = ceil($persen*100);
			mysql_query("INSERT INTO nilai(nilai_id,nilai_benar,nilai_salah,nilai_kosong,nilai_persentase,mahasiswa_npm,soal_id)VALUES('','$benar','$salah','$tidakdijawab','$hasil','$_SESSION[id]','$sid')")or die(mysql_error());
			header("location:index.php");
		?>


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
	$ceksoal = mysql_query("SELECT * FROM view_soal WHERE soal_id='$sid'");
	$arsoal = mysql_fetch_array($ceksoal);
	$jsoal = mysql_num_rows($ceksoal);
	if ($jsoal < 1) {
		echo "Soal tidak ditemukan <a href='index.php'>Kembali</a>";
	}
	else{
		if ($arsoal['DOSEN_KODE']==$sesruang) {
			header("location:../../dosen/soal/soal.php?s=$sid");
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
