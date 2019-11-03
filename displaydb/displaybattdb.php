<!doctype html>
<html lang="en">
<head><title>EV Wizard - Battery cells</title><meta charset="utf-8"/>
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
	<table id="id_displaybattdb" class="table table-striped table-condensed table-sortable table-selectable table-tr-hovered"" style="font-size: 11px;"><thead><tr>
		<th><div><span class="table-th-sort-span"></span>Make</div></th>
		<th><div><span class="table-th-sort-span"></span>Model</div></th>
		<th><div><span class="table-th-sort-span"></span>Nom. voltage [V]</div></th>
	  <th><div><span class="table-th-sort-span"></span>Capacity [Ah]</div></th>
	  <th><div><span class="table-th-sort-span"></span>Disc. current [C]</div></th>
		<th><div><span class="table-th-sort-span"></span>Price [€]</div></th>
		<th><div><span class="table-th-sort-span"></span>Weight [g]</div></th>
		<th><div><span class="table-th-sort-span"></span>Chemistry</div></th>
		<th><div><span class="table-th-sort-span"></span>Dealer</div></th>
		<th><div><span class="table-th-sort-span"></span>Date of price</div></th>
		<th><div><span class="table-th-sort-span"></span>Comment</div></th>
		</thead></tr>
    <tbody>
<?php
include '../db.php';
$query = "SELECT*FROM batterydatabase";  
if ($result=$mysqli->query($query)) {
}
else
{
	echo"</table></div><br><p>Error getting battery cells from database: " .mysql_error()."</p>";
} 

if ($result) {
	while($result_ar=mysqli_fetch_assoc($result)){ 
	echo"<tr>";
	echo"<td>".$result_ar['battmake']			."</td>";
	echo"<td>".$result_ar['battmodel']		."</td>";
	echo"<td>".$result_ar['battvolt']			."</td>";
	echo"<td>".$result_ar['battcapa']			."</td>";
	echo"<td>".$result_ar['battdisc']			."</td>";
	echo"<td>".$result_ar['battprice']		."</td>";
	echo"<td>".$result_ar['battweight']		."</td>";
	echo"<td>".$result_ar['battchem']			."</td>";
	echo'<td><a href="http://'.$result_ar['battdealer'].'" target="_blank">'.$result_ar['battdealer'].'</a></td>';
	echo"<td>".$result_ar['battpricedate']."</td>";
	echo'<td>'.$result_ar['battcomment']	.'</td>';
	echo"</td></tr>\n";
	}
}
$mysqli->close();
?>

</tbody></table></div>
</body>
</html>