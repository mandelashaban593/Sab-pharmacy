<?php
session_start();
require '../conn2.php';
//Connect to mysql server and selecting db
$status = "Available";
$med_name = implode(", ", $_POST["med_name"]);
$quantity = implode(", ", $_POST["quantity"]);

$telno = $_POST['telno'];
$username = $_POST['username'];
$order_date = $_POST['order_date'];


echo $med_name;

echo "\n";
echo $quantity;

echo "\n";
echo $telno;


// query
$sql = "INSERT INTO supplies (med_name,quantity,telno,username,order_date) VALUES ('$med_name','$quantity','$telno','$username','$order_date')";
$q = mysqli_query($con, $sql) or die(mysqli_error($con));

header("location: order-supplies.php");


?>