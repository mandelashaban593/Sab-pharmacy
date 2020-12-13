<?php 
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 1); 
include('../conn2.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>
POS
</title>
 <link href="css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
    <style type="text/css">
    
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>


    
    <script src="js/jquery-1.7.2.min.js"></script>
    <script src="js/jquery_ui.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="src/facebox.js"></script>


<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>
<?php
	require_once('auth.php');
?>
<?php
function createRandomPassword() {
	$chars = "003232303232023232023456789";
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = '' ;
	while ($i <= 7) {

		$num = rand() % 33;

		$tmp = substr($chars, $num, 1);

		$pass = $pass . $tmp;

		$i++;

	}
	return $pass;
}
$finalcode='RS-'.createRandomPassword();
?>

 <script language="javascript" type="text/javascript">
/* Visit http://www.yaldex.com/ for full source code
and get more free JavaScript, CSS and DHTML scripts! */
<!-- Begin
var timerID = null;
var timerRunning = false;
function stopclock (){
if(timerRunning)
clearTimeout(timerID);
timerRunning = false;
}
function showtime () {
var now = new Date();
var hours = now.getHours();
var minutes = now.getMinutes();
var seconds = now.getSeconds()
var timeValue = "" + ((hours >12) ? hours -12 :hours)
if (timeValue == "0") timeValue = 12;
timeValue += ((minutes < 10) ? ":0" : ":") + minutes
timeValue += ((seconds < 10) ? ":0" : ":") + seconds
timeValue += (hours >= 12) ? " P.M." : " A.M."
document.clock.face.value = timeValue;
timerID = setTimeout("showtime()",1000);
timerRunning = true;
}
function startclock() {
stopclock();
showtime();
}
window.onload=startclock;
// End -->
</SCRIPT>	
</head>
<body>
<?php include('navfixed.php');?>
	<?php
$position=$_SESSION['SESS_LAST_NAME'];
if($position) {
?>

<a href="../index.php">Logout</a>
<?php
}

?>
	
	<div class="container-fluid">
      <div class="row-fluid">
	<div class="span2">
          <div class="well sidebar-nav">
                     <ul class="nav nav-list">
              <li class="active"><a href="#"><i class="icon-dashboard icon-2x"></i> Dashboard </a></li> 
			

			 <?php
			$position= $_SESSION['SESS_LAST_NAME'];
			if($position=="store"){?>

			<li><a href="products.php"><i class="icon-list-alt icon-2"></i> Medicines</a>    
			                                 </li>

			<li><a href="search_asupplier.php"><i class="icon-group icon-2x"></i><br>  Suppliers </a>  		

			<?php } ?>



			 <?php
			$position= $_SESSION['SESS_LAST_NAME'];
			if($position=="pharmacist"){?>
			<li><a href="sales.php?pay_type=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"></i> Sales</a>  </li> 


			<li><a href="ordermedicines.php"><i class="icon-list-alt icon-2"></i> Medicines</a>    
			                                 </li>
			<li><a href="select_customers.php"><i class="icon-group icon-2x"></i><br>  customers </a>  

			
			

			<?php } ?>



			             <?php
			$position= $_SESSION['SESS_LAST_NAME'];
			if($position=="admin"){?>
			<li><a href="sales.php?pay_type=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"></i> Sales</a>  </li> 

			<li><a href="products.php"><i class="icon-list-alt icon-2"></i> Medicines</a>    
			                                 </li>

			<li><a href="search_asupplier.php"><i class="icon-group icon-2x"></i><br>  Suppliers </a>                                   </li>
			<li><a href="select_customers.php"><i class="icon-group icon-2x"></i><br>  customers </a>                                 </li>
			

			<?php } ?>	

			<?php
			$position= $_SESSION['SESS_LAST_NAME'];
			if($position=="admin"){?>
			<li><a href="addassets.php"><i class="icon-group icon-2"></i> Add Assets</a>  </li>
			<li><a href="addliab.php"><i class="icon-group icon-2"></i> Add Liabilities</a>  </li>
			<li><a href="addequity.php"><i class="icon-group icon-2"></i> Add Stock holders Equity</a>  </li>
			<li><a href="general_ledger.php"><i class="icon-group icon-2"></i> General Ledger</a>                                  </li>

			<li><a href="balance_sheet.php"><i class="icon-group icon-2x]"></i> Balance Sheet</a>                                  </li>
			<li><a href="profit_loss.php"><i class="icon-group icon-2x"></i> Profit and Loss Account</a>                                  </li>
			<li><a href="users.php"><i class="icon-group icon-2x"></i> Users</a>                                  </li>
			
			<li><a href="salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i> Sales Report</a>                </li>
			<br><br><br><br><br><br>

			<?php }?>		
			<li>
			 <div class="hero-unit-clock">
		
			<form name="clock">
			<font color="white">Time: <br></font>&nbsp;<input style="width:150px;" type="submit" class="trans" name="face" value="">
			</form>
			  </div>
			</li>
				</ul>                               
          </div><!--/.well -->
        </div><!--/span-->
	<div class="span10">
	<div class="contentheader">
			<i class="icon-dashboard"></i> Dashboard
			</div>
			<ul class="breadcrumb">
			<li class="active">Dashboard</li>
			</ul>
			<font style=" font:bold 44px 'Aleo'; text-shadow:1px 1px 25px #000; color:#fff;"><center>Pharmancy  Manager</center></font>
<div id="mainmain">

 
<?php            
$position= $_SESSION['SESS_LAST_NAME'];
if($position=="pharmacist"){?>
<a href="sales.php?pay_type=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"></i><br> Sales</a>  

<a href="ordermedicines.php"><i class="icon-list-alt icon-2x"></i><br> Medicines</a>

<a href="select_customers.php"><i class="icon-group icon-2x"></i><br>  customers </a>  


<?php }   $position= $_SESSION['SESS_LAST_NAME'];
			if($position=="admin"){?>
<a href="sales.php?pay_type=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"></i><br> Sales</a>  
<a href="ordermedicines.php"><i class="icon-list-alt icon-2x"></i><br> Order Medicines</a>
<a href="products.php"><i class="icon-list-alt icon-2x"></i><br> Medicines</a>
<a href="medorders.php"><i class="icon-list-alt icon-2x"></i><br> Orders</a> 
<a href="search_asupplier.php"><i class="icon-group icon-2x"></i><br>  Suppliers </a>  
<a href="select_customers.php"><i class="icon-group icon-2x"></i><br>  customers </a>  

<?php 

} ?>     


<?php   $position= $_SESSION['SESS_LAST_NAME'];
			if($position=="store"){?>

<a href="products.php"><i class="icon-list-alt icon-2x"></i><br> Medicines</a>
<a href="medorders.php"><i class="icon-list-alt icon-2x"></i><br> Orders</a>
<a href="search_asupplier.php"><i class="icon-group icon-2x"></i><br>  Suppliers </a>  
 


<?php 

} ?>   


<?php
			$position= $_SESSION['SESS_LAST_NAME'];
			if($position=="admin"){?>
<a href="expenseslist.php"><i class="icon-group icon-2x"></i><br> Expenses </a> 
<a href="supliers_ledger.php"><i class="icon-group icon-2x"></i><br> Suppliers Ledger </a>    
<a href="customers_ledger.php"><i class="icon-group icon-2x"></i><br> Customers'  Ledger </a>  
<a href="salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i><br> Sales Report</a>

<a href="search_asupplier.php"><i class="icon-group icon-2x"></i><br>  Supplier </a>  

<?php }?>


<a href="../index.php"><font color="red"><i class="icon-off icon-2x"></i></font><br> Logout</a> 


<div class="clearfix"></div>
</div>
</div>
</div>
</div>
</body>
<?php include('footer.php'); ?>
</html>
