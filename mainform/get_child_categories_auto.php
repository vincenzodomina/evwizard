<?php

include('../db.php');

if($_REQUEST)
{
	$id 	= $_REQUEST['parent_id'];
	$query  = "SELECT automodel FROM cardatabase WHERE automake = '".$id."'";
	$results  = @mysqli_query($mysqli,$query);

	echo '<select name="auto_sub_category" id="auto_sub_category_id" class="mf_dropdown"> 
			<option value="" selected="selected">Choose model...</option>'; 
			
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
