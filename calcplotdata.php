<?php
/**************************************************
                                                  
        EV Wizard (www.evwizard.de)               
        01.12.2016                                
        Vincenzo Domina                           
        (PHP-Version 5)                           
                                                  
**************************************************
  Inhalt:
  0.Initialisierung und Sicherheit
  1.Fahrzeug Eingangsparameter und Zielwerte
  2.Zugkraftdiagramm
  3.Maximale Geschwindigkeiten
  4.Wieviel Leistung noetig f¸r Beschleunigung 0-100km/h in x Sekunden?
  5.Maximale Beschleunigungen mit/ohne Getriebe/Diff 
  6.Viertelmeile in welcher Zeit mit welcher Geschwindigkeit am ziel
  7.Reichweite
  8.Batterieverschaltung
  9.Steigungsfaehigkeit
*******************************************************/

#************************************************************************************************
#  0.Initialisierung und Sicherheit
#************************************************************************************************

// Initial configuration for error log:
// init Error messages container
$error= array (); 
// First error log message: necessary for jquery error log to work	
$error[]="Calculation done! Good choice!"; 
// define Email for contact
$evmail="info@evwizard.de";

// tbd javascrript validation front end: http://formvalidation.io

// tbd https://codeutopia.net/blog/2008/10/16/how-to-csrf-protect-all-your-forms/

// secure and test input data
function secure_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  // tbd mysql_real_escape_string
  return $data;
}

#************************************************************************************************
#  1.Fahrzeug Eingangsparameter und Zielwerte
#************************************************************************************************

# This calculates the data for Fahrleistungsschaubild

//capture car data values posted from form 
$automake       =secure_input($_POST['automake']);       // if(!preg_match("/^[A-Za-z0-9.- \(\)]{0,99}$/",$automake)) {$automake="average";$error[]="Missing input! Car make is set to average";}
$automodel      =secure_input($_POST['automodel']);      // if(!preg_match("/^[A-Za-z0-9\.- \(\)]{0,99}$/",$automodel)) {$automodel="sports coupe";$error[]="Missing input! Car model is set to sports coupe";}
$autoyear       =secure_input($_POST['autoyear']);       if(!preg_match("/^19[0-9][0-9]$|^20[0-2][0-9]$/",$autoyear)) {$autoyear=2000;$error[]="Missing input! Car year is set to default value 2000";} // values 1900-2029
$autoweight     =secure_input($_POST['autoweight']);     if(!preg_match("/^[1-9][0-9][0-9]$|^[1-3][0-9][0-9][0-9]$/",$autoweight)) {$autoweight=1300;$error[]="Missing input! Car weight is set to default value 1300";} // values 100-3999
$autocd         =secure_input($_POST['autocd']);         if(!preg_match("/^0\.[1-9][0-9]?[0-9]?$/",$autocd)) {$autocd=0.3;$error[]="Missing input! Coefficient of drag is set to default value 0.3";} // values 0.1-0.999
$autofrontalarea=secure_input($_POST['autofrontalarea']);if(!preg_match("/^[1-4]$|^[1-3]\.[0-9]?[0-9]?[0-9]?$/",$autofrontalarea)) {$autofrontalarea=2;$error[]="Missing input! Frontal area is set to default value 2";} //values 1-4
$autocda        =secure_input($_POST['autocda']);        if(!preg_match("/^[1-3]$|^[0-3]\.[0-9]?[0-9]?[0-9]?$/",$autocda)) {$autocda=0.6;$error[]="Missing input! Frontal area times coefficient of drag is set to value default 0.6";} //values 0.1-3.999
$autogear1      =secure_input($_POST['autogear1']);      if(!preg_match("/^$|^[0-9][0-9]?$|^[1-9][0-9]?\.[0-9]?[0-9]?[0-9]?$|^0\.[0-9][0-9]?[0-9]?$/",$autogear1)) {$autogear1=3.0;$error[]="Missing input! Gear 1 is set to default value 3.0";} //values 0-19.999
$autogear2      =secure_input($_POST['autogear2']);      if(!preg_match("/^$|^[0-9][0-9]?$|^[1-9][0-9]?\.[0-9]?[0-9]?[0-9]?$|^0\.[0-9][0-9]?[0-9]?$/",$autogear2)) {$autogear2=2.5;$error[]="Missing input! Gear 2 is set to default value 2.5";} //values 0-19.999
$autogear3      =secure_input($_POST['autogear3']);      if(!preg_match("/^$|^[0-9][0-9]?$|^[1-9][0-9]?\.[0-9]?[0-9]?[0-9]?$|^0\.[0-9][0-9]?[0-9]?$/",$autogear3)) {$autogear3=2.0;$error[]="Missing input! Gear 3 is set to default value 2.0";} //values 0-19.999
$autogear4      =secure_input($_POST['autogear4']);      if(!preg_match("/^$|^[0-9][0-9]?$|^[1-9][0-9]?\.[0-9]?[0-9]?[0-9]?$|^0\.[0-9][0-9]?[0-9]?$/",$autogear4)) {$autogear4=1.5;$error[]="Missing input! Gear 4 is set to default value 1.5";} //values 0-19.999
$autogear5      =secure_input($_POST['autogear5']);      if(!preg_match("/^$|^[0-9][0-9]?$|^[1-9][0-9]?\.[0-9]?[0-9]?[0-9]?$|^0\.[0-9][0-9]?[0-9]?$/",$autogear5)) {$autogear5=1.0;$error[]="Missing input! Gear 5 is set to default value 1.0";} //values 0-19.999
$autogear6      =secure_input($_POST['autogear6']);      if(!preg_match("/^$|^[0-9][0-9]?$|^[1-9][0-9]?\.[0-9]?[0-9]?[0-9]?$|^0\.[0-9][0-9]?[0-9]?$/",$autogear6)) {$autogear6=0.8;$error[]="Missing input! Gear 6 is set to default value 0.8";} //values 0-19.999
$autogearfinal  =secure_input($_POST['autogearfinal']);  if(!preg_match("/^$|^[1-9][0-9]?$|^[1-9][0-9]?\.[0-9]?[0-9]?[0-9]?$|^0\.[1-9][0-9]?[0-9]?$/",$autogearfinal)) {$autogearfinal=3;$error[]="Missing input! Final gear is set to default value 3.0";} //values 0.1-19.999
$autodrive      =secure_input($_POST['autodrive']);      if(!preg_match("/^FWD|RWD|AWD$/",$autodrive)) {$autodrive="RWD";$error[]="Missing input! Drive is set to default RWD";}
$autotirewidth  =secure_input($_POST['autotirewidth']);  if(!preg_match("/^[1-3][0-9][0-9]$/",$autotirewidth)) {$autotirewidth=225;$error[]="Missing input! Tire width is set to default value 225";} // values 100-399
$autotireheight =secure_input($_POST['autotireheight']); if(!preg_match("/^25$|^[3-8](0|5)$/",$autotireheight)) {$autotireheight=45;$error[]="Missing input! Tire height is set to default value 45";} // values 25-85 
$autowheelsize  =secure_input($_POST['autowheelsize']);  if(!preg_match("/^1[0-9]$|^2[0-5]$/",$autowheelsize)) {$autowheelsize =18;$error[]="Missing input! Wheel size is set to default value 18";} // values 10-25
                                                         
