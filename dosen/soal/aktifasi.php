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
$soalid = $_GET['s'];
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
		<?php 
			include"../../fungsi/fungsi.php";
			sambung2();
			$ambilsoal = mysql_query("SELECT * FROM view_soal WHERE soal_id='$soalid'");
			$ceksoal = mysql_num_rows($ambilsoal);
			if ($ceksoal>0) {
				$cekjumper = mysql_query("SELECT * FROM view_pertanyaan WHERE soal_id='$soalid'");
				$hitungjumper = mysql_num_rows($cekjumper);
				if ($hitungjumper>0) {
					while ($dsoal = mysql_fetch_array($ambilsoal)) {
		?>
		<div class="container">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-defautl">
					<div class="panel-heading">
						<h4>Aktifkan Soal <?php echo $dsoal['soal_judul']; ?></h4>
					</div>
					<div class="panel-body">
					<table class="table">	
						<tr>
						 	<td><label class="control-label">Pilih tipe Pemicu</label></td>
						 	<td>
						 		<div class="input-group">
							      <span class="input-group-addon">
							        <input type="radio"> Password
							      </span>
							      <input type="text" class="form-control">
							    </div><!-- /input-group --><br>
							    <div class="panel panel-default">
						  			<div class="panel-heading"><input type="radio"> <span><strong>Pemicu Waktu</strong></span></div>
						  			<div class="panel-body">
							        	 <div class='input-group date' id='datetimepicker8'>
							        	     <input type='text' class="form-control" />
							        	     <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
							        	     </span>
							        	 </div>
							     		<span>s/d</span>			    
							        	<div class='input-group date' id='datetimepicker9'>
							        	    <input type='text' class="form-control" />
							        	    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
							        	    </span>
							        	</div>						    
							    		<script type="text/javascript">
							    		    $(function () {
							    		        $('#datetimepicker8').datetimepicker();
							    		        $('#datetimepicker9').datetimepicker();
							    		        $("#datetimepicker8").on("dp.change",function (e) {
							    		           $('#datetimepicker9').data("DateTimePicker").setMinDate(e.date);
							    		        });
							    		        $("#datetimepicker9").on("dp.change",function (e) {
							    		           $('#datetimepicker8').data("DateTimePicker").setMaxDate(e.date);
							    		        });
							    		    });
							    		</script>
						  			</div>
						  		</div>
							</td>
						</tr>
					</table>
					</div>
					<div class="panel-footer">
					</div>
				</div>

			</div>
			<div class="col-md-2"></div>

		</div>
		<?php
					}
				}
				else{
					echo "<a href='soal.php?s=".$soalid."'>Masukkan</a> beberapa pertanyaan sebelum mengaktifkan soal ini.";
				}
			}


		?>
	</body>
</html>

<?php
	}
else{
	header("location:../../login");
}
?>