<?php
// configuration
require '../conn2.php';
// new data
$id = $_POST['memi'];
echo $med_name = $_POST['searchword'];
echo $quantity_order = $_POST['quantity'];

$resulta = $db->prepare("SELECT * FROM orders  WHERE order_id= :order_id");
$resulta->bindParam(':order_id', $id);
$resulta->execute();
for($i=0; $row = $resulta->fetch(); $i++){

echo $o_price = $row['o_price'];

$product_id= $row['product_id'];

$qty_left_order = $row['qty_left'];

echo $tot_order_price = $o_price*$quantity_order;

}


$resulta = $db->prepare("SELECT * FROM products  WHERE product_id= :product_id");
$resulta->bindParam(':product_id', $product_id);
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

$qty_left = $row['qty_left'];

echo "<br/>GOOOOOOOOOD";
echo $qty_left;

if($quantity_order < $row['qty_left']){
$qty_left = $row['qty_left']-(int)$quantity_order;

$qty_left = $qty_left+$qty_left_order;

//moisture content deduction
$tot_order_price = $o_price*$qty_left;


echo  $product_id;

echo $qty_left;



$sql = "UPDATE products 
        SET med_name=?, qty_left=?, quantity=?
		WHERE product_id=?";
$q = $db->prepare($sql);
$q->execute(array($med_name,$qty_left,$qty_left,$product_id));


// query
$sql = "UPDATE orders
        SET med_name=?, quantity=?,qty_left=?, tot_buy=?
		WHERE order_id=?";
$q = $db->prepare($sql);
$q->execute(array($med_name,$quantity_order,$quantity_order,$tot_order_price,$id));




}



}




header("location: ordermedicines.php");

?>