$autopayload  	=secure_input($_POST['autopayload']);    if(!preg_match("/^[0-9][0-9]?[0-9]?[0-9]?$/",$autopayload)) {$autopayload =0;$error[]="Missing input! Pay load is set to default value 0";} //values 0-9999
$autofrontload	=secure_input($_POST['autofrontload']);  if(!preg_match("/^[1-8][0-9]$/",$autofrontload)) {$autofrontload=50;$error[]="Missing input! Front axle load is set to default value 50";} // values 10-89
$autofriction	  =secure_input($_POST['autofriction']);   if(!preg_match("/^[1-6]$|^[1-5]\.[0-9]?[0-9]?[0-9]?$|^0\.0?[1-9][0-9]?[0-9]?$/",$autofriction)) {$autofriction=1;$error[]="Missing input! Friction is set to default value 1";} // values 0.01-6
$autorollresist =secure_input($_POST['autorollresist']); if(!preg_match("/^0\.00[1-9][0-9]?$|^0\.0[1-9][0-9]?[0-9]?$/",$autorollresist)) {$autorollresist=0.015;$error[]="Missing input! Rolling resistance  is set to default value 0.015";} // values 0.001-0.099
$autoslope  	  =secure_input($_POST['autoslope']);	     if(!preg_match("/^[0-4][0-9]?$/",$autoslope)) {$autoslope =0;$error[]="Missing input! Road slope is set to default value 0";} // values 0-49
$autoratio	    =secure_input($_POST['autoratio']);      if(!preg_match("/^Gearbox|Differential|Direct drive$/",$autoratio)) {$autoratio="Gearbox";$error[]="Missing input! Ratio layout is set to Gearbox";} //values Gearbox|Differential|Direct drive
$autoefftrans	  =secure_input($_POST['autoefftrans']);   if(!preg_match("/^[5-9][0-9](\.[0-9])?$/",$autoefftrans)) {$autoefftrans=100;$error[]="Missing input! Efficiency of the transmission is set to default value 100";} //values 50-99.9
$autoeffdiff    =secure_input($_POST['autoeffdiff']);    if(!preg_match("/^[5-9][0-9](\.[0-9])?$/",$autoeffdiff)) {$autoeffdiff=100;$error[]="Missing input! Efficiency of the differential is set to default value 100";} //values 50-99.9
$autot100   		=secure_input($_POST['autot100']);       if(!preg_match("/^[1-9][0-9]?$|^[1-9]?[0-9]\.[1-9][0-9]?$/",$autot100)) {$autot100=4;$error[]="Missing input! Time for 0-100 km/h is set to default value 4";} // values 0.1-99.99
$autot200    		=secure_input($_POST['autot200']);       if(!preg_match("/^[1-9][0-9]?$|^[1-9]?[0-9]\.[1-9][0-9]?$/",$autot200)) {$autot200=19;$error[]="Missing input! Time for 0-200 km/h is set to default value 19";} // values 0.1-99.99
$autot812    		=secure_input($_POST['autot812']);       if(!preg_match("/^[1-9][0-9]?$|^[1-9]?[0-9]\.[1-9][0-9]?$/",$autot812)) {$autot812=6;$error[]="Missing input! Time for 80-120 km/h is set to default value 6";} // values 0.1-99.99

$motmake	   	  =secure_input($_POST['motmake']);        // if(!preg_match("/^[A-Za-z0-9\.- \(\)]{0,99}$/",$motmake)) {$motmake="average";$error[]="Missing input! Motor make is set to average";}         // tbd input check for database, abort enter to db if input false
$motmodel    	  =secure_input($_POST['motmodel']);       // if(!preg_match("/^[A-Za-z0-9\.- \(\)]{0,99}$/",$motmodel)) {$motmodel="electric motor";$error[]="Missing input! Motor model is set to electric motor";}
$motacdc		 	  =secure_input($_POST['motacdc']);  
$motprice    	  =secure_input($_POST['motprice']); 
$motweight   	  =secure_input($_POST['motweight']);
$motpow      	  =secure_input($_POST['motpow']);         if(filter_var($motpow, FILTER_VALIDATE_INT) === false) {$motpow=100;$error[]="Missing input! Motor power is set to default value 100";}
$mottorq     	  =secure_input($_POST['mottorq']);  
$motcontrpm  	  =secure_input($_POST['motcontrpm']);
$motpeakrpm  	  =secure_input($_POST['motpeakrpm']);
$motvolt	   	  =secure_input($_POST['motvolt']);
$moteff      	  =secure_input($_POST['moteff']);
$motdealer   	  =secure_input($_POST['motdealer']);
$motpricedate	  =secure_input($_POST['motpricedate']);
$motarray				=secure_input($_POST['motarray']);

