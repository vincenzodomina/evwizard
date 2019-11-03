/////////////////////////////////////////////////////////////////////
// Mainform collapse data of car, motor, battery dropdown
$(document).ready(function(){
	$("#cardata").hide();
  $("#cardatabutton").click(function(){
      $("#cardata").toggle();
  });
  $("#motdata").hide();
  $("#motdatabutton").click(function(){
      $("#motdata").toggle();
  });
  $("#battdata").hide();
  $("#battdatabutton").click(function(){
      $("#battdata").toggle();
  });
  $("#resultsdata").hide();
  $("#calcbutton").click(function(){
  	  $("#clickcalcparagraph").hide();
      $("#resultsdata").show();
  });
  $("#advanceddata").hide();
  $("#advanceddatabutton").click(function(){
      $("#advanceddata").toggle();
  }); 
});
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
// Open databases in modal
$(document).ready(function(){
  $("#id_cdb_btn").click(function(){
  	event.preventDefault()
    var win = window.open('displaydb/displaycardb.php', '_blank');
		if (win) {win.focus();} else {alert('Please allow popups for this website');} // tbd löschen wenn als modal
    });
  $("#id_mdb_btn").click(function(){
  	event.preventDefault()
    var win = window.open('displaydb/displaymotordb.php', '_blank');
		if (win) {win.focus();} else {alert('Please allow popups for this website');}
    });
  $("#id_bdb_btn").click(function(){
  	event.preventDefault()
    var win = window.open('displaydb/displaybattdb.php', '_blank');
		if (win) {win.focus();} else {alert('Please allow popups for this website');}
    });        
});
/////////////////////////////////////////////////////////////////////

//  inspired by SOURCE:
//  http://www.99points.info/2010/06/ajax-tutorial-dynamic-loading-of-combobox-using-jquery-and-ajax-in-php/

/////////////////////////////////////////////////////////////////////
// AUTO: Select Make and get models:	
/////////////////////////////////////////////////////////////////////

$(document).ready(function() {

	$('#auto_search_category_id').change(function(){

		$.post("mainform/get_child_categories_auto.php", {
			parent_id: $('#auto_search_category_id').val(),
		}, function(response){
			
			setTimeout("finishAjax('auto_show_sub_categories', '"+escape(response)+"')", 400);
		});
		return false;
	});
}); 	
	
function finishAjax(id, response){
  $('#'+id).html(unescape(response));
};	
/////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////
// AUTO: Select model and put data into form:  
/////////////////////////////////////////////////////////////////////

$(document).ready(function() {
	  
	$("#auto_show_sub_categories").change(function() {

      document.getElementById('id_automake').value = $('#auto_search_category_id').val();
      document.getElementById('id_automodel').value = $('#auto_sub_category_id').val();

			if (window.XMLHttpRequest) {
		          // code for IE7+, Firefox, Chrome, Opera, Safari
		          xmlhttp = new XMLHttpRequest();
		      } else {
		          // code for IE6, IE5
		          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		      }
		      xmlhttp.onreadystatechange = function() {
		          if (this.readyState == 4 && this.status == 200) {
		          	  var responsecardata = JSON.parse(xmlhttp.responseText);
		          	  // alert(responsecardata['autoyear']);
		              document.getElementById('id_autoyear').value = 				responsecardata['autoyear'];
		              document.getElementById('id_autoweight').value = 			responsecardata['autoweight'];
		              document.getElementById('id_autocd').value = 					responsecardata['autocd'];
		              document.getElementById('id_autofrontalarea').value = responsecardata['autofrontalarea'];
		              document.getElementById('id_autocda').value = 				responsecardata['autocda'];
		              document.getElementById('id_autogear1').value = 			responsecardata['autogear1'];
		              document.getElementById('id_autogear2').value = 			responsecardata['autogear2'];
		              document.getElementById('id_autogear3').value = 			responsecardata['autogear3'];
		              document.getElementById('id_autogear4').value = 			responsecardata['autogear4'];
		              document.getElementById('id_autogear5').value = 			responsecardata['autogear5'];
		              document.getElementById('id_autogear6').value = 			responsecardata['autogear6'];
		              document.getElementById('id_autogearfinal').value = 	responsecardata['autogearfinal'];
		              document.getElementById('id_autodrive').value = 			responsecardata['autodrive'];
		              document.getElementById('id_autotirewidth').value = 	responsecardata['autotirewidth'];
		              document.getElementById('id_autotireheight').value = 	responsecardata['autotireheight'];
		              document.getElementById('id_autowheelsize').value = 	responsecardata['autowheelsize'];
		          }
		      }    
	        xmlhttp.open("GET","mainform/get_auto_data_from_db.php?q="+$('#auto_sub_category_id').val(),true);  
	        xmlhttp.send();         
	});

}); 
/////////////////////////////////////////////////////////////////////
// OR WITH getJSON:
// source: http://stackoverflow.com/questions/558445/dynamically-fill-in-form-values-with-jquery
/*
$(document).ready(function() {
	  
	$("#show_sub_categories").change(function() {
  $.getJSON("mainform/get_auto_data_from_db.php?q="+$('#sub_category_id').val(),
        function(){
	      	  // alert(responsecardata['autoyear']);
	      	  var responsecardata = JSON.parse(xmlhttp.responseText);
	          document.getElementById('id_autoyear').value = 				responsecardata['autoyear'];
        });
  });
});
*/

