<?php
session_start();
require '../conn2.php';
//Connect to mysql server and selecting db
$status = "Available";
$med_name = $_POST['med_name'];
$category = $_POST['category'];
$quantity = $_POST['quantity'];
$sell_type = $_POST['sell_type'];
$reg_date = strtotime($_POST['reg_date']);
$new_reg_date = date('Y-m-d',$reg_date);
$exp_date= strtotime($_POST['exp_date']); 
$new_exp_date = date('Y-m-d',$exp_date);

$sell_price = $_POST['price'];
$supplier = $_POST['supplier'];
$o_price = $_POST['o_price'];
$profit  = $_POST['profit'];
$date_arrival = $_POST['date_arrival'];
$del_no = $_POST['del_no'];
//moisture content deduction
$tot_buy_price = $o_price*$quantity;

echo $a;

echo "\n";
echo $a;

echo "\n";
echo $b;

echo "\n";
echo $c;

echo "\n";

echo $actual_mois;

echo "\n";

// query
$sql = "INSERT INTO products (med_name,category,quantity,sell_type,reg_date,exp_date,price,supplier,o_price,profit,date_arrival,del_no,tot_buy,status) VALUES ('$med_name','$category','$quantity','$sell_type','$new_reg_date','$new_exp_date','$sell_price','$supplier','$o_price','$profit','$date_arrival','$del_no','$tot_buy_price','$status')";
$q = mysqli_query($con, $sql) or die(mysqli_error($con));

header("location: products.php");


?>