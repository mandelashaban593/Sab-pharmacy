<?php
session_start();
//Connect to mysql server and selecting db
require '../conn2.php';

?>
 <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
    <link rel="stylesheet" href="css/jquery.css">
  <link rel="stylesheet" type="text/css" href="src/facebox.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">

  <style type="text/css">

  	* {
  box-sizing: border-box;
}

#searchword #id_suggesstions{
  background-image: url('/css/searchicon.png');
  background-position: 10px 12px;
  background-repeat: no-repeat;
  width: 50%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

  	
#myUL {
  list-style-type: none;
  padding: 0;
  margin: 0;
  margin-left: 70px;
 
}

#myUL li a {
  border: 1px solid #ddd;
  margin-top: -1px; /* Prevent double borders */
  background-color: #f6f6f6;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  color: black;
  display: block
}

#myUL li a:hover:not(.header) {
  background-color: #eee;
}
</style>
<?php
$id=$_GET['id'];
$result = $db->prepare("SELECT * FROM orders WHERE order_id= :userid");
$result->bindParam(':userid', $id);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){

?>
<form action="saveeditorderstatus.php" method="post">
<center><h4><i class="icon-plus-sign icon-large"></i> Edit Order Status</h4></center>
<hr>
<div id="ac">

<input type="hidden" name="memi" value="<?php echo $id; ?>" />

<span>Status : </span>
<select name="status" style="width:265px; height:30px;"> 
<option value="Pending">Pending</option>
<option value="Approved">Approved</option>
<option value="Delivered">Delivered</option>
</select><br>

	
<div  class="ui-widget" id="id_suggesstions">

</div>



<div style="float:right; margin-right:10px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save</button>
</div>
</div>
</form>
<?php
}
?>


  <style type="text/css">

  </style>
    
    <script src="js/jquery-1.7.2.min.js"></script>
    <script src="js/jquery_ui.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="src/facebox.js"></script>



<script type="text/javascript">

  $(document).ready(function(){




  //****Medicine name and Date*****
     $("#med_name").focusout(function(){
         
               var value = $("#med_name").val();

               var res= value.split(",");

               var name = res[0];

            $("#med_name_hidden").val(name);
       

    });



      //****AUTO COMPLETE*****
    $("#med_name").typeahead({

               source: function(med_name_result, result){

            $.ajax({

          url : 'autocomplete.php',
          method :'POST',
          data :{med_name:med_name_result},
          dataType:"json",

          success:function(data){

            result($.map(data,function(item){



              return item;

            }));
          },

        });
      },

    });









});

</script>


<script>
$(document).ready(function(){
    // when any character press on the input field keyup function call
    $("#searchword").keyup(function(){
        $.ajax({
        type: "POST", // here used post method
        url: "readname.php",//php file where retrive the post value and fetch all the matched item from database
        data:'searchterm='+$(this).val(),//send data or search term to readname file to process
        beforeSend: function(){
            // show loader icon
            $("#searchword").css("background","#FFF url(LoaderIcon.gif) no-repeat 175px");
        },
        success: function(data){
            // get the output from database on success
            $("#id_suggesstions").show();//show the suggestions
            $("#id_suggesstions").html(data);//append data in the box for selection
            $("#searchword").css("background","#FFF");
        }
        });
    });
});
// call this function after select one of these suggestion for hide the suggestion box and select the value
function selectname(selected_value) {
	$("#searchword").val(selected_value);
	$("#id_suggesstions").hide();
}
</script>s