/////////////////////////////////////////////////////////////////////
// MOTORS: Select Make and get models:	
/////////////////////////////////////////////////////////////////////

$(document).ready(function() {

	$('#mot_search_category_id').change(function(){
		
		$.post("mainform/get_child_categories_mot.php", {
			parent_id: $('#mot_search_category_id').val(),
		}, function(response){
			
			setTimeout("finishAjax('mot_show_sub_categories', '"+escape(response)+"')", 400);
		});
		return false;
	});
}); 	
	
function finishAjax(id, response){
  $('#'+id).html(unescape(response));
};	
/////////////////////////////////////////////////////////////////////
// MOTOR: Select model and put data into form:  
/////////////////////////////////////////////////////////////////////

$(document).ready(function() {
	  
	$("#mot_show_sub_categories").change(function() {

      document.getElementById('id_motmake').value = $('#mot_search_category_id').val();
      document.getElementById('id_motmodel').value = $('#mot_sub_category_id').val();

			if (window.XMLHttpRequest) {
		          // code for IE7+, Firefox, Chrome, Opera, Safari
		          xmlhttp = new XMLHttpRequest();
		      } else {
		          // code for IE6, IE5
		          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		      }
		      xmlhttp.onreadystatechange = function() {
		          if (this.readyState == 4 && this.status == 200) {
		          	  var responsecardata = JSON.parse(xmlhttp.responseText);
		          	  // alert(responsecardata['autoyear']);
		              document.getElementById('id_motmake').value = 		responsecardata['motmake'];
		              document.getElementById('id_motmodel').value = 		responsecardata['motmodel'];
		              document.getElementById('id_motacdc').value = 		responsecardata['motacdc'];
		              document.getElementById('id_motprice').value = 		responsecardata['motprice'];
		              document.getElementById('id_motweight').value = 	responsecardata['motweight'];
		              document.getElementById('id_motpow').value = 			responsecardata['motpow'];
		              document.getElementById('id_mottorq').value = 		responsecardata['mottorq'];
		              document.getElementById('id_motcontrpm').value =	responsecardata['motcontrpm'];
		              document.getElementById('id_motpeakrpm').value =	responsecardata['motpeakrpm'];
		              document.getElementById('id_motvolt').value = 		responsecardata['motvolt'];
		              document.getElementById('id_moteff').value = 			responsecardata['moteff'];
		              document.getElementById('id_motdealer').value = 	responsecardata['motdealer'];
		              document.getElementById('id_motpricedate').value =responsecardata['motpricedate'];
		              document.getElementById('id_motarray').value = 		responsecardata['motarray'];
		          }
		      }    
	        xmlhttp.open("GET","mainform/get_mot_data_from_db.php?q="+$('#mot_sub_category_id').val(),true);  
	        xmlhttp.send();         
	});

}); 
/////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////
// BATTERY: Select Make and get models:	
/////////////////////////////////////////////////////////////////////

$(document).ready(function() {

	$('#batt_search_category_id').change(function(){
//		$('#batt_show_sub_categories').fadeOut();
		
		$.post("mainform/get_child_categories_batt.php", {
			parent_id: $('#batt_search_category_id').val(),
		}, function(response){
			
			setTimeout("finishAjax('batt_show_sub_categories', '"+escape(response)+"')", 400);
		});
		return false;
	});
}); 	
	
function finishAjax(id, response){
  $('#'+id).html(unescape(response));
//  $('#'+id).fadeIn();
};	
/////////////////////////////////////////////////////////////////////
// BATTERY: Select model and put data into form:  
/////////////////////////////////////////////////////////////////////

$(document).ready(function() {
	  
	$("#batt_show_sub_categories").change(function() {

      document.getElementById('id_battmake').value = $('#batt_search_category_id').val();
      document.getElementById('id_battmodel').value = $('#batt_sub_category_id').val();

			if (window.XMLHttpRequest) {
		          // code for IE7+, Firefox, Chrome, Opera, Safari
		          xmlhttp = new XMLHttpRequest();
		      } else {
		          // code for IE6, IE5
		          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		      }
		      xmlhttp.onreadystatechange = function() {
		          if (this.readyState == 4 && this.status == 200) {
		          	  var responsebattdata = JSON.parse(xmlhttp.responseText);
		          	  // alert(responsecardata['autoyear']);
		              document.getElementById('id_battmake').value = 		responsebattdata['battmake'];
		              document.getElementById('id_battmodel').value = 		responsebattdata['battmodel'];
		              document.getElementById('id_battvolt').value = 		responsebattdata['battvolt'];
		              document.getElementById('id_battcapa').value = 		responsebattdata['battcapa'];
		              document.getElementById('id_battdisc').value = 		responsebattdata['battdisc'];
		              document.getElementById('id_battprice').value = 		responsebattdata['battprice'];
		              document.getElementById('id_battweight').value = 	responsebattdata['battweight'];
		              document.getElementById('id_battchem').value = 			responsebattdata['battchem'];
		              document.getElementById('id_battdealer').value = 	responsebattdata['battdealer'];
		              document.getElementById('id_battpricedate').value =responsebattdata['battpricedate'];
		              document.getElementById('id_battcomment').value = 		responsebattdata['battcomment'];
		          }
		      }    
	        xmlhttp.open("GET","mainform/get_batt_data_from_db.php?q="+$('#batt_sub_category_id').val(),true);  
	        xmlhttp.send();         
	});

}); 
/////////////////////////////////////////////////////////////////////



