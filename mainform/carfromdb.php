<?php 
// This collects the default car data from the database

//connect to database and select "cardatabase"
include ('db.php');   // include ($_SERVER['DOCUMENT_ROOT']./'db.php');        

    # Default-Daten aus der Tabelle selektieren 
    # Wir nehmen den ganzen Eintrag (*), wo (where) die id gleich 2 
    # ist und wir wollen nur 1 Zeile als Ergebnis (limit 1) 
    $_sql = "SELECT * FROM cardatabase WHERE automake='average' AND automodel='sports coupe' LIMIT 1"; 
    $_resultat = mysqli_query($mysqli,$_sql); 

    # Den gefundenen Datensatz einlesen ! 
    $_defaultdatenauto = mysqli_fetch_array($_resultat, MYSQL_ASSOC); 

    # Zur Kontrolle alle Daten aus dem Array anzeigen
//    print_r($_daten); 
  
// This collects the default motor data from the database
    $_sqlmot = "SELECT * FROM motordatabase WHERE motmake='Siemens' AND motmodel='1PV5135-4WS14 (Azure version)' LIMIT 1"; 
    $_resultatmot = mysqli_query($mysqli,$_sqlmot); 

    # Den gefundenen Datensatz einlesen ! 
    $_datenmot = mysqli_fetch_array($_resultatmot, MYSQL_ASSOC); 
    
// This collects the default battery data from the database
    $_sqlbatt = "SELECT * FROM batterydatabase WHERE battmake='Calb' AND battmodel='SE180Ah' LIMIT 1"; 
    $_resultatbatt = mysqli_query($mysqli,$_sqlbatt); 

    # Den gefundenen Datensatz einlesen ! 
    $_datenbatt = mysqli_fetch_array($_resultatbatt, MYSQL_ASSOC);    

?> 
<form id="mainform" method="post" action="phplot-6.2.0/drawphplot.php"  target="graphiframe"> 
<div id="carsel">
<!--------  MAIN SUBMIT BUTTON   ------------->		
 <table>	
	  <tr><td colspan="2" class="padd"><button id="calcbutton" type="submit" class="ev-btn ev-main-btn" formaction="phplot-6.2.0/drawphplot.php">Calculate</button></td><td><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></td></tr> <!-- -->

<!--------  AUSWAEHLEN UND AUSLESEN FAHRZEUGDATEN AUS DATENBANK  ------------->
	  <tr><td></td></tr>
	  <tr><td colspan="3" class="padd"><strong>Step 1: Choose your car!</strong> 	
  		<!--------  FAHRZEUGE AUS DATENBANK ANZEIGEN  --------------->
			<button id="id_cdb_btn" class="ev-btn">Database</button></td>
		</tr>
		<tr><td> 
				<select id="auto_search_category_id" class="mf_dropdown"> 
				 <option value="" selected="selected">Choose make...</option>
				  <?php $oem = array('average','Alfa Romeo','Audi','BMW','Cadillac','Caterham','Chevrolet','Chrysler','Citroen','Dacia','Ferrari',
				 'Fiat','Ford','Lexus','Honda','Hyundai','Kia','Maserati','Mazda','Mercedes-Benz','Mitsubishi','Nissan','Opel','Peugeot',
				 'Porsche','Renault','Rover/Austin','Seat','Subaru','Tesla','Toyota','Volkswagen','Volvo'
				  ); 
				  	foreach ($oem as &$oemvalue) {echo "<option value=".$oemvalue.">$oemvalue</option>";}; ?> 
				</select>
				</td>
			  <td>
    			<div id="auto_show_sub_categories"> <!-- 'get_child_categories.php' lands here controlled by 'get_child_categories_dropdown.js'-->
						<select name="auto_sub_category" id="auto_sub_category_id" class="mf_dropdown"> 
						<option>Choose model...</option>
						</select>
					</div>
        </td>
        <td class="padd"><input type="button" id="cardatabutton" value="More" class="ev-btn"></td>
    </tr>
 </table>   
