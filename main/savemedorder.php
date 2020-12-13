<?php
require '../conn2.php';
//Connect to mysql server and selecting db
$status = "Pending";
$quantity_order = $_POST['quantity'];
echo $med_name = $_POST['searchword'];

$resulta = $db->prepare("SELECT * FROM products  WHERE med_name= :med_name");
$resulta->bindParam(':med_name', $med_name);
$resulta->execute();
for($i=0; $row = $resulta->fetch(); $i++){

 $product_id = $row['product_id'];

$category = $row['category'];

 $quantity = $row['quantity'];

$sell_type = $row['sell_type'];
$reg_date = $row['reg_date'];
$exp_date= $row['exp_date']; 

$sell_price = $row['price'];
$supplier = $row['supplier'];
$o_price = $row['o_price'];
$profit  =$row['profit'];
$date_arrival = $row['date_arrival'];
$del_no = $row['del_no'];
$qty_left = $row['qty_left']-$quantity_order;
//moisture content deduction
$tot_order_price = $o_price*$qty_left;

}


$q = mysqli_query($con, "SELECT * FROM orders WHERE product_id ='$product_id' ") or die(mysqli_error($con));
$rowcount=mysqli_num_rows($q);

echo $rowcount;
if($rowcount == 0){
	// query
$sql = "INSERT INTO orders (product_id,med_name,category,quantity,sell_type,reg_date,exp_date,price,supplier,o_price,profit,date_arrival,del_no,tot_buy,status,qty_left) VALUES ('$product_id','$med_name	','$category','$quantity','$sell_type','$reg_date','$exp_date','$sell_price','$supplier','$o_price','$profit','$date_arrival','$del_no','$tot_order_price','$status','$qty_left')";
$q = mysqli_query($con, $sql) or die(mysqli_error($con));




} 


header("location: ordermedicines.php");


?>