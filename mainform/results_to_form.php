<?php
include '../calcplotdata.php';

// Result data
//check if available else space
if (isset($F_haft)) {} 		else {$F_haft=" ";};
if (isset($vmaxtheo)) {} 	else {$vmaxtheo=" ";};
if (isset($vmax1)) {} 		else {$vmax1=" ";};
if (isset($vmax2)) {} 		else {$vmax2=" ";};
if (isset($vmax3)) {} 		else {$vmax3=" ";};
if (isset($vmax4)) {} 		else {$vmax4=" ";};
if (isset($vmax5)) {} 		else {$vmax5=" ";};
if (isset($vmax6)) {} 		else {$vmax6=" ";};
if (isset($vmaxdiff)) {} 	else {$vmaxdiff=" ";};
if (isset($vmaxdir)) {} 	else {$vmaxdir=" ";};
if (isset($t100ist)) {} 	else {$t100ist=" ";};
if (isset($t200ist)) {} 	else {$t200ist=" ";};
if (isset($t812ist)) {} 	else {$t812ist=" ";};
if (isset($Pmin100)) {} 	else {$Pmin100=" ";};
if (isset($Pmin200)) {} 	else {$Pmin200=" ";};
if (isset($Pmin812)) {} 	else {$Pmin812=" ";};
if (isset($error)) {
	foreach ($error as $err) { $e[]="$err<br>";};
		$error=implode($e);
} 	else {$error="No errors?? Tell EV Wizard how you did that! What have you typed in? Please write to: $evmail ";};
if (isset($plot_data_gang1)) {} else {$plot_data_gang1=" ";};
if (isset($plot_data_gang2)) {} else {$plot_data_gang2=" ";};
if (isset($plot_data_gang3)) {} else {$plot_data_gang3=" ";};
if (isset($plot_data_gang4)) {} else {$plot_data_gang4=" ";};
if (isset($plot_data_gang5)) {} else {$plot_data_gang5=" ";};
if (isset($plot_data_gang6)) {} else {$plot_data_gang6=" ";};
if (isset($plot_data_nurdiff)) {} else {$plot_data_nurdiff=" ";};
if (isset($plot_data_direkt)) {} else {$plot_data_direkt=" ";};
if (isset($plot_data_hyp)) {} else {$plot_data_hyp=" ";};
if (isset($plot_data_w)) {} else {$plot_data_w=" ";};
if (isset($plot_data_haft)) {} else {$plot_data_haft=" ";};
if (isset($autoratio)) {} else {$autoratio="Gearbox";};

$encoded_variables = array( 'F_haft' 		=> $F_haft,
														'vmaxtheo'	=> $vmaxtheo,
														'vmax1'			=> $vmax1,
														'vmax2'			=> $vmax2,
														'vmax3'			=> $vmax3,
														'vmax4'			=> $vmax4,
														'vmax5'			=> $vmax5,
														'vmax6'			=> $vmax6,
														'vmaxdiff'	=> $vmaxdiff,
														'vmaxdir'		=> $vmaxdir,
														't100ist' 	=> $t100ist,
														't200ist' 	=> $t200ist,
														't812ist'   => $t812ist,
														'Pmin100' 	=> $Pmin100,
														'Pmin200' 	=> $Pmin200,
														'Pmin812' 	=> $Pmin812,
														'error'			=> $error,
														'plot_data_gang1' => $plot_data_gang1,
														'plot_data_gang2' => $plot_data_gang2,
														'plot_data_gang3' => $plot_data_gang3,
														'plot_data_gang4' => $plot_data_gang4,
														'plot_data_gang5' => $plot_data_gang5,
														'plot_data_gang6' => $plot_data_gang6,
														'plot_data_nurdiff' => $plot_data_nurdiff,
														'plot_data_direkt' => $plot_data_direkt,
														'plot_data_hyp' => $plot_data_hyp,
														'plot_data_w' => $plot_data_w,
														'plot_data_haft' => $plot_data_haft,
														'autoratio' => $autoratio,
													);
                       
echo json_encode($encoded_variables);
?>