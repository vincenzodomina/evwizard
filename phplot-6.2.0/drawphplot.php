<?php
/* 
** PHPlot is a PHP class for creating scientific and business charts.
** Version: PHPlot-6.2.0 on 2015-11-03 
** Website: http://sourceforge.net/projects/phplot/
** This 'drawphplot.php' is standalone with 'phplot.php'
*/

// DATA: //////////////////////////////////////////////////////////
//  Calculate lines with posted data, or put out empty plot
if($_POST)
{
include'../calcplotdata.php';
}
else {
	$plot_data_hyp  = array(array('',0,0,0),);
	$plot_data_w    = array(array('',0,0,0),);
	$plot_data_haft = array(array('',0,0,0),);
	$max_x_value=300;
	$max_y_value=10000;
}
/* Cut off data in $plot_data, that is out off graph range --tbd--
if ($plot_data('','',0<$value<$max_y_value)=false) {
 	  $plot_data('','','')
} 
//*/
////////////////////////////////////////////////////////////////////

// To check calcplotdata.php in iframe, do noting here when $nodrawphplot is defined in calcplotdata.php
if (isset($nodrawphplot)) {} 
else {

// Include the phplot-code
require_once 'phplot.php';

// Create a PHPlot object with 800x600 pixel image
$plot = new PHPlot(700,400);
$plot->SetPrintImage(False); // Defer output until the end
// Define graph range values
// $max_x_value=300; specified in 'calcplotdata.php'
// $max_y_value=10000; specified in 'calcplotdata.php'
// Use exactly this data range:
$plot->SetPlotAreaWorld(0, 0,$max_x_value,$max_y_value);

// Data type 'data-data' is used to include X values in data points
$plot->SetDataType('data-data');
$plot->SetDataValues($plot_data_hyp); 

// Turn on Y Data Labels: Both total and segment labels:
$plot->SetYDataLabelPos('plotstack');  

// Set titles
$plot->SetTitle("Fahrleistungsschaubild");
$plot->SetXTitle('Geschwindigkeit in km/h');
$plot->SetYTitle('Antriebskraft in N');

// Make a legend for the functions
$plot->SetLegend(array('Hyp. of max. force','Driv. resistance','Maximum Grip','1st gear','2nd gear','3rd gear','4th gear','5th gear','6th gear','Final gear','Direct drive'));

// Border and plot type
// $plot->SetImageBorderType('plain');
$plot->SetPlotType('lines');   

// Make the lines a bit wider:
$plot->SetLineWidths(2);

// Draw both grids:
$plot->SetDrawXGrid(True);
$plot->SetDrawYGrid(True);

// Draw the first part in graph
$plot->DrawGraph();

// 1.Gang bis 6.Gang und Nurdiff- und Direktantrieb
// Erstellen einer Funktion fuer alle Gaenge
function prepare_next_set_of_lines ($plot_data_next,$line_color)
{
	if ($plot_data_next != 0) {
		
		global $plot;
		// Prepare next set of lines
		$plot->SetDataColors($line_color);
		$plot->SetDataType('data-data');
		$plot->SetDataValues($plot_data_next); 
		$plot->SetPlotType('lines'); 
		$plot->SetLineWidths(2);
		$plot->SetYDataLabelPos('none'); // Need to turn these off
		$plot->SetLegend(NULL); // Cancel legend
		// Draw the next part in graph
		$plot->DrawGraph(); 	
	}

}
// Aufrufen der Funktion fuer Fahrtwiderstand und Haftgrenze
prepare_next_set_of_lines ($plot_data_w,'green');
prepare_next_set_of_lines ($plot_data_haft,'orange');

// Aufrufen der Funktion fuer alle Gaenge, falls $autoratio definiert ist, ansonsten defaultplot
if (isset($autoratio)) {
switch ($autoratio) {        # 2=Getriebe 1=NurDiff 0=Direkt 
			case 'Direct drive';   # bei Motormontage direkt an Rad 
				prepare_next_set_of_lines ($plot_data_direkt,'SlateBlue');
				break;
			case 'Differential';   # bei Motormontage an Differential
				prepare_next_set_of_lines ($plot_data_nurdiff,'salmon');
				break;
	    case 'Gearbox'; 			 # bei Motormontage an Getriebe 
				prepare_next_set_of_lines ($plot_data_gang1,'blue');
				prepare_next_set_of_lines ($plot_data_gang2,'red');
				prepare_next_set_of_lines ($plot_data_gang3,'DarkGreen');
				prepare_next_set_of_lines ($plot_data_gang4,'purple');
				prepare_next_set_of_lines ($plot_data_gang5,'peru');
				prepare_next_set_of_lines ($plot_data_gang6,'cyan');
				break;	 				
}	
}	 
	
// Finally print out deferred output
$plot->PrintImage();


} // close $nodrawphplot
?>


