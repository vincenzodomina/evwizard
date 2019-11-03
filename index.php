<?php /*display all notice/warnings/errors while developing */
	error_reporting(E_ALL);
	ini_set("display_errors", TRUE);
	
	/*include_once('vendor/autoload.php');
	
	$validator = new Zend\Validator\Emailaddress();
	
	if($validator->isValid("bs.privat--/@.com")) {
		echo "valide";
	}
	
	var_dump($validator); */
?>	
<!DOCTYPE html>
<!--
#########################################################
############   EV Wizard 1.0: evwizard.php   ############
#########################################################
Copyright (C) 2016 Vincenzo Domina -->
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>EV Wizard</title>
	<!-- Responsive Design -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- W3.css Framework: http://www.w3schools.com/lib/w3.css -->
	<!-- <link type="text/css" rel="stylesheet" href="css/w3.css">
	<!-- Bootstrap CDN - Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
	<!-- Bootstrap fonts -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	<!-- Gooogle fonts --> 
	<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro|Cookie" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="css/footer-distributed-with-address-and-phones.css">
	<!-- Main.css with automatic version verification, so no more need for manual browser cache delete when new version of css-file -->
	<link type="text/css" rel="stylesheet" href="css/main.css?v=<?php echo filemtime('css/main.css'); ?>">
	<!-- skripts for dropdown menue -->
	<script type="text/javascript" src="mainform/jquery-1.3.2.js"></script>
	<script type="text/javascript" src="mainform/get_child_categories_auto.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<!-- FLOT jquery Plots https://github.com/flot -->
	<script type="text/javascript" src="flot-0.8.3/jquery.flot.min.js"></script>
	<script type="text/javascript" src="flot-0.8.3/jquery.flot.navigate.min.js"></script>
	<script type="text/javascript" src="flot-0.8.3/jquery.flot.axislabels.js"></script>
	<script type="text/javascript" src="flot-0.8.3/evwizard.flot.js"></script>

</head>
<body class="bgcolor-ev2">
<header>
 <section id="home">
     <!-- Navbar Starts -->   
   <nav class="navbar navbar-inverse navbar-static-top">
     <div class="container-fluid">
        <!-- Brand -->
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php"><h3>EV <span>Wizard</span></h3></a>
        </div>
         <ul class="nav navbar-nav">
           <li><a href="#home"><h4>Home</h4></a></li>
           <li><a href="#calculator"><h4>Calculator</h4></a></li>
           <li><a href="#home"><h4>Blog</h4></a></li>
           <li><a href="#home"><h4>FAQ</h4></a></li>
           <li><a href="#contact"><h4>About us</h4></a></li>
           <li><a href="#contact"><h4>Contact</h4></a></li>
         </ul>
         <!-- bootstrap login form  -->
         <form class="form-inline">
					<ul class="nav navbar-nav navbar-right">
        		<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      		</ul>
      	 </form>
      	 <!-- END bootstrap login form  -->
     </div>
   </nav> 
 </section>