<!--------  Show and collapse panel for car data   ----------->
<div id="cardata">
<!--------  EINGABEMASKE FAHRZEUGDATEN   ------------->    
 <table>
		<!-- <input type="submit" formaction="calcplotdata.php" style="visibility: hidden; display: none;"> <!-- uncomment if Main calculation button is below-->
		<tr>																								 <td><input id="id_automake"     	   name="automake"     		type="text" value="<?php echo $_defaultdatenauto["automake"]; 				?>"/></td>
        																								 <td><input id="id_automodel" 			 name="automodel" 			type="text" value="<?php echo $_defaultdatenauto["automodel"]; 				?>"/></td></tr>
		<tr><td><strong>Year of production</strong>:		</td><td><input id="id_autoyear" 			   name="autoyear" 				type="text" value="<?php echo $_defaultdatenauto["autoyear"]; 				?>"/></td></tr>
		<tr><td><strong>Curb weight</strong> [kg]:	 		</td><td><input id="id_autoweight" 		   name="autoweight" 			type="text" value="<?php echo $_defaultdatenauto["autoweight"]; 			?>"/></td></tr>
    <tr><td><strong>Coeff. of drag</strong>:		 		</td><td><input id="id_autocd" 				   name="autocd" 					type="text" value="<?php echo $_defaultdatenauto["autocd"]; 					?>"/></td></tr>
    <tr><td><strong>Frontal area</strong> [m2]:	 		</td><td><input id="id_autofrontalarea"  name="autofrontalarea"	type="text" value="<?php echo $_defaultdatenauto["autofrontalarea"];	?>"/></td></tr>
    <tr><td><strong>Coeff.* Fr. area</strong> [m2]:	</td><td><input id="id_autocda" 				 name="autocda" 				type="text" value="<?php echo $_defaultdatenauto["autocda"]; 					?>"/></td></tr>
    <tr><td colspan="2"><strong>Gears 1 - 6 and final</strong> [ratio]:</td></tr>
    <tr id="inp-xs-gears"><td colspan="2">				  		     <input id="id_autogear1" 			 name="autogear1" 			type="text" value="<?php echo $_defaultdatenauto["autogear1"]; 				?>"/>     
                                                             <input id="id_autogear2" 			 name="autogear2" 			type="text" value="<?php echo $_defaultdatenauto["autogear2"]; 				?>"/>     
                                                             <input id="id_autogear3" 			 name="autogear3" 			type="text" value="<?php echo $_defaultdatenauto["autogear3"]; 				?>"/>     
                                                             <input id="id_autogear4" 			 name="autogear4" 			type="text" value="<?php echo $_defaultdatenauto["autogear4"]; 				?>"/>     
                                                             <input id="id_autogear5" 			 name="autogear5" 			type="text" value="<?php echo $_defaultdatenauto["autogear5"]; 				?>"/>     
                                                             <input id="id_autogear6" 			 name="autogear6" 			type="text" value="<?php echo $_defaultdatenauto["autogear6"]; 				?>"/>
                                                             <input id="id_autogearfinal" 	 name="autogearfinal" 	type="text" value="<?php echo $_defaultdatenauto["autogearfinal"]; 		?>"/></td></tr>
    <tr><td><strong>Drive wheel</strong> [xWD}:			</td><td><input id="id_autodrive" 			 name="autodrive" 			type="text" value="<?php echo $_defaultdatenauto["autodrive"]; 				?>"/></td></tr>	
    <tr><td colspan="2"><strong>Tire width, height and wheel size:</strong></td></tr>
    <tr id="inp-xs-tire"><td colspan="2">                    <input id="id_autotirewidth" 	 name="autotirewidth" 	type="text" value="<?php echo $_defaultdatenauto["autotirewidth"]; 		?>"/> [mm]
                                                             <input id="id_autotireheight"   name="autotireheight" 	type="text" value="<?php echo $_defaultdatenauto["autotireheight"];		?>"/> [%] 
                                                             <input id="id_autowheelsize" 	 name="autowheelsize" 	type="text" value="<?php echo $_defaultdatenauto["autowheelsize"]; 		?>"/> [inch] </td></tr>
		<tr><td style="padding-top: 5px;"><button type="submit" formaction="car2db.php" class="ev-btn">Enter car to db</button></td><td style="padding-top: 5px;"><button type="reset" form="mainform" class="ev-btn">Reset form</button></td></tr>
	  <tr><td class="padd"><input type="button" id="advanceddatabutton" value="Advanced parameters" class="ev-btn"></td></tr>
	</table>	
 <div id="advanceddata">
	<table>
		<tr><td><strong>Vehicle payload</strong> [kg]: 	              				</td><td><input id="id_payload"      name="autopayload"  		type="text" value="0"/></td></tr>
		<tr><td><strong>Front axle load</strong> [%]:                 				</td><td><input id="id_frontload"  	 name="autofrontload"	  type="text" value="50"/></td></tr>
		<tr><td><strong>Coeff. of friction</strong>: 	                				</td><td><input id="id_friction"   	 name="autofriction"	  type="text" value="1.0"/></td></tr>
		<tr><td><strong>Rolling resistance</strong>: 	                				</td><td><input id="id_rollresist"   name="autorollresist"	type="text" value="0.015"/></td></tr>
    <tr><td><strong>Road slope</strong> [%]: 	                    				</td><td><input id="id_slope"        name="autoslope"  	  	type="text" value="0"/></td></tr>
    <tr><td><strong>Ratio layout</strong>: 	                      				</td></tr>
    <tr><td colspan="3"><label class="radio-inline"><input id="id_ratio" name="autoratio" type="radio" value="Gearbox" checked>Gearbox</label>
    	                  <label class="radio-inline"><input id="id_ratio" name="autoratio" type="radio" value="Differential">Differential</label>
    	                  <label class="radio-inline"><input id="id_ratio" name="autoratio" type="radio" value="Direct drive">Direct drive</label></td></tr>
		<tr><td><strong>Eff. transmission</strong> [%]:               				</td><td><input id="id_efftrans"   	 name="autoefftrans"	  type="text" value="97"/></td></tr>
		<tr><td><strong>Eff. differential</strong> [%]:              					</td><td><input id="id_effdiff"   	 name="autoeffdiff"	    type="text" value="93"/></td></tr>
		<tr><td colspan="3" class="padd"><strong>Extra Calculation: Power necessary for...</strong></td></tr>
		<tr id="inp-xs-time"><td><strong>Time 0-100, 0-200 and 80-120</strong></td><td><input id="id_t100"   	     name="autot100"	    type="text" value="7"/> [s]
                                                                           				 <input id="id_t200"   	     name="autot200"	    type="text" value="19"/>[s]
                                                                                   <input id="id_t812"   	     name="autot812"	    type="text" value="6"/>[s] </td></tr>
  </table>
 </div>	
 </div>
