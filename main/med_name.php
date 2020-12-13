
<?php
require '../conn2.php';

session_start();

if(!isset($_SESSION['SESS_LAST_NAME'])){

    header("location:index.php");
}
   @$med_name=mysqli_real_escape_string($con,$_POST['med_name']);

   $query="SELECT * from products where med_name = '$med_name' and status= 'Available'
   ";

   $result =mysqli_query($con,$query);

   $data= array();


   while($row = mysqli_fetch_array($result)){


   	$data [] = $row["med_name"].",".$row['expire_date'].",(".$row['sell_type'].")";

   }
     echo json_encode($data);

?>