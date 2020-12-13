<?php
// configuration
include('../connect.php');

// new data
$id = $_POST['memi'];
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
$qty_left = $_POST['qty_left'];
//moisture content deduction
$tot_buy_price = $o_price*$quantity;


// query
$sql = "UPDATE products 
        SET med_name=?, category=?, quantity=?, sell_type=?, reg_date=?, exp_date=?, price=?, supplier=?, o_price=?, profit=?, date_arrival=?, del_no=?, qty_left=?, tot_buy=?
		WHERE product_id=?";
$q = $db->prepare($sql);
$q->execute(array($med_name,$category,$quantity,$sell_type,$new_reg_date,$new_exp_date,$sell_price,$supplier,$o_price,$profit,$date_arrival,$del_no,$qty_left,$tot_buy_price,$id));
header("location: products.php");

?>