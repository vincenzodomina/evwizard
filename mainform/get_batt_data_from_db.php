<?php 
// This collects the car data from selected car from the database

include('../db.php');          


if($_GET)
{
	$id 	= $_GET['q'];
	$query  = "SELECT * FROM batterydatabase WHERE battmodel = '".$id."' LIMIT 1";
	$results  = @mysqli_query($mysqli,$query);
  $data_batt = mysqli_fetch_array($results, MYSQL_ASSOC);
//build the JSON array for return
	echo json_encode($data_batt);
  
}  
  
// close connection to database
$mysqli->close();

?>