</header>
<!----------------------------------------------------------->
<!--------            MAIN CONTENT                  --------->
<!----------------------------------------------------------->
<section id="calculator">
				<div id="mainformbox">
					<!--------  AUSLESEN FAHRZEUGDATEN AUS DATENBANK  ----------->
				 	<?php  include'mainform/carfromdb.php';?>
				 	<!-- 'carfromdb.php' includes 'db.php' and actions 'calcplotdata.php' -->
				</div> <!-- /container -->	
					<div id="graphbox">
					 <!--------  Fahrleistungsschaubild  ------------->
					 <!--FLOT http://www.flotcharts.org/ -->
					 <div id="flotbox"></div> 	
					 <!--------  ENDE AUSGABEMASKE ERGEBNISDATEN   ------------->
           <div id="errorlog">Welcome to EV Wizard!<br>Follow the steps on the left and click the calculate button...</div>
           
           <iframe id="graphiframe" name="graphiframe" src="phplot-6.2.0/drawphplot.php" scrolling="yes" frameborder="0">Function Graph</iframe>
					  <!-- 'drawphplot.php' includes 'phplot.php' and gets data from 'calcplotdata.php' -->
					</div> <!-- /container -->	
					<!--------  AUSGABEMASKE ERGEBNISDATEN   ------------->	
					<div id="resultsbox">	
							<strong>Results:</strong><p id="clickcalcparagraph">...click calculate button...</p>    
							<!--------  Show and collapse panel for results data   ----------->
								<div id="resultsdata">
								<!--------  AUSGABEMASKE ERGEBNISDATEN   ------------->
								   <dl><dt><strong>Maximum Grip   </strong></dt><dd><input id="id_autogrip"     	   	name="autogrip"     		  type="text" value=""/> [N]</dd>
								   	 <br><strong>Top speeds</strong><br>
									     <dt><strong>theor.         </strong></dt><dd><input id="id_autotopspeedtheo" 	name="autotopspeedtheo"   type="text" value=""/> [km/h]</dd>                                                                                        
									     <dt><strong>gear 1         </strong></dt><dd><input id="id_autotopspeed1"    	name="autotopspeed1" 		  type="text" value=""/> [km/h]</dd>
											 <dt><strong>gear 2         </strong></dt><dd><input id="id_autotopspeed2"    	name="autotopspeed2" 		  type="text" value=""/> [km/h]</dd>
											 <dt><strong>gear 3         </strong></dt><dd><input id="id_autotopspeed3"    	name="autotopspeed3" 		  type="text" value=""/> [km/h]</dd>
											 <dt><strong>gear 4         </strong></dt><dd><input id="id_autotopspeed4"    	name="autotopspeed4" 		  type="text" value=""/> [km/h]</dd>
											 <dt><strong>gear 5         </strong></dt><dd><input id="id_autotopspeed5"    	name="autotopspeed5" 		  type="text" value=""/> [km/h]</dd>
											 <dt><strong>gear 6         </strong></dt><dd><input id="id_autotopspeed6"    	name="autotopspeed6"  	  type="text" value=""/> [km/h]</dd>
											 <dt><strong>diff.          </strong></dt><dd><input id="id_autotopspeeddiff" 	name="autotopspeeddiff"   type="text" value=""/> [km/h]</dd>
								       <dt><strong>direct         </strong></dt><dd><input id="id_autotopspeeddirect"	name="autotopspeeddirect" type="text" value=""/> [km/h]</dd>                                                                                           
									   <br><strong>Accelerations</strong><br>
									     <dt><strong>0-100          </strong></dt><dd><input id="id_autoacc0100" 				name="autoacc0100" 				type="text" value=""/> [s]</dd>
									     <dt><strong>0-200          </strong></dt><dd><input id="id_autoacc0200" 				name="autoacc0200" 				type="text" value=""/> [s]</dd>
									     <dt><strong>80-120         </strong></dt><dd><input id="id_autoacc812" 				name="autoacc812" 				type="text" value=""/> [s]</dd>
									   <br><strong>Quartermile</strong><br>
									     <dt><strong>Time           </strong></dt><dd><input id="id_autoqt" 			  	  name="autoqt"     				type="text" value=""/> [s]</dd>
											 <dt><strong>Speed          </strong></dt><dd><input id="id_autoqv" 				    name="autoqv"      				type="text" value=""/> [km/h]</dd>
									     <dt><strong>Min.Power for t</strong></dt><dd><input id="id_autoqtpmin" 			  name="autoqtpmin" 				type="text" value=""/> [kW]</dd>
									     <dt><strong>Min.Power for v</strong></dt><dd><input id="id_autoqvpmin" 			  name="autoqvpmin" 				type="text" value=""/> [kW]</dd>
									   <br><strong>Extra calculation results</strong>
									   <br><strong>Min. Power for</strong><br>
											 <dt><strong>0-100 in t     </strong></dt><dd><input id="id_autopmin100" 				name="autopmin100" 				type="text" value=""/> [kW]</dd>
											 <dt><strong>0-200 in t     </strong></dt><dd><input id="id_autopmin200" 				name="autopmin200" 				type="text" value=""/> [kW]</dd>
									     <dt><strong>80-120 in t    </strong></dt><dd><input id="id_autopmin812" 				name="autopmin812" 				type="text" value=""/> [kW]</dd>
									 </dl>                          
								</div> 
					</div>
</section> 

<!-- footer from: http://tutorialzine.com/2015/01/freebie-5-responsive-footer-templates/  -->
<footer id="footer" class="footer-distributed">
		<div class="footer-left">
			<h3>EV <span>Wizard</span></h3>
			<p class="footer-links">
				<a href="#home">Home</a>
				&middot;
				<a href="#calculator">Calculator</a>
				&middot;
				<a href="#home">Blog</a>
				&middot;
				<a href="#contact">About us</a>
				&middot;
				<a href="#home">Faq</a>
				&middot;
				<a href="#footer">Contact</a>
			</p>
			<p class="footer-company-name">&copy; 2016 EV Wizard, Inc.</p>
		</div>
		<div class="footer-center">
			<div>
				<i class="fa fa-map-marker"></i>
				<p><span>21 Revolution Street</span> Palo Alto, CA</p>
			</div>
			<div>
				<i class="fa fa-phone"></i>
				<p>+49 190 666666</p>
			</div>
			<div>
				<i class="fa fa-envelope"></i>
				<p><a href="mailto:info@evwizard.de">info@evwizard.de</a></p>
			</div>
		</div>
		<div class="footer-right">
			<p class="footer-company-about">
				<span>About EV Wizard</span>The easy to use and understand EV conversion calculation wizard!</p>
			<br>
			<p class="footer-company-about"> 
				<!--------  Day counter  ------------->
			  <?php $daysuntil=(int)((time())/86400-mktime(0,0,0,1,1,2017)); print"$daysuntil days since launch of EV Wizard website";?>
			</p>
			<div class="footer-icons">
				<a href="#"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-linkedin"></i></a>
				<a href="#"><i class="fa fa-github"></i></a>
			</div>
		</div>
		<div  class="container-fluid text-center" style="margin-top:50px;">
		  <a href="#home" title="To Top">
	    <span class="glyphicon glyphicon-chevron-up"></span>
	    </a>
	  </div>
</footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    
	  <!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>