</div>
			
<!--------  AUSWAEHLEN UND AUSLESEN MOTORDATEN AUS DATENBANK  ------------->
<div id="motsel">
 <table>
	  <tr><td colspan="2" class="padd"><strong>Step 2: Choose a motor!</strong>
	  		<!--------  E-MOTOREN AUS DATENBANK ANZEIGEN  --------------->
  			<button id="id_mdb_btn" class="ev-btn">Database</button></td>
	  </tr>		
		<tr><td>	
				<select id="mot_search_category_id" class="mf_dropdown"> 
				 <option value="" selected="selected">Choose make...</option>
					 <?php  $_sql3 = "SELECT motmake FROM motordatabase"; 
                  $_resultat3 = mysqli_query($mysqli,$_sql3); 
                  while ($_datentemp3 = mysqli_fetch_array($_resultat3,MYSQL_NUM)) {
                        $_daten3multi[]=$_datentemp3[0];
                      }
                  $_daten3=array_unique($_daten3multi); /*Removes multiple entrys*/
                  foreach ($_daten3 as &$emotmake) {echo '<option value="'.$emotmake.'">'.$emotmake.'</option>';} 
             ?>
				</select>
				</td>
        <td>
      			<div id="mot_show_sub_categories"> 
							<select name="mot_sub_category" id="mot_sub_category_id" class="mf_dropdown"> 
							<option>Choose model...</option>
							</select>
						</div>
        </td>
        <td class="padd"><input type="button" id="motdatabutton" value="More" class="ev-btn"></td>        
    </tr>
 </table> 
 