// tbd battery input data and validation

// first we need to alter the submitted values a bit
// and make some plausibility checks
// tbd, look at init.php from OpenPlag. tbd serverside value check

# Umwandlung der Variablen in kuerzere MATLAB Form 
$mw=$autoweight;						 # Fahrzeugmasse Gesamt/Zuladung [kg]
$mw_zu=$autopayload;    
$cw=$autocd;                 # CW Wert Fahrzeug []
$proj_A=$autofrontalarea;    # Projektionsflaeche frontal [m^2]
$kr=$autorollresist;         # Rollwiderstandsbeiwert []
$steig=$autoslope;           # Steigung Fahrbahn [%]
$i_A=$autogearfinal;         # Ganguntersetzungen Achsgetriebe []
$i_G1=$autogear1;            # Ganguntersetzungen Getriebe []
$i_G2=$autogear2;
$i_G3=$autogear3;
$i_G4=$autogear4;
$i_G5=$autogear5;
$i_G6=$autogear6;            
$i_G=["$i_G1","$i_G2","$i_G3","$i_G4","$i_G5","$i_G6"];
$r_dyn=($autotirewidth*$autotireheight/(1000*100))+($autowheelsize*25.4/(1000*2));  # Dynamischer Reifenhalbmesser [m]    
$eta_G=$autoefftrans/100; $eta_A=$autoeffdiff/100;    # Wirkungsgrad Getriebe/Achsgetriebe []
$mueh_r= $autofriction;      # Reifenreibbeiwert
$F_VA=$autofrontload;        # VA-Last [%] fuer Gewichtsverteilung
$TRACTION=$autodrive;        # RWD=Heck FWD=Front AWD=Allrad

# Reifenkraftschlussgrenze  
switch ($TRACTION) {
    case 'AWD'; # bei Allrad 
	     $F_haft = round($mueh_r*($mw+$mw_zu)*9.81); break;                                                
    case 'FWD'; # bei Frontantrieb
	     $F_haft = round($mueh_r*($mw+$mw_zu)*9.81*($F_VA/100)); break;                                                
    case 'RWD'; # bei Heckantrieb
	     $F_haft = round($mueh_r*($mw+$mw_zu)*9.81*((100-$F_VA)/100)); break; 
    default; # halbe Kraftuebertragung
	     $F_VA=50; 
	     $F_haft = round($mueh_r*($mw+$mw_zu)*9.81*($F_VA/100)); break;       
};	

# Maximalwerte fuer den Graphen
// Round $F_haft to achieve maximum y-value for graph
$max_y_value= (ceil(($F_haft)/1000)+1)*1000;
$max_x_value=300;
 			                   
# E-Motor Eingangsparameter
$Umot=$motvolt;              # Betiebsspannung E-Motor [V]
$Pmax=$motpow;               # Maximale Leistung [kW]

# Batterie Eingangsparameter
$k_ak=80;                    # Nutzungsmenge der Batterie [%]
$Z_Ah=3.4;                   # Kapazitaet Zelle [Ah]
$Z_V=3.7;                    # Nominalspannung Zelle [V]
$Z_c=1.9;                    # Entladestrom Zelle
$Z_g=48;                     # Gewicht Zelle [g]
$Z_p=5.25;                   # Preis pro Zelle [Ä]

#Zielwerte
$t100=$autot100; $v100=100/3.6;   # Zeit fuer 0-100km/h [s] - v in m/s
$t200=$autot200; $v200=200/3.6;   # Zeit fuer 0-100km/h [s]
$t812=$autot812; $v80=80/3.6; $v120=120/3.6;
$C_akku=30;                  # Gesamtkapazitaet der Batterie [kWh]
$vmax=200;                   # Hoechstgeschwindigkeit [km/h]

#************************************************************************************************
# 2.Zugkraftdiagramm                                    
#************************************************************************************************


# Zugkrafthyperbel ueber Geschwindigkeit [N ueber km/h]                      
$plot_data_hyp = array( 0 => array('',0,100000));
                    
for ($v = 1; $v <= 300; $v += 1) {
  $F_hyp= (3600*$Pmax)/$v;  # v eingesetzt in km/h
  $plot_data_hyp[] = array('',$v,$F_hyp); 
};

# Fahrtwiderstand ueber Geschwindigkeit [N ueber km/h], v eingesetzt in km/h
function get_drag_at_v($v) { 
	global $kr,$mw,$mw_zu,$cw,$proj_A,$steig; # Annahme Luftdichte: 1.2051 bar
  $F_w=(($kr*($mw+$mw_zu)*9.81)+((9.810463*(10**-11))*(($v/3.6)**5)))+($cw*$proj_A*1.2051/2*(($v/3.6)**2))+(($mw+$mw_zu)*9.81*$steig/100);
  return $F_w;
};

for ($v = 0; $v <= 300; $v += 1) {
	$F_w= get_drag_at_v($v);
  $plot_data_w[] = array('',$v,$F_w); # einfuegen in bestehendes array 
  # Vmax ermitteln
  if ($F_w >= $plot_data_hyp[sizeof($plot_data_w)-1][2] && $v!=0) {
  	$vmaxtheoarr[]=$v;
  };
};

# Maxmimale Geschwindigkeit theorethisch in km/h
if (isset($vmaxtheoarr)) {$vmaxtheo = $vmaxtheoarr[0];} else {$error[]="ERROR: Theoretical topspeed over ".$max_x_value."km/h? Are you serious? Please check your inputs! Inputs are checked already? Oh my god you are serious... please tell me about your insane project!";}

