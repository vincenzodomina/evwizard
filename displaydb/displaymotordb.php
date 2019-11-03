<!doctype html>
<html lang="en">
<head><title>EV Wizard</title><meta charset="utf-8"/>
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
<div class="col-md-12">
	<table id="id_displaymotdb" class="table table-striped table-condensed table-sortable table-selectable table-tr-hovered"" style="font-size: 11px;"><thead><tr>
		<th><div><span class="table-th-sort-span"></span>Make</div></th>
		<th><div><span class="table-th-sort-span"></span>Model</div></th>
		<th><div><span class="table-th-sort-span"></span>AC or DC</div></th>
		<th><div><span class="table-th-sort-span"></span>Price [€]</div></th>
		<th><div><span class="table-th-sort-span"></span>Weight [kg]</div></th>
		<th><div><span class="table-th-sort-span"></span>Max. Power [kw]</div></th>
		<th><div><span class="table-th-sort-span"></span>Max. Torque [Hm]</div></th>
		<th><div><span class="table-th-sort-span"></span>Cont. RPM [1/min]</div></th>
		<th><div><span class="table-th-sort-span"></span>Peak. RPM [1/min]</div></th>
		<th><div><span class="table-th-sort-span"></span>Voltage [V]</div></th>
		<th><div><span class="table-th-sort-span"></span>Efficiency [%]</div></th>
		<th><div><span class="table-th-sort-span"></span>Dealer</div></th>
		<th><div><span class="table-th-sort-span"></span>Date of price</div></th>
		<th><div><span class="table-th-sort-span"></span>Torque curve</div></th>
		</thead></tr>
    <tbody>
<?php
 include '../db.php';
$query = "SELECT*FROM motordatabase";  
if ($result=$mysqli->query($query)) {
}
else
{
	echo"</table></div><br><p>Error getting battery cells from database: " .mysql_error()."</p>";
} 
if ($result) {
	while($result_ar=mysqli_fetch_assoc($result)){ 
	echo"<tr>";
	echo"<td>".$result_ar['motmake']			."</td>";
	echo"<td>".$result_ar['motmodel']			."</td>";
	echo"<td>".$result_ar['motacdc']			."</td>";
	echo"<td>".$result_ar['motprice']			."</td>";
	echo"<td>".$result_ar['motweight']		."</td>";
	echo"<td>".$result_ar['motpow']				."</td>";
	echo"<td>".$result_ar['mottorq']			."</td>";
	echo"<td>".$result_ar['motcontrpm']		."</td>";
	echo"<td>".$result_ar['motpeakrpm']		."</td>";
	echo"<td>".$result_ar['motvolt']			."</td>";
	echo"<td>".$result_ar['moteff']				."</td>";
	echo'<td><a href="http://'.$result_ar['motdealer'].'" target="_blank">'.$result_ar['motdealer'].'</a></td>';
	echo"<td>".$result_ar['motpricedate']	."</td>";
	echo"<td>".$result_ar['motarray']			."</td>";
	echo"</td></tr>\n";
	}
}
$mysqli->close();
?>

</tbody></table></div>
</body>
</html>