<?php 
include('../conn2.php');
$d1="01/03/2021";
$d2="01/04/2021";

$sql = "SELECT  * FROM sales_order WHERE   sales_date >= '$d1' AND
        sales_date   <= '$d2' ";

$query2 = mysqli_query($con, $sql) or die(mysqli_error($con));
$num_rows = mysqli_num_rows($query2);

echo $num_rows;

?>