///////////////////////////////////////////////////////////////////////
// Cut off values > max_y_value from $plot_data_hyp[]:
 foreach ($plot_data_hyp as $key => $hypval) {
 if  ($hypval[2] >= $max_y_value*10) { unset($plot_data_hyp[$key]); } 
  else {
 	 break;
  };
 };
 $plot_data_hyp = array_values($plot_data_hyp); // reindex the array
////////////////////////////////////////////////////////////////////////

# Schleife zum Plotten von $F_haft als Linie
for ($v = 0; $v <= 100; $v += 10) {
  $plot_data_haft[] = array('',$v,$F_haft); # einfuegen in bestehendes array
};

# array aus $motarray aus der Datenbank machen
$motarray=explode(",",$motarray); 

#Zugkraft am Rad ueber Geschwindigkeit

switch ($autoratio) {        # 2=Getriebe 1=NurDiff 0=Direkt 
			case 'Direct drive';   # bei Motormontage direkt an Rad 
					$RATIO=0;   
					# Direktantrieb
					$rpm_value=0;
					foreach ($motarray as &$motarray_value) {
					 	 $v_direkt=$rpm_value*0.377*$r_dyn;
					 	 if ($v_direkt<=$max_x_value) {
					 	 	$F_direkt=$motarray_value/$r_dyn;
					 	  $plot_data_direkt[]=array('',$v_direkt,$F_direkt); 
					 	  $rpm_value=$rpm_value+500; // tbd Genauigkeit 100 rpm in motarray
					 }
					 else {
						  break;
					 }
					} 
					$vmaxdir=round($plot_data_direkt[count($plot_data_direkt)-1][1]);
					break;
			case 'Differential';   # bei Motormontage an Differential
					$RATIO=1;  
					# Nur mit Differential
					$rpm_value=0;
					foreach ($motarray as &$motarray_value) {
					 	 $v_nurdiff=$rpm_value*0.377*$r_dyn/$i_A;
					 	 if ($v_nurdiff<=$max_x_value) {
					 	  $F_nurdiff=$motarray_value*$i_A*$eta_A/$r_dyn;					 	 	
					 	  $plot_data_nurdiff[]=array('',$v_nurdiff,$F_nurdiff); 
					 	  $rpm_value=$rpm_value+500; // tbd Genauigkeit 100 rpm in motarray
					 }
			     else {
			      	break;
			     }					 
					}
					$vmaxdiff=round($plot_data_nurdiff[count($plot_data_nurdiff)-1][1]); 
					break;
	    case 'Gearbox'; 			 # bei Motormontage an Getriebe 
					$RATIO=2; 
					# 1.Gang bis 6.Gang
					# Erstellen einer Funktion fuer alle Gaenge
					function calculate_gear_line_array ($i_G1){
						if ($i_G1!=0) {
								$rpm_value=0;
								global $motarray, $i_A, $eta_G, $eta_A, $r_dyn, $max_x_value;
								foreach ($motarray as &$motarray_value) {
							     $v_gang=$rpm_value*0.377*$r_dyn/($i_A*$i_G1);
							     if ($v_gang <= $max_x_value-1) {
							     	$F_gang=$motarray_value*$i_G1*$i_A*$eta_G*$eta_A/$r_dyn;
								 	 	$plot_data_gang[]=array('',$v_gang,$F_gang); 
								 	 	$rpm_value=$rpm_value+500; // tbd Genauigkeit 100 rpm in motarray
							     }
							     elseif ($v_gang > $max_x_value-1) { // this elseif gets the last value in array as v= 299km/h
							     	$vw1=($rpm_value-500)*0.377*$r_dyn/($i_A*$i_G1); // tbd Genauigkeit 100 rpm in motarray
							     	$vw2=$v_gang;
									  $Fw1=$plot_data_gang[count($plot_data_gang)-1][2];
									  $Fw2=$motarray_value*$i_G1*$i_A*$eta_G*$eta_A/$r_dyn;
									  $m_w=($Fw2-$Fw1)/($vw2-$vw1);
									  $Fw=$Fw1+((($max_x_value-1)-$vw1)*$m_w);	
									  //echo "$i_G1, $Fw<br>";
									  $v_gang=$max_x_value-1; settype($v_gang, "float");
									  $plot_data_gang[]=array('',$v_gang,$Fw);
									  break;
							     } 
							     else {
							      	break;
							     }
								} 
								return ($plot_data_gang);
							} else { return 0;};
					};
					# Aufrufen der Funktion fuer alle Gaenge und Ausgabe des letzten Array-wertes
					$plot_data_gang1=calculate_gear_line_array ($i_G1); $vmax1 = round($plot_data_gang1[count($plot_data_gang1)-1][1]);
					$plot_data_gang2=calculate_gear_line_array ($i_G2); $vmax2 = round($plot_data_gang2[count($plot_data_gang2)-1][1]);
					$plot_data_gang3=calculate_gear_line_array ($i_G3); $vmax3 = round($plot_data_gang3[count($plot_data_gang3)-1][1]);
					$plot_data_gang4=calculate_gear_line_array ($i_G4); $vmax4 = round($plot_data_gang4[count($plot_data_gang4)-1][1]);
					$plot_data_gang5=calculate_gear_line_array ($i_G5); $vmax5 = round($plot_data_gang5[count($plot_data_gang5)-1][1]);
					$plot_data_gang6=calculate_gear_line_array ($i_G6); $vmax6 = round($plot_data_gang6[count($plot_data_gang6)-1][1]);
					
					break; 
};

/////////////////////////////////////////////////////////////////////
// IF 'drawphplot.php' includes this file, then finish here  
// if (isset($drawphplot)) {} else {  // close bracket at end of this file
/////////////////////////////////////////////////////////////////////

#************************************************************************************************
# 3.Maximale Geschwindigkeiten
#************************************************************************************************
# Maximale Geschwindigkeit theorethisch [km/h]

# $vmaxtheo bereits definiert

# Max. Geschwindigkeiten in den einzelnen Gaengen [km/h] falls kleiner Vmax theoretisch

