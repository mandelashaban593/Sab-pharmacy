<?php
// configuration
require '../conn2.php';
// new data
$id = $_POST['memi'];
echo $status = $_POST['status'];


// query
$sql = "UPDATE orders
        SET status=?
		WHERE order_id=?";
$q = $db->prepare($sql);
$q->execute(array($status,$id));
header("location: medorders.php");

?>