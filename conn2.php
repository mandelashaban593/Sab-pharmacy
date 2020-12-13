<?php
/* Database config */

$host ="localhost";
$user ="root";
$password= "root";
$dbname = "sales";


$con =mysqli_connect($host,$user,$password,$dbname);

if(!$con){

	echo mysqli_connect_error($con);
}



$db_host		= 'localhost';
$db_user		= 'root';
$db_pass		= 'root';
$db_database	= 'sales'; 

/* End config */

$db = new PDO('mysql:host='.$db_host.';dbname='.$db_database, $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


?> 





