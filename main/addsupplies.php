<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="savesupplies.php" method="post">
<center><h4><i class="icon-plus-sign icon-large"></i> Order Supplies</h4></center>
<hr>
   <div>
   <table  class="table table-hover small-text" id="tb">
    <tr class="tr-header" style="width:330px">
    <th>Medicine Name.</th>
    <th>Quantity</th>
    <th><a href="javascript:void(0);" style="font-size:18px;" id="addMore" title="Add More Person"><span class="glyphicon glyphicon-plus"></span></a></th>
    <tr tyle="width:800px" >
    <td><input type="text" name="med_name[]" class="input100" id="drug"  ><div class="col" id="error5" style="color:red"></div></td>
    <td><input type="text" name="quantity[]" class="input100"  id="amount" ><div class="col" id="error6" style="color:red"></div></td>
    <td><a href='javascript:void(0);'  class='remove' ><span class='glyphicon glyphicon-remove'></span></a></td>
    </tr>
    </table>

        </div>

  <div>

<table>
<tr>
<td><span>Telephone Number:</span></td>
<td><input type="text" id="txt3" style="width:265px; height:30px;" name="telno" placeholder ="Telephone Number" >
</td></tr>


<tr>
<td><span>Username :</span></td>
<td><input type="text" id="txt3" style="width:265px; height:30px;" name="username" placeholder ="Username" >
</td></tr>

<tr>
<td><span>Date of Order: :</span></td>
<td><input type="date"   style="width:265px; height:30px;" name="order_date" id="exp_date"  Required/>
</td></tr>


</table>

<br/>
          
<!-- <span>Gross Quantity : </span><input type="number" style="width:265px; height:30px;" min="0" id="txt11" onkeyup="sum();" name="qty" Required ><br> -->
<!-- <span></span><input type="hidden" style="width:265px; height:30px;" id="txt22" name="qty_sold" Required ><br> -->
<div style="float:right; margin-right:10px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save</button>
</div>
</div>
</form>




     <link  rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> 
    <script>
    $(function(){
        $('#addMore').on('click', function() {
                  var data = $("#tb tr:eq(1)").clone(true).appendTo("#tb");
                  data.find("input").val('');
         });
         $(document).on('click', '.remove', function() {
             var trIndex = $(this).closest("tr").index();
                if(trIndex>1) {
                 $(this).closest("tr").remove();
               } else {
                 alert("Sorry!! Can't remove first row!");
               }
          });
    });      
    </script>



