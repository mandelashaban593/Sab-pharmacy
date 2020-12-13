<?php
//Start session
session_start();
if($_POST['username'] && $_POST['password']) {
    
require 'conn2.php';
//Start session
//Array to store validation errors
$errmsg_arr = array();
//Validation error flag
$errflag = false;
//Connect to mysql server
//Function to sanitize values received from the form. Prevents SQL injection
function clean($str) {
$str = @trim($str);
if(get_magic_quotes_gpc()) {
	$str = stripslashes($str);
}
return $str;
}

//Sanitize the POST values
$login = clean($_POST['username']);
$password = clean($_POST['password']);

//Input Validations
if($login == '') {
$errmsg_arr[] = 'Username missing';
$errflag = true;
}
if($password == '') {
$errmsg_arr[] = 'Password missing';
$errflag = true;
}

//If there are input validations, redirect back to the login form
if($errflag) {
$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
session_write_close();
echo "Great Great";
header("location: index.php");
exit();
}

//Create query
$qry="SELECT * FROM user WHERE username='$login' AND password='$password'";
$result=mysqli_query($con, $qry) or die(mysqli_error($result));

//Check whether the query was successful or not
if($result) {
if(mysqli_num_rows($result) > 0) {
	//Login Successful
	session_regenerate_id();
	$member = mysqli_fetch_assoc($result);
	$_SESSION['SESS_MEMBER_ID'] = $member['id'];
	$_SESSION['SESS_FIRST_NAME'] = $member['name'];
	$_SESSION['SESS_LAST_NAME'] = $member['position'];
	//$_SESSION['SESS_PRO_PIC'] = $member['profImage'];
	session_write_close();
	header("location: main/index.php");
	exit();
}else {
	//Login failed
	header("location: index.php");
	exit();
}
}else {
die("Query failed");
}

}
	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);
?>
<html>
<head>
<title>
POS
</title>
    <link rel="shortcut icon" href="main/images/pos.jpg">

  <link href="main/css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="main/css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="main/css/font-awesome.min.css">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="main/css/bootstrap-responsive.css" rel="stylesheet">

<link href="style.css" media="screen" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="container-fluid">
      <div class="row-fluid">
		<div class="span4">
		</div>
	
</div>
<div id="login">
<?php
if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
	foreach($_SESSION['ERRMSG_ARR'] as $msg) {
		echo '<div style="color: red; text-align: center;">',$msg,'</div><br>'; 
	}
	unset($_SESSION['ERRMSG_ARR']);
}
?>
<form action="" method="post">

			<font style=" font:bold 44px 'Aleo'; text-shadow:1px 1px 15px #000; color:#fff;"><center>Pharmancy Manager </center></font>
			<!-- Post Of Sales  -->
		<br>

		
<div class="input-prepend">
		<span style="height:30px; width:25px;" class="add-on"><i class="icon-user icon-2x"></i></span><input style="height:40px;" type="text" name="username" Placeholder="Username" required/><br>
</div>
<div class="input-prepend">
	<span style="height:30px; width:25px;" class="add-on"><i class="icon-lock icon-2x"></i></span><input type="password" style="height:40px;" name="password" Placeholder="Password" required/><br>
		</div>
		<div class="qwe">
		 <button class="btn btn-large btn-primary btn-block pull-right" href="dashboard.html" type="submit"><i class="icon-signin icon-large"></i> Login</button>
</div>
		 </form>
</div>
</div>
</div>
</div>
</body>
</html>