// FUNCTION: Get the intersection point of Motor values and driving resistance line in Graph                                                                               
function get_intersection_point($plot_data_gang1,$plot_data_w){        # tbd geht einfacher mit 'function get_drag_at_v($v)' und vx laufen lassen                
	$lastkey=count($plot_data_gang1)-1;                                 //MUST: $array=array(0=>array(0=>'' 1=>vx 2=>Fx)...)
  $vmax1=round($plot_data_gang1[$lastkey][1]); 
  $Fwmax=$plot_data_w[$vmax1][2]; $Fxmax=$plot_data_gang1[$lastkey][2];    
  // echo "$vmax1<br>$Fwmax<br>$Fxmax<br>"; //FOR CHECK           
	if ($Fwmax > $Fxmax) {
    # Ermitteln von index von $plot_data_gang1, wo Schnittpunkt mit $plot_data_w:
		$Fx=1; $Fw=2; # Anfangswerte fuer for-Schleife
		for ($i = $lastkey; $Fx < $Fw; --$i) { 
		  ### Motorseitig:                             
			$vmax1=$plot_data_gang1[$i][1]; 
			$Fx=   $plot_data_gang1[$i][2];  
		  ### Fahrtwiderstandseitig:          
		  $vw1=floor($vmax1); $vw2=ceil($vmax1);
		  if ($vw1==$vw2) { $vw2=$vw1+1; };
		  $Fw1=$plot_data_w[$vw1][2];
		  $Fw2=$plot_data_w[$vw2][2];
		  $m_w=($Fw2-$Fw1)/($vw2-$vw1);
		  $Fw=$Fw1+(($vmax1-$vw1)*$m_w);
		  // echo "$i.<br>Vw: $vw1,$vmax1,$vw2<br>Fw: $Fw1,$Fw,$Fw1<br>mw: $m_w<br>"; //FOR CHECK
		}
		### Motorseitig: 	             
		$vx1=$plot_data_gang1[$i+1][1]; // $i+1 because $i decrements in last for-loop
		$vx2=$plot_data_gang1[$i+2][1];
		$Fx1=$plot_data_gang1[$i+1][2];
		$Fx2=$plot_data_gang1[$i+2][2];
		$m_x=($Fx2-$Fx1)/($vx2-$vx1);
		# $Fx=$Fx1+(($vmax1-$vx1)*$m_x);
		# Gleichsetzen von $Fw und $Fx liefert genauen Wert von $vmax1:
		# $Fx1+(($vmax1-$vx1)*$m_x) = $Fw1+(($vmax1-$vw1)*$m_w)  -->
		# ($Fx1-$Fw1)= ($vmax1-$vw1)*$m_w - ($vmax1-$vx1)*$m_x   -->
		$vmax1= (($Fx1-$Fw1)-($vx1*$m_x)+($vw1*$m_w))/($m_w-$m_x);
	} 
	return  $vmax1;
};

if (isset($vmax1)&& $vmax1!=0) {$vmax1 = round(get_intersection_point($plot_data_gang1,$plot_data_w));}; 
if (isset($vmax2)&& $vmax2!=0) {$vmax2 = round(get_intersection_point($plot_data_gang2,$plot_data_w));};  
if (isset($vmax3)&& $vmax3!=0) {$vmax3 = round(get_intersection_point($plot_data_gang3,$plot_data_w));}; 
if (isset($vmax4)&& $vmax4!=0) {$vmax4 = round(get_intersection_point($plot_data_gang4,$plot_data_w));};
if (isset($vmax5)&& $vmax5!=0) {$vmax5 = round(get_intersection_point($plot_data_gang5,$plot_data_w));}; 
if (isset($vmax6)&& $vmax6!=0) {$vmax6 = round(get_intersection_point($plot_data_gang6,$plot_data_w));};
if (isset($vmaxdiff)&&$vmaxdiff!=0) {$vmaxdiff = round(get_intersection_point($plot_data_nurdiff,$plot_data_w)) ;};
if (isset($vmaxdir)&&$vmaxdir!=0)  {$vmaxdir =round(get_intersection_point($plot_data_direkt,$plot_data_w)) ;};
#************************************************************************************************


#************************************************************************************************
# 4.Wieviel Leistung noetig f¸r Beschleunigung 0-100km/h, 0-200km/h, 80-120km/h in x Sekunden?
#************************************************************************************************     

# Annahme: 	- Ideale Ausnutzung der Reifenhaftgrenze und der Zugkrafthyperbel
# 					- konst. Drehmoment bis tx und konst. Leistung bis t100

### Fall 1: Reifenkraftschlussgrenze reicht allein aus fuer 0-100 in t 
### Fall 2: Reifenkraftschlussgrenze reicht nicht aus fuer 0-100 in t 
### Fall 3: Reifenkraftschlussgrenze und konst. Leistung fuer 0-100 in t 

