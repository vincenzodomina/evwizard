<?php
/* This sends the car data to the database */

//capture values posted from form
$automake       =$_POST['automake'];
$automodel      =$_POST['automodel'];
$autoyear       =$_POST['autoyear'];
$autoweight     =$_POST['autoweight'];
$autocd         =$_POST['autocd'];
$autofrontalarea=$_POST['autofrontalarea'];
$autocda        =$_POST['autocda'];
$autogear1      =$_POST['autogear1'];
$autogear2      =$_POST['autogear2'];
$autogear3      =$_POST['autogear3'];
$autogear4      =$_POST['autogear4'];
$autogear5      =$_POST['autogear5'];
$autogear6      =$_POST['autogear6'];
$autogearfinal  =$_POST['autogearfinal'];
$autodrive      =$_POST['autodrive'];
$autotirewidth  =$_POST['autotirewidth'];
$autotireheight =$_POST['autotireheight'];
$autowheelsize  =$_POST['autowheelsize'];

// build a sql qeury using the values above
$query="INSERT INTO cardatabase
(
automake       ,
automodel      ,
autoyear       ,
autoweight     ,
autocd         ,
autofrontalarea,
autocda        ,
autogear1      ,
autogear2      ,
autogear3      ,
autogear4      ,
autogear5      ,
autogear6      ,
autogearfinal  ,
autodrive      ,
autotirewidth  ,
autotireheight ,
autowheelsize 
)
VALUES(
'$automake',  
'$automodel',  
'$autoyear',  
'$autoweight',  
'$autocd',  
'$autofrontalarea',  
'$autocda',  
'$autogear1',  
'$autogear2',  
'$autogear3',  
'$autogear4',  
'$autogear5',  
'$autogear6',  
'$autogearfinal',
'$autodrive',  
'$autotirewidth',  
'$autotireheight',  
'$autowheelsize')";     

//connect to database and select "cardatabase"
include 'db.php';

//insert car data into database
if ($result=$mysqli->query($query)) 
{echo "<p>You have successfully entered your car!</P>";}
else
{echo "<p>Error: </p>" . mysqli_error($mysqli)."</p>"."<a href="."index.php".">Go back</a>";}

// close connection to database
$mysqli->close();
?>