<!--------  Show and collapse panel for mot data   ----------->
<div id="motdata">  			      	
<!--------  EINGABEMASKE MOTORDATEN   ------------->	
 <table>
		<tr><td><strong>Motor Make</strong>:  			</td><td><input id="id_motmake"				name="motmake"			type="text" value="<?php echo $_datenmot["motmake"]			;?>"/></td></tr>
		<tr><td><strong>Motor Model</strong>:				</td><td><input id="id_motmodel"			name="motmodel"			type="text" value="<?php echo $_datenmot["motmodel"]		;?>"/></td></tr>
		<tr><td><strong>AC or DC</strong>: 					</td><td><input id="id_motacdc"				name="motacdc"			type="text" value="<?php echo $_datenmot["motacdc"]			;?>"/></td></tr>
		<tr><td><strong>Price </strong>[EUR]:   		</td><td><input id="id_motprice"			name="motprice"			type="text" value="<?php echo $_datenmot["motprice"]		;?>"/></td></tr>
    <tr><td><strong>Weight </strong>[kg]:				</td><td><input id="id_motweight"			name="motweight"		type="text" value="<?php echo $_datenmot["motweight"]		;?>"/></td></tr>
    <tr><td><strong>Max. Power </strong>[kW]:		</td><td><input id="id_motpow"				name="motpow"				type="text" value="<?php echo $_datenmot["motpow"]			;?>"/></td></tr>
    <tr><td><strong>Max. Torque </strong>[Nm]:	</td><td><input id="id_mottorq"				name="mottorq"			type="text" value="<?php echo $_datenmot["mottorq"]			;?>"/></td></tr>
    <tr><td><strong>Cont. RPM </strong>[1/min]:	</td><td><input id="id_motcontrpm"		name="motcontrpm"		type="text" value="<?php echo $_datenmot["motcontrpm"]	;?>"/></td></tr>
    <tr><td><strong>Peak. RPM </strong>[1/min]:	</td><td><input id="id_motpeakrpm"		name="motpeakrpm"		type="text" value="<?php echo $_datenmot["motpeakrpm"]	;?>"/></td></tr>
    <tr><td><strong>Voltage </strong>[V]:		 		</td><td><input id="id_motvolt"				name="motvolt"			type="text" value="<?php echo $_datenmot["motvolt"]			;?>"/></td></tr>
    <tr><td><strong>Efficiency </strong>[%]:		</td><td><input id="id_moteff"				name="moteff"				type="text" value="<?php echo $_datenmot["moteff"]			;?>"/></td></tr>
    <tr><td><strong>Dealer</strong>:		      	</td><td><input id="id_motdealer"			name="motdealer"		type="text" value="<?php echo $_datenmot["motdealer"]		;?>"/></td></tr>
    <tr><td><strong>Date of price</strong>:			</td><td><input id="id_motpricedate"	name="motpricedate"	type="text" value="<?php echo $_datenmot["motpricedate"];?>"/></td></tr>
    <tr style="display:none;"><td>Torque curve: </td><td><input id="id_motarray"			name="motarray"			type="text" value="<?php echo $_datenmot["motarray"]		;?>"/></td></tr>
    <tr><td class="padd"><button type="submit" formaction="mot2db.php" class="ev-btn">Motor into db</button></td><td class="padd"><button type="reset" form="motfromdb1" class="ev-btn">Reset form</button></td></tr>
 </table>
