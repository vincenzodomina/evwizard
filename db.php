 <?php
// This connects to db  
    $_db_host = "localhost"; 
    $_db_username = "evwizard"; 
    $_db_passwort = "einpaarweisse"; 
    $_db_datenbank = "evwizard"; 

$mysqli = new mysqli($_db_host, $_db_username, $_db_passwort,$_db_datenbank);
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
//select a database to work with
$mysqli->select_db($_db_datenbank);
// count number of datasets in table
/*
SELECT 
  COUNT(*) AS `datasets` 
FROM 
  `table` 
  */
?>