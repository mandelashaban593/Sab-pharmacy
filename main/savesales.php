<?php
session_start();
//Connect to mysql server and selecting db
require '../conn2.php';
	
$invoice = $_POST['invoice'];
$cashier = $_POST['cashier'];
$date = $_POST['date'];
$ptype= $_POST['ptype'];
$amount = $_POST['amount'];
$profit = $_POST['profit'];
$cname = $_POST['cname'];
if($ptype=='credit') {
$due_date = $_POST['due'];

$sql = "INSERT INTO sales (invoice_number,cashier,date,type,amount,profit,due_date,name) VALUES ('$invoice','$cashier','$date','$ptype','$amount','$profit','$due_date','$cname')";
$q = mysqli_query($con, $sql) or die(mysqli_error($con));


header("location: preview.php?invoice=$invoice");
exit();
}
if($ptype=='cash') {
$cash = $_POST['cash'];
$bal=$amount-$cash;
$sql = "INSERT INTO sales (invoice_number,cashier,date,type,amount,profit,due_date,name,balance,cash) VALUES ('$invoice','$cashier','$date','$ptype','$amount','$profit','$due_date','$cname','$bal','$cash')";

$q = mysqli_query($con, $sql) or die(mysqli_error($con));



header("location: preview.php?invoice=$invoice");
exit();
}
// query



?>