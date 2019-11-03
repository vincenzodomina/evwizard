<?php 
// This collects the car data from selected car from the database

include('../db.php');          


if($_GET)
{
	$id 	= $_GET['q'];
	$query  = "SELECT * FROM motordatabase WHERE motmodel = '".$id."' LIMIT 1";
	$results  = @mysqli_query($mysqli,$query);
  $data_mot = mysqli_fetch_array($results, MYSQL_ASSOC);
//  print_r($data_cars);
//build the JSON array for return
//	$json_car_data = array('Bmw','3er');
	echo json_encode($data_mot);
  
}  
  
// close connection to database
$mysqli->close();

?>