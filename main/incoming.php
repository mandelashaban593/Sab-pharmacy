<?php
session_start();
//Connect to mysql server and selecting db
require '../conn2.php';
	

$invoice = $_POST['invoice'];
$product_id = $_POST['product_id'];
$qty = $_POST['qty'];
$pay_type = $_POST['pay_type'];
$date = $_POST['date'];
$discount = $_POST['discount'];
$customer_name = $_POST['customer_name'];



/*
echo "Invoice: ";
echo $invoice;
echo "<br/>";

echo "Product ID: ";
echo $product_id;
echo "<br/>";

echo "Quantity: ";
echo $qty;
echo "<br/>";

echo "Pay type: ";
echo $pay_type;
echo "<br/>";

echo "Date: ";
echo $date;
echo "<br/>";

echo "Discount: ";
echo $discount;

echo "<br/>";

echo "Customer Nname: ";
echo $customer_name;*/



$query = mysqli_query($con, "SELECT price,category,med_name,profit,qty_left FROM orders WHERE product_id= '$product_id'") or die(mysqli_error($con));
$row=mysqli_fetch_array($query);

echo $price=$row['price'];
echo $category=$row['category'];
echo $med_name=$row['med_name'];
echo $profit=$row['profit'];
echo $qty_left=$row['qty_left'];



//edit qty
if($qty_left > $qty){
$qty_left=$qty_left-$qty;
$sql = "UPDATE orders 
        SET qty_left='$qty_left'
		WHERE product_id='$product_id'";
$query2 = mysqli_query($con, $sql) or die(mysqli_error($con));

$sale_price=$price-$discount;
$tot_sale_price=$sale_price*$qty;
$tot_profit=$profit*$qty;

/*
echo "Price: ";
echo $price;
echo "<br/>";

echo "Category";
echo $category;
echo "<br/>";

echo "Medicine Name";
echo $med_name;
echo "<br/>";

echo "Profits";
echo $profit;
echo "\<br/>";

echo "Total Selling price";
echo $tot_sale_price;
echo "<br/>";

echo "Total Price";
echo $sale_price;
echo "<br/>";



echo "Total Profit";
echo $tot_profit;
echo "\n";*/

// query
$sql = "INSERT INTO sales_order (invoice,med_name,qty,amount,category, price,profit,sales_date,discount,customer_name) VALUES ('$invoice','$med_name','$qty','$tot_sale_price','$category','$sale_price','$tot_profit','$date',0.0, '$customer_name')";
$q = mysqli_query($con, $sql) or die(mysqli_error($con));




} else {
	?>
	
	
	<?php
	$qtygreat = "Quantity requested is more than the available Quantity";
	header("location: sales.php?pay_type=$pay_type&invoice=$invoice&error=$qtygreat&customer_name=$customer_name");
	
}


header("location: sales.php?pay_type=$pay_type&invoice=$invoice&profit=$tot_profit&qty=$qty&customer_name=$customer_name");





?>