</div>
</div>			    
<!--------  AUSWAEHLEN UND AUSLESEN BATTERIEDATEN AUS DATENBANK  ------------->	
<div id="battsel">
 <table>
	  <tr><td colspan="2" class="padd"><strong>Step 3: Choose a battery!</strong>
	  		<!--------  BATTERIEZELLEN AUS DATENBANK ANZEIGEN  ---------->
				<button id="id_bdb_btn" class="ev-btn">Database</button></td>
	  </tr>		
		<tr><td>	
				<select id="batt_search_category_id" class="mf_dropdown"> 
				 <option value="" selected="selected">Choose make...</option>
					 <?php  $_sql4 = "SELECT battmake FROM batterydatabase"; 
                  $_resultat4 = mysqli_query($mysqli,$_sql4); 
                  while ($_datentemp4 = mysqli_fetch_array($_resultat4,MYSQL_NUM)) {
                        $_daten4multi[]=$_datentemp4[0];
                      }
                  $_daten4=array_unique($_daten4multi); /*Removes multiple entrys*/
                  foreach ($_daten4 as &$ebattmake) {echo '<option value="'.$ebattmake.'">'.$ebattmake.'</option>';} 
             ?> 
				</select>
				</td>
        <td>
      			<div id="batt_show_sub_categories"> 
							<select name="batt_sub_category" id="batt_sub_category_id" class="mf_dropdown"> 
							<option>Choose model...</option>
							</select>
						</div>
        </td>
        <td class="padd"><input type="button" id="battdatabutton" value="More" class="ev-btn"></td>
    </tr>
 </table> 		
<!--------  Show and collapse panel for battery data   ----------->
<div id="battdata">
<!--------  EINGABEMASKE BATTERYDATEN   ------------->	
 <table>
		<tr><td><strong>Battery Make</strong>:  		</td><td><input id="id_battmake"			name="battmake"			type="text" value="<?php echo $_datenbatt["battmake"]			;?>"/></td></tr>
		<tr><td><strong>Battery Model</strong>:			</td><td><input id="id_battmodel"			name="battmodel"		type="text" value="<?php echo $_datenbatt["battmodel"]		;?>"/></td></tr>
    <tr><td><strong>Voltage </strong>[V]:		 		</td><td><input id="id_battvolt"			name="battvolt"			type="text" value="<?php echo $_datenbatt["battvolt"]			;?>"/></td></tr>
    <tr><td><strong>Capacity </strong>[Ah]:   	</td><td><input id="id_battcapa"			name="battcapa"		  type="text" value="<?php echo $_datenbatt["battcapa"]			;?>"/></td></tr>
    <tr><td><strong>Discharge curr</strong>:		</td><td><input id="id_battdisc"		  name="battdisc"		  type="text" value="<?php echo $_datenbatt["battdisc"]		  ;?>"/></td></tr>
    <tr><td><strong>Price </strong>[EUR]:   		</td><td><input id="id_battprice"			name="battprice"		type="text" value="<?php echo $_datenbatt["battprice"]		;?>"/></td></tr>
    <tr><td><strong>Weight </strong>[kg]:				</td><td><input id="id_battweight"		name="battweight"		type="text" value="<?php echo $_datenbatt["battweight"]		;?>"/></td></tr>
    <tr><td><strong>Chemistry </strong>:				</td><td><input id="id_battchem"		  name="battchem"		  type="text" value="<?php echo $_datenbatt["battchem"]			;?>"/></td></tr>
    <tr><td><strong>Dealer</strong>:		      	</td><td><input id="id_battdealer"		name="battdealer"		type="text" value="<?php echo $_datenbatt["battdealer"]		;?>"/></td></tr>
    <tr><td><strong>Date of price</strong>:			</td><td><input id="id_battpricedate"	name="battpricedate"type="text" value="<?php echo $_datenbatt["battpricedate"];?>"/></td></tr>
    <tr><td><strong>Comment</strong>:						</td><td><input id="id_battcomment"	  name="battcomment"  type="text" value="<?php echo $_datenbatt["battcomment"]	;?>"/></td></tr>
    <tr><td class="padd"><button type="submit" formaction="batt2db.php" class="ev-btn">Batt into db</button></td><td class="padd"><button type="reset" form="battfromdb1" class="ev-btn">Reset form</button></td></tr>
 </table>
</div>	
</div>	

</form> <!-- overall form without results -->

<!--------  AUSGABEMASKE ERGEBNISDATEN   ------------->	
<!-- in index.php  -->

 
<?php 
// close connection to database
$mysqli->close();
?>
