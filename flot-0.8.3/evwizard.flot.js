/////////////////////////////////////////////////////////////////////
// RESULTS: Put result data into form when click on 'Calculate Graph'-Button  
/////////////////////////////////////////////////////////////////////
$(document).ready(function() {
	data = [[0,0]]
	options = {	xaxis: { axisLabel: "Velocity in km/h",
                       ticks: 15, min: 0, max: 300,	zoomRange: [0.1, 10],panRange: [0, 300]},
						  yaxis: { ticks: 10, min: 0, max: 10000,	zoomRange: [0.1, 10],panRange: [0, 20000]},												  
					  };
	$.plot("#flotbox",data,options);

  $('#calcbutton').click(function(){
				$('#errorlog').html("EV Wizard is calculating for you...");
				$.ajax({
					  type: 'POST',
					  dataType: 'json',
					  url: "mainform/results_to_form.php",
					  data: $('#mainform').serialize(),
					  success: 
						function(data) {
					    document.getElementById('id_autogrip').value = data.F_haft;
					    document.getElementById('id_autotopspeedtheo').value = data.vmaxtheo;
					    document.getElementById('id_autotopspeed1').value = data.vmax1;
					    document.getElementById('id_autotopspeed2').value = data.vmax2;
					    document.getElementById('id_autotopspeed3').value = data.vmax3;
					    document.getElementById('id_autotopspeed4').value = data.vmax4;
					    document.getElementById('id_autotopspeed5').value = data.vmax5;
					    document.getElementById('id_autotopspeed6').value = data.vmax6;
					    document.getElementById('id_autotopspeeddiff').value = data.vmaxdiff;
					    document.getElementById('id_autotopspeeddirect').value = data.vmaxdir;
					    document.getElementById('id_autoacc0100').value = data.t100ist;
					    document.getElementById('id_autoacc0200').value = data.t200ist;
					    document.getElementById('id_autoacc812').value = data.t812ist;
					    document.getElementById('id_autopmin100').value = data.Pmin100;
					    document.getElementById('id_autopmin200').value = data.Pmin200;
					    document.getElementById('id_autopmin812').value = data.Pmin812;
					    $('#errorlog').html(data.error); // insert errors in div-element

					    // Plot Flot
					    var plotdatagang1=[];var plotdatagang2=[];var plotdatagang3=[];var plotdatagang4=[];var plotdatagang5=[];
					    var plotdatagang6=[];var plotdatadiff=[];var plotdatadirekt=[];var plotdatahyp=[];var plotdatadrag=[];var plotdatahaft=[];
							for (keys in data.plot_data_gang1) {plotdatagang1.push([data.plot_data_gang1[keys][1],data.plot_data_gang1[keys][2]]);}
							for (keys in data.plot_data_gang2) {plotdatagang2.push([data.plot_data_gang2[keys][1],data.plot_data_gang2[keys][2]]);}
							for (keys in data.plot_data_gang3) {plotdatagang3.push([data.plot_data_gang3[keys][1],data.plot_data_gang3[keys][2]]);}
							for (keys in data.plot_data_gang4) {plotdatagang4.push([data.plot_data_gang4[keys][1],data.plot_data_gang4[keys][2]]);}
							for (keys in data.plot_data_gang5) {plotdatagang5.push([data.plot_data_gang5[keys][1],data.plot_data_gang5[keys][2]]);}
							for (keys in data.plot_data_gang6) {plotdatagang6.push([data.plot_data_gang6[keys][1],data.plot_data_gang6[keys][2]]);}
							for (keys in data.plot_data_nurdiff) {plotdatadiff.push([data.plot_data_nurdiff[keys][1],data.plot_data_nurdiff[keys][2]]);}
							for (keys in data.plot_data_direkt) {plotdatadirekt.push([data.plot_data_direkt[keys][1],data.plot_data_direkt[keys][2]]);}
							for (keys in data.plot_data_hyp) {plotdatahyp.push([data.plot_data_hyp[keys][1],data.plot_data_hyp[keys][2]]);}
							for (keys in data.plot_data_w) {plotdatadrag.push([data.plot_data_w[keys][1],data.plot_data_w[keys][2]]);}
							for (keys in data.plot_data_haft) {plotdatahaft.push([data.plot_data_haft[keys][1],data.plot_data_haft[keys][2]]);}
							options = {	axisLabels: {show: true},
													xaxis: {  axisLabel: "World Cities",
														        axisLabelUseCanvas: true,
														        axisLabelFontSizePixels: 12,
														        axisLabelFontFamily: 'Verdana, Arial',
														        axisLabelPadding: 10, 
                                    ticks: 15, min: 0, max: 300,	zoomRange: [0.1, 10],panRange: [0, 300]},
												  yaxis: { ticks: 10, min: 0, max: 10000,	zoomRange: [0.1, 10],panRange: [0, 20000]},												  
												  grid: { hoverable: true},
												  zoom: { interactive: true},
													pan: { interactive: true}
												  };
							$.plot("#flotbox",[
								{ label: "Max. grip",    data: plotdatahaft,   color: "#afafaf", shadowSize: 0}, //lineWidth: 1
							  { label: "Max. force",   data: plotdatahyp,    color: "#ededed", shadowSize: 0},
								{ label: "Drag",         data: plotdatadrag,   color: "#afafaf", shadowSize: 0},
								{ label: "1st gear",     data: plotdatagang1,  color: "#0a32ff", shadowSize: 1},
								{ label: "2nd gear",     data: plotdatagang2,  color: "#c13424", shadowSize: 1},
								{ label: "3rd gear",     data: plotdatagang3,  color: "#0c9900", shadowSize: 1},
								{ label: "4th gear",     data: plotdatagang4,  color: "#9007ff", shadowSize: 1},
								{ label: "5th gear",     data: plotdatagang5,  color: "#a55d00", shadowSize: 1},
								{ label: "6th gear",     data: plotdatagang6,  color: "#00d6dd", shadowSize: 1},
								{ label: "Final gear",   data: plotdatadiff,   color: "#f9ed00", shadowSize: 1},
								{ label: "Direct drive", data: plotdatadirekt, color: "#35ff6e", shadowSize: 1}
							],options);
					    // $('#flotbox').html(plotdatagang1); // Show data as text 
						}
				});
  });
});
/////////////////////////////////////////////////////////////////////
