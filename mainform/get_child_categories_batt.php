<?php

include('../db.php');

if($_REQUEST)
{
	$id 	= $_REQUEST['parent_id'];
	$query  = "SELECT battmodel FROM batterydatabase WHERE battmake = '".$id."'";
	$results  = @mysqli_query($mysqli,$query);

	echo '<select name="batt_sub_category" id="batt_sub_category_id" class="mf_dropdown"> 
			<option value="" selected="selected">Choose model...</option>';  //Bootstrap select doesn't work here??
			
  while ($daten_models = mysqli_fetch_array($results, MYSQL_NUM)) {
         echo '<option value="'.$daten_models[0].'">'.$daten_models[0].'</option>'; 
  }
	echo'</select>';		
}
	else {echo '<label style="padding:7px;float:left; font-size:12px;">No Model Found !</label>';
		}
		
// close connection to database
$mysqli->close();		
?>
