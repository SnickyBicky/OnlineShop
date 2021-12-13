
<?php
require_once('my_connect.php');

if (isset($_GET['product_id'])): 

   	$product_id = $_GET["product_id"];
  	$my_query="select * from Stationery where product_id=$product_id"; 

  	$result= mysqli_query($connection, $my_query);

 	 while ($myrow = mysqli_fetch_array($result)):
		$image=$myrow["image"];
	endwhile;
	
	if (file_exists('images/'.$image)) :
		unlink('images/'.$image);
	endif;
	
	$delete_query="delete from Stationery where product_id='$product_id'"; 
	$delete_result= mysqli_query($connection, $delete_query);
	
	if ($delete_result) :
	header ('location: edit_product_list_and_images.php?confirm=Product item successfully deleted');
	else :
	echo "<b>This didn`t work, error: </b>";
	echo mysqli_error($connection);
	endif;

endif;
?>
