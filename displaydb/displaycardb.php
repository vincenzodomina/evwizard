<!-- tbd scheiß auf mootools: https://datatables.net/ -->

<!doctype html>
<html lang="en">
<head><title>EV Wizard - Cars</title><meta charset="utf-8"/>
	<!-- Bootstrap CDN - Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/main.css">
	<script src="MooTools-Core-1.6.0.js"></script>
	<script src="MooTools-More-1.6.0.js"></script>
	<script src="mootools_htmltable.js"></script>
</head>
<body>
	<!--  Input im display db Bereich  tbd funktioniert noch nicht mit mootools
<div>
	<table id="id_inputcardb" class="table table-condensed" style="font-size: 11px;">
			<tr>																								                                            
      <td><input id="id_automake"     	 name="automake"     		type="text" value="" style="width:20px;"/></td>
      <td><input id="id_automodel" 			 name="automodel" 			type="text" value="" style="width:20px;"/></td>
		  <td><input id="id_autoyear" 			 name="autoyear" 				type="text" value="" style="width:20px;"/></td>
		  <td><input id="id_autoweight" 		 name="autoweight" 			type="text" value="" style="width:20px;"/></td>
      <td><input id="id_autocd" 				 name="autocd" 					type="text" value="" style="width:20px;"/></td>
      <td><input id="id_autofrontalarea" name="autofrontalarea"	type="text" value="" style="width:20px;"/></td>
      <td><input id="id_autocda" 				 name="autocda" 				type="text" value="" style="width:20px;"/></td>
      <td><input id="id_autogear1" 			 name="autogear1" 			type="text" value="" style="width:20px;"/></td>     
      <td><input id="id_autogear2" 			 name="autogear2" 			type="text" value="" style="width:20px;"/></td>     
      <td><input id="id_autogear3" 			 name="autogear3" 			type="text" value="" style="width:20px;"/></td>     
      <td><input id="id_autogear4" 			 name="autogear4" 			type="text" value="" style="width:20px;"/></td>     
      <td><input id="id_autogear5" 			 name="autogear5" 			type="text" value="" style="width:20px;"/></td>     
      <td><input id="id_autogear6" 			 name="autogear6" 			type="text" value="" style="width:20px;"/></td>
      <td><input id="id_autogearfinal" 	 name="autogearfinal" 	type="text" value="" style="width:20px;"/></td>
      <td><input id="id_autodrive" 			 name="autodrive" 			type="text" value="" style="width:20px;"/></td>
      <td><input id="id_autotirewidth" 	 name="autotirewidth" 	type="text" value="" style="width:20px;"/></td>
      <td><input id="id_autotireheight"  name="autotireheight" 	type="text" value="" style="width:20px;"/></td>
      <td><input id="id_autowheelsize" 	 name="autowheelsize" 	type="text" value="" style="width:20px;"/></td>
     </tr>
		 <tr><td style="padding-top: 5px;"><button type="submit" formaction="car2db.php" class="ev-btn">Enter car to db</button></td><td style="padding-top: 5px;"><button type="reset" form="mainform" class="ev-btn">Reset form</button></td></tr>
		</table>
	</div>	-->
<div>
	<table id="id_displaycardb" class="table table-striped table-condensed table-sortable table-selectable table-tr-hovered" style="font-size: 11px;">
		<thead><tr>
		<th><div><span class="table-th-sort-span"></span>Make</div></th>
		<th><div><span class="table-th-sort-span"></span>Model</div></th>
		<th><div><span class="table-th-sort-span"></span>Year [yyyy]</div></th>
		<th><div><span class="table-th-sort-span"></span>Weight [kg]</div></th>
		<th><div><span class="table-th-sort-span"></span>Coeff. of drag []</div></th>
		<th><div><span class="table-th-sort-span"></span>Frontal Area [m^2]</div></th>
		<th><div><span class="table-th-sort-span"></span>Cd*A [m^2]</div></th>
		<th><div><span class="table-th-sort-span"></span>Gear ratio 1</div></th>
		<th><div><span class="table-th-sort-span"></span>Gear ratio 2</div></th>
		<th><div><span class="table-th-sort-span"></span>Gear ratio 3</div></th>
		<th><div><span class="table-th-sort-span"></span>Gear ratio 4</div></th>
		<th><div><span class="table-th-sort-span"></span>Gear ratio 5</div></th>
		<th><div><span class="table-th-sort-span"></span>Gear ratio 6</div></th>
		<th><div><span class="table-th-sort-span"></span>Gear ratio final</div></th>
		<th><div><span class="table-th-sort-span"></span>Drive</div></th>
		<th><div><span class="table-th-sort-span"></span>Tire width [mm]</div></th>
		<th><div><span class="table-th-sort-span"></span>Tire height [%]</div></th>
		<th><div><span class="table-th-sort-span"></span>Tire size [inch]</div></th>
		</thead></tr>
    <tbody>
     
<?php
 include '../db.php';
$query = "SELECT*FROM cardatabase";  
if ($result=$mysqli->query($query)) {
}
else
{
	echo"Error getting cars from database: " .mysql_error()."<br>";
}
if ($result) {
	while($result_ar=mysqli_fetch_assoc($result)){ 
	echo"<tr>";
	echo"<td>".$result_ar['automake']."</td>";
	echo"<td>".$result_ar['automodel']."</td>";
	echo"<td>".$result_ar['autoyear']."</td>";
	echo"<td>".$result_ar['autoweight']."</td>";
	echo"<td>".$result_ar['autocd']."</td>";
	echo"<td>".$result_ar['autofrontalarea']."</td>";
	echo"<td>".$result_ar['autocda']."</td>";
	echo"<td>".$result_ar['autogear1']."</td>";
	echo"<td>".$result_ar['autogear2']."</td>";
	echo"<td>".$result_ar['autogear3']."</td>";
	echo"<td>".$result_ar['autogear4']."</td>";
	echo"<td>".$result_ar['autogear5']."</td>";
	echo"<td>".$result_ar['autogear6']."</td>";
	echo"<td>".$result_ar['autogearfinal']."</td>";
	echo"<td>".$result_ar['autodrive']."</td>";
	echo"<td>".$result_ar['autotirewidth']."</td>";
	echo"<td>".$result_ar['autotireheight']."</td>";
	echo"<td>".$result_ar['autowheelsize']."</td>";
	echo"</td></tr>\n";
	}
}
$mysqli->close();
?>

</tbody></table></div>
</body>
</html>