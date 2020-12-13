<?php
session_start();
require '../conn2.php';

// hear we search term exist then process the below lines of code
if(!empty($_POST["searchterm"])) 
{
    // the query responsible for fetch matched data
    $sql_query ="SELECT * FROM products WHERE med_name like '" . $_POST["searchterm"] . "%' ORDER BY med_name LIMIT 0,4";
    $get_result = mysqli_query($con,$sql_query);
 
        if(!empty($get_result)) {
            // prepare the list for append
        ?>
                <ul id="myUL">
                <?php
                while($name_val = mysqli_fetch_array($get_result))
				{
                ?>
					<li onClick="selectname('<?php echo $name_val["med_name"]; ?>');"><a href="#"><?php echo $name_val["med_name"]; ?></a></li>
                <?php 
				} 
				?>
                </ul>
        <?php } 
} 
?>