# FUNKTION: Errechnen der Zeit zum Erreichen einer Geschwindigeit
# - Ausgehend von F-v Array Daten 
# - Beruecksichtigung der Fahrtwiderstaende mit function get_drag_at_v()
# - Array MUST be of form: $array=array(0=>array(0=>'' 1=>vx 2=>Fx)...)	
function getacctimebyforce($plot_data_gang1,$v100){ #v100 in m/s
	global $mw,$mw_zu,$F_haft;
	$tx=0;
	$last=count($plot_data_gang1)-1;
 	for ($i = 0; $plot_data_gang1[$i][1] < $v100*3.6; $i++) { #v100 in km/h
 		if ($i == $last) {break;}
 		$v1=$plot_data_gang1[$i][1]/3.6; 
 		$v2=$plot_data_gang1[$i+1][1]/3.6; #vx in m/s
 		$F1=$plot_data_gang1[$i][2]-get_drag_at_v($v1*3.6); #vx muss in km/h eingesetzt werden
 		$F2=$plot_data_gang1[$i+1][2]-get_drag_at_v($v2*3.6);
 		if ($F1 > $F_haft) {$F1=$F_haft-get_drag_at_v($v1*3.6);}; # Abschneiden der Kraefte an der Haftgrenze 		
 		if ($F2 > $F_haft) {$F2=$F_haft-get_drag_at_v($v2*3.6);};
 	 	$tx=$tx+(($v2-$v1)*($mw+$mw_zu)/(0.5*($F1+$F2)));
 	}; 
 	# Letzter Bereich bis $v100 linear interpolieren
 	if ($plot_data_gang1[$i][1] > $v100*3.6) {
 	$v1=$plot_data_gang1[$i-1][1]/3.6; 
	$v2=$plot_data_gang1[$i][1]/3.6; #vx in m/s
	$F1=$plot_data_gang1[$i-1][2]-get_drag_at_v($v1*3.6); 
	$F2=$plot_data_gang1[$i][2]-get_drag_at_v($v2*3.6);
	if ($F1 > $F_haft) {$F1=$F_haft-get_drag_at_v($v1*3.6);};	
	if ($F2 > $F_haft) {$F2=$F_haft-get_drag_at_v($v2*3.6);};
	$m=($F2-$F1)/($v2-$v1);
	$Fx=$F1+(($v100-$v1)*$m);
 	$tx=$tx+(($v100-$v1)*($mw+$mw_zu)/(0.5*($F1+$Fx)));
  };
 	return $tx;
}; 	

# FUNKTION: Errechnen der theorethisch minimal noetigen Leistung zum erreichen der Geschwindigkeit von v0 auf v in Zeit t
# - enthaelt die Funktion getacctimebyforce() und get_drag_at_v()
function get_pmin_theo($t100,$v100,$v0) {
	global $mw,$mw_zu,$F_haft,$evmail;
	# Wieviel Leistung noetig f¸r Beschleunigung 0-100km/h in x Sekunden?
	# Ausgangsbasis: Annahme nur Haftgrenze:
	$Pmin=$F_haft*$v100/1000; 					 # 0-100km/h
	# 1.Bereich: Konstante Reifenkraftschlussgrenze
	#		v=a*t   ergibt: t=vx*mw/F_haft
	$vx=$Pmin*1000/$F_haft; # Schnittpunkt von F_haft mit plot_data_hyp - vx in m/s
	$tx=($vx-$v0)*($mw+$mw_zu)/$F_haft;				# 0-100km/h
	if  ($tx > $t100) { ### Fall 2 ###  
		$error= "ERROR: Traction not enough for ".$v0*3.6."-".$v100*3.6."km/h in $t100"."s! Even with drag NOT taken into account.Increase traction by coeff. or axleload, minimize weight or change to AWD.";  
	  return $error;
	}  else {	### Fall 3 ### 
	  if ($v0 == 0) {$Pmin=ceil($Pmin*$tx/$t100);} # Anpassen von Pmin anhand von Verhaeltnis t100 zu tx, nicht bei 80-120km/h
	  $n=1; $switch=false; $a=$Pmin/20; $b=$Pmin/100; $c=0.5; $d=0.01; # Genauigkeit d # Anfangswerte fuer while-Schleife - $Pmin in kW
		while (abs($t100-$tx)>$d) {
			# Veraenderlicher Teil $Pmin 
			# -->
			if ($t100 > $tx and $switch==false) { # $switch als check zum Schleifen sparen
			 	$Pmin=$Pmin-$a; 
			} elseif ($t100 > $tx and $switch==true) {
			 	$Pmin=$Pmin-$c; 
			} else {$Pmin=$Pmin+$b; $switch=true;}	
			# <-- ENDE Veraenderlicher Teil	
			# Erzeugen des Arrays fuer function getacctimebyforce () // tbd kuerzer mit $plot_data_hyp, weil Abschneiden aller Werte groeﬂer als F_haft in der Funktion
			# -->	
			$plot_data_max = array(); //empty previous array first
			$vx=$Pmin*1000/$F_haft; # Schnittpunkt von F_haft mit plot_data_hyp - vx in m/s
			for ($v = 0; $v <= 300 && $v < $vx*3.6; $v += 10) { # $v in km/h
			  $plot_data_max[] = array('',$v,$F_haft);
			}
			if ($vx*3.6!=ceil($vx*3.6/10)*10) {
				$plot_data_max[] = array('',$vx*3.6,$F_haft); # Einfuegen des Schnittpunkts 
				}
			for ($v = ceil($vx*3.6/10)*10; $v <= 300; $v += 10) { # $v in km/h
				$Fmax=round($Pmin*1000/($v/3.6),1); # $v in m/s
			  $plot_data_max[] = array('',$v,$Fmax);
			}
			# <-- ENDE Erzeugen des Arrays
	    if ($v0 != 0) { // tbd static if? or switch-case? for not calling if in every loop
			  $tx= round(getacctimebyforce($plot_data_max,$v100)-getacctimebyforce($plot_data_max,$v0),3); 
			} else {
			 	$tx= round(getacctimebyforce($plot_data_max,$v100),3);
			}
			
			// echo "$n: $t100, $tx , $vx , $Pmin <br>";	// for checking while loop	
			
			//////////////// Troubleshooting: --> ////////////////
			if ($Pmin >= ($F_haft*$v100/1000)+1) { # falls Traktion inkl. Fahrtwiderstaende nicht ausreicht
				$error= "ERROR: Traction not enough for ".$v0*3.6."-".$v100*3.6."km/h in $t100"."s! Drag taken into account. Increase traction by coeff. or axleload, minimize weight or change to AWD.";
			 	return $error;
			}	
			$n++; // for counting while loops 			
			if ($n > 40) { $c=0.1;};
			if ($n > 80) { $d=0.05;};
			if ($n > 200) { //tbd 3.8 @ average throws this ERROR
				$error= "ERROR: Minimum Power required ".$v0*3.6."-".$v100*3.6."km/h in $t100"."s could not be calculated. Please contact EV Wizard via email: $evmail."; 
			  return $error;} 
			//////////////// <-- Troubleshooting ////////////////
		}; // <-- END while
		if (isset($Pmin) && is_float($Pmin)) { 
			$Pmin100=ceil($Pmin);
			return $Pmin100;
		} else {
			 $error= "ERROR: Have you just found a bug??? O_o  Please tell us about it via email: $evmail."; 
			 return $error;
		}		 	
};};

