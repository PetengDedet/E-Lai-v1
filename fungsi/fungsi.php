<?php
	function sambung(){
		include"sys/sambung.php";
	};
	function sambung1(){
		include"../sys/sambung.php";
	};
	function sambung2(){
		include"../../sys/sambung.php";
	}
	function sambung3(){
		include"../../../sys/sambung.php";
	}
	function anti_injection($data){
		$filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
		return $filter;
	}
	function tanggalan(){
		$month= date ("m");
		$year=date("Y");
		$day=date("d");
		// t digunakan untuk menghitung jumlah seluruh hari pada bulan ini
		//ini digunakan untuk menampilkan semua tanggal pada bulan ini
		$endDate=date("t",mktime(0,0,0,$month,$day,$year));
		//membuat tebel baris nama-nama hari
		echo '<table align="center" class="table table-stripped">
		  <tr bgcolor="#EFEFEF">
		  <td align=center><font color=red>A</font></td>
		  <td align=center>S</td>
		  <td align=center>S</td>
		  <td align=center>R</td>
		  <td align=center>K</td>
		  <td align=center>J</td>
		  <td align=center>S</td>
		  </tr>';
		//cek tanggal 1 hari sekarang
		$s=date ("w", mktime (0,0,0,$month,1,$year));
		for ($ds=1;$ds<=$s;$ds++) {
		echo "<td style=\"font-family:arial;color:#B3D9FF\" align=center valign=middle bgcolor=\"#FFFFFF\">
		</td>";}
		for ($d=1;$d<=$endDate;$d++) {
		//jika variabel w= 0 disini 0 adalah hari minggu akan membuat baris baru dengan </tr>
		if (date("w",mktime (0,0,0,$month,$d,$year)) == 0) { echo "<tr>"; }
		$fontColor="#000000";
		//menentukan warna pada tanggal hari biasa
		if (date("D",mktime (0,0,0,$month,$d,$year)) == "Sun") { $fontColor="red"; }
		echo "<td style=\"font-family:arial;color:#333333\" align=center valign=middle> <span style=\"color:$fontColor\">$d</span></td>"; 
		//jika variabel w= 6 disini 6 adalah hari sabtu maka akan pindah baris dengan menutup baris </tr>
		if (date("w",mktime (0,0,0,$month,$d,$year)) == 6) { echo "</tr>"; }}
		echo '</table>'; 
	}


?>