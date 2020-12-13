
<?php
require '../conn2.php';
session_start();

if(!isset($_SESSION['SESS_LAST_NAME'])){

    header("location:index.php");
}


   @$drug_result=mysqli_real_escape_string($con,$_POST['med_name']);

   $query="SELECT * from products where med_name LIKE'%".$drug_result."%' and status= 'Available'
   ";

   $result =mysqli_query($con,$query);

   $data= array();


   while($row = mysqli_fetch_array($result)){


   	$data [] = $row["med_name"].",".$row['category'].",".$row['exp_date'].",(".$row['sell_type'].")";

      

   }
     echo json_encode($data);





?>