<?php
/* Database config */

$host ="localhost";
$user ="u752865562_sales";
$password= '"""Look1ng"""';
$dbname = "u752865562_sales";


$con =mysqli_connect($host,$user,$password,$dbname);

if(!$con){

	echo mysqli_connect_error($con);
}



$db_host		= 'localhost';
$db_user		= 'u752865562_sales';
$db_pass		= '"""Look1ng"""';
$db_database	= 'u752865562_sales'; 

/* End config */

$db = new PDO('mysql:host='.$db_host.';dbname='.$db_database, $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


?> 