$v0=0;
$Pmin100=get_pmin_theo($t100,$v100,$v0); if (is_float($Pmin100)!=true) {$error[]=$Pmin100;};
$Pmin200=get_pmin_theo($t200,$v200,$v0); if (is_float($Pmin200)!=true) {$error[]=$Pmin200;};
$Pmin812=get_pmin_theo($t812,$v120,$v80); if (is_float($Pmin812)!=true) {$error[]=$Pmin812;};

#************************************************************************************************

#************************************************************************************************
# 5.Maximale Beschleunigungen mit/ohne Getriebe/Diff 
#************************************************************************************************

### Fall 1: Getriebe, Diff oder Direkt -> Checkbox von Form
### Fall 2: Gang1 groeﬂer als Haftgrenze -> Funktion getacctimebyforce reduziert auf F_haft!
### Fall 3: Gang1 reicht nicht aus bis 100km/h, Schalten noetig -> Ein Array aller Gaenge mit bestem Schaltpunkt
### Fall 4: Kraft zu gering um 100km/h zu erreichen -> Schnittpunkt mit F_hyp


# Verzweigung Getriebe, Diff oder Direkt
switch ($autoratio) {        # 2=Getriebe 1=NurDiff 0=Direkt 
		case 'Direct drive';   # bei Motormontage direkt an Rad 
		   // tbd erst checken ob Geschwindikgeiten erreicht mit drag
		   if ($plot_data_direkt[count($plot_data_direkt)-1][1] > $v100*3.6) {
		   	 $t100ist=round(getacctimebyforce($plot_data_direkt,$v100),2);	
		   } else {$t100ist=" "; $error[]="ERROR: ".round($v100*3.6)."km/h not possible with direct drive. Reduce drag or weight 
		   	or increase torque by gear ratio or motor with higher torque if drag is limiting. Increase the rpm limit by reducing gear ratio if top speed is limiting";};
	     if ($plot_data_direkt[count($plot_data_direkt)-1][1] > $v200*3.6) {
	     $t200ist=round(getacctimebyforce($plot_data_direkt,$v200),2);
	     } else {$t200ist=" ";$error[]="ERROR: ".round($v200*3.6)."km/h not possible with direct drive. Reduce drag or weight 
		   	or increase torque by gear ratio or motor with higher torque if drag is limiting. Increase the rpm limit by reducing gear ratio if top speed is limiting.";};
	     if ($plot_data_direkt[count($plot_data_direkt)-1][1] > $v120*3.6) {	
	     $t812ist=round(getacctimebyforce($plot_data_direkt,$v120)-getacctimebyforce($plot_data_direkt,$v80),2);
	     } else {$t812ist=" ";$error[]="ERROR: ".round($v120*3.6)."km/h not possible with direct drive. Reduce drag or weight 
		   	or increase torque by gear ratio or motor with higher torque if drag is limiting. Increase the rpm limit by reducing gear ratio if top speed is limiting.";};
	     break;   
	                                         
    case 'Differential';   # bei Motormontage an Differential
	     // tbd erst checken ob Geschwindikgeiten erreicht mit drag
		   if ($plot_data_nurdiff[count($plot_data_nurdiff)-1][1] > $v100*3.6) {
		   	 $t100ist=round(getacctimebyforce($plot_data_nurdiff,$v100),2);	
		   } else {$t100ist=" "; $error[]="ERROR: ".round($v100*3.6)."km/h not possible with motor mounted on differential. Reduce drag or weight 
		   	or increase torque by gear ratio or motor with higher torque if drag is limiting. Increase the rpm limit by reducing gear ratio if top speed is limiting.";};
	     if ($plot_data_nurdiff[count($plot_data_nurdiff)-1][1] > $v200*3.6) {
	     $t200ist=round(getacctimebyforce($plot_data_nurdiff,$v200),2);
	     } else {$t200ist=" ";$error[]="ERROR: ".round($v200*3.6)."km/h not possible with motor mounted on differential. Reduce drag or weight 
		   	or increase torque by gear ratio or motor with higher torque if drag is limiting. Increase the rpm limit by reducing gear ratio if top speed is limiting.";};
	     if ($plot_data_nurdiff[count($plot_data_nurdiff)-1][1] > $v120*3.6) {	
	     $t812ist=round(getacctimebyforce($plot_data_nurdiff,$v120)-getacctimebyforce($plot_data_nurdiff,$v80),2);
	     } else {$t812ist=" ";$error[]="ERROR: ".round($v120*3.6)."km/h not possible with motor mounted on differential. Reduce drag or weight 
		   	or increase torque by gear ratio or motor with higher torque if drag is limiting. Increase the rpm limit by reducing gear ratio if top speed is limiting.";};
	     break;     
                                              
    case 'Gearbox'; 			 # bei Motormontage an Getriebe  
       // erst checken ob Geschwindikgeiten erreicht mit drag
       
/*       
       # Schaltpunkte, Gesamtarray  //tbd wenn keine Schnittpunkte, und trotzdem v_gang2 groesser als v_gang1, weitermachen
       # FUNKTION: Errechnet Schalt-Schnittpunkt (Geschwindigkeit) zwischen zwei Gaengen und stellt Gesamtarray $plot_data_gear zusammen
       # - Array MUST be of form: $array=array(0=>array(0=>'' 1=>vx 2=>Fx)...)	
       # - Verifiziert ob Gang vorhanden
       function getgearchangevelo($plot_data_gang1,$plot_data_gang2,$v0) { # $v0 in km/h
       	// tbd check ob gang data ungleich 0
       	  # Anfangswerte
       	  $i=0;$j=0;
       	  $lastkey1=count($plot_data_gang1)-1;
       	  $lastkey2=count($plot_data_gang2)-1;
       	  // tbd verifizieren ob 2.Gang vorhanden    <----------------------------------------------------------
					for ($v = $v0; $v <= 300; $v++) { # v in km/h
							# 1.Gang
							if ($v < $plot_data_gang1[$lastkey1][1]) { # v groeﬂer Endgeschwindigkeit 1.Gang -> Schalten
								if ($v > $plot_data_gang1[$i+1][1]) {$i++;} # v groeﬂer Segment -> naechstes Segment
								if ($v > $plot_data_gang1[$i+1][1]) {       # falls v immer noch groeﬂer (bei hoeheren Gaengen)
									for ($i = $i; $i < $lastkey1-1; $i++) {
									 	 if ($v > $plot_data_gang1[$i+1][1]) {} else {break;} # v in km/h 
									}}
								if ($i > $lastkey1-1) {break;}              # letztes Segment erreicht -> Schalten
									else {
				            $v11=$plot_data_gang1[$i][1]; 
										$v12=$plot_data_gang1[$i+1][1];          
									  $F11=$plot_data_gang1[$i][2];
									  $F12=$plot_data_gang1[$i+1][2];
									  $m_w1=($F12-$F11)/($v12-$v11);
									  $Fv1=$F11+(($v-$v11)*$m_w1); # Zugkraft bei Laufvariable v in km/h
									}
						  } else {break;}
						  # 2.Gang
						  if ($v > $plot_data_gang2[$j+1][1]) {$j++;}
							if ($v > $plot_data_gang2[$j+1][1]) {       # falls v immer noch groeﬂer (bei hoeheren Gaengen)
								for ($j = $j; $j < $lastkey2-1; $j++) {
								 	 if ($v > $plot_data_gang2[$j+1][1]) {} else {break;} # v in km/h 
								}}						  
						  if ($j > $lastkey2-1) {break;} 
	            $v21=$plot_data_gang2[$j][1]; 
							$v22=$plot_data_gang2[$j+1][1];          
						  $F21=$plot_data_gang2[$j][2];
						  $F22=$plot_data_gang2[$j+1][2];
						  $m_w2=($F22-$F21)/($v22-$v21);
						  $Fv2=$F21+(($v-$v21)*$m_w2);
						  # Groeﬂeren Wert weitergeben
			        if ($Fv1 > $Fv2) {$Fv=$Fv1;} else {$Fv=$Fv2; $plot_data_gear[]=array('',$v,$Fv); break;}
			        # Zusammengesetztes Array erstellen
	            $plot_data_gear[]=array('',$v,$Fv);
	            
					}
	        return ($plot_data_gear);
       };
       # Ausfuehren der Funktion 
       $v0=0; # v in km/h
       $plot_data_gear1=getgearchangevelo($plot_data_gang1,$plot_data_gang2,$v0);
       $v0=$plot_data_gear1[count($plot_data_gear1)-1][1]+1; # Endgeschwindigkeit v in km/h als Anfangswert
       $plot_data_gear2=getgearchangevelo($plot_data_gang2,$plot_data_gang3,$v0);
       $v0=$plot_data_gear2[count($plot_data_gear2)-1][1]+1; # Endgeschwindigkeit v in km/h als Anfangswert
       $plot_data_gear3=getgearchangevelo($plot_data_gang3,$plot_data_gang4,$v0);
       $v0=$plot_data_gear3[count($plot_data_gear3)-1][1]+1; # Endgeschwindigkeit v in km/h als Anfangswert
       $plot_data_gear4=getgearchangevelo($plot_data_gang4,$plot_data_gang5,$v0);
       $v0=$plot_data_gear4[count($plot_data_gear4)-1][1]+1; # Endgeschwindigkeit v in km/h als Anfangswert
       $plot_data_gear5=getgearchangevelo($plot_data_gang5,$plot_data_gang6,$v0);
       $plot_data_gear=array_merge_recursive($plot_data_gear1,$plot_data_gear2,$plot_data_gear3,$plot_data_gear4,$plot_data_gear5); #Arrays verbinden
       // tbd restliche Datenpunkte von 6.Gang mit in Array aufnehmen
       
       # Zeiten ermitteln
       $t100ist=round(getacctimebyforce($plot_data_gear,$v100),2);
       $t200ist=round(getacctimebyforce($plot_data_gear,$v200),2); 
//       $t812ist=round(getacctimebyforce($plot_data_gear,$v120)-getacctimebyforce($plot_data_gang,$v80),2);   // tbd haengt!!!
*/
	     break; 	           
};

#************************************************************************************************

/*

//$something=array($t100ist,$t200ist,$t812ist);  

// Zur Kontrolle:  
$nodrawphplot=true; print "<pre>"; print_r($plot_data_gang1); print "</pre>";
//*/


//////////////////////// WEITERE VERWENDUNG: ///////////////////////////////////
//  Ergebnisdaten senden an resultsform (aufgerufen in 'results_to_form.php')
//  	echo json_encode($F_haft);

// Daten im iframe als Graph ausgeben (aufgerufen in 'drawphplot.php')
// include'drawphplot.php';
////////////////////////////////////////////////////////////////////////////////

/* 
	ToDo:

	- Viertelmeile in welcher Zeit und mit welcher Geschwindikeit am Ziel
	- E-Motor motarray generator: create your own Motor torque curve with Max Torque and Max Power
  - Reichweite NEFZ/ Stuttgart Zyklus
  - Batterieverschaltung, nur logische Moeglichkeiten
  - Beschleunigungen 0-100/0-200 mit Gaengen oder nur Diff/Direkt
  - im Code nach tbd suchen!!
  
  - jqplot.com/examples/kcp_engel.php !!!
  - Flot !!!

*/

?>