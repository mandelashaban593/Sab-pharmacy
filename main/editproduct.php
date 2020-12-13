<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM products WHERE product_id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveeditproduct.php" method="post">
<center><h4><i class="icon-edit icon-large"></i> Edit Product</h4></center>
<hr>
<div id="ac">
<input type="hidden" name="memi" value="<?php echo $id; ?>" />
<span>Medicine Name : </span><input type="text" style="width:265px; height:30px;"  name="med_name" value="<?php echo $row['med_name']; ?>" Required/><br>
<span>Category : </span><input type="text" style="width:265px; height:30px;"  name="category" value="<?php echo $row['category']; ?>" /><br>


<table><tr>
<td><span>Quantity:</span></td>
<td><input type="number" style="width:100px; height:30px;" name="quantity" value="<?php echo $row['quantity']; ?>" >
<select style="width:165px; height:30px; border-color: #000080" name="sell_type" value="<?php echo $row['sell_type']; ?>"> 
<option value="Bot">Bot</option>
<option value="Stp">Stp</option>
<option value="Tab">Tab</option>
<option value="Sachet">Sachet</option>	
<option value="Unit">Unit</option>
<option value="Tube">Tube</option>
</select></td></tr></table>



<span>Registered Date: </span><input type="date"   style="width:265px; height:30px;" name="reg_date" id="reg_date"  value="<?php echo $row['date_arrival']; ?>" Required/><br>


<span>Expired Date: </span><input type="date"   style="width:265px; height:30px;" name="exp_date" id="exp_date"  value="<?php echo $row['exp_date']; ?>" Required/><br>

<span>Delelivery Note No: </span><input type="text" style="width:265px; height:30px;" name="del_no"  value="<?php echo $row['del_no']; ?>"  Required/><br>
<span>Date Arrival: </span><input type="date" style="width:265px; height:30px;" name="date_arrival" value="<?php echo $row['date_arrival']; ?>" /><br>

<span>Selling Rate : </span><input type="text" id="txt1" style="width:265px; height:30px;" name="price" onkeyup="sum();" value="<?php echo $row['price']; ?>"  Required><br>
<span>Original Rate: </span><input type="text" id="txt2" style="width:265px; height:30px;" name="o_price" onkeyup="sum();"   value="<?php echo $row['o_price']; ?>" Required><br>
<span>Profit : </span><input type="text" id="txt3" style="width:265px; height:30px;" name="profit" value="<?php echo $row['profit']; ?>" readonly><br>
<span>Supplier : </span>
<select name="supplier" style="width:265px; height:30px; margin-left:-5px;" >
	<option><?php echo $row['supplier']; ?></option>
	<?php
	$results = $db->prepare("SELECT * FROM supliers");
		$results->bindParam(':userid', $res);
		$results->execute();
		for($i=0; $rows = $results->fetch(); $i++){
	?>
		<option><?php echo $rows['suplier_name']; ?></option>
	<?php
	}
	?>
</select><br>
<span>QTY Left: </span><input type="number" style="width:265px; height:30px;" min="0" name="qty_left" value="<?php if(!$row['qty_left'] ) {echo $row['quantity']; } else {echo $row['quantity']-$row['qty_sold'];  } ?>" /><br>

<div style="float:right; margin-right:10px;">

<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save Changes</button>
</div>
</div>
</form>
